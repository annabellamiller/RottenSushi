<!DOCTYPE html>
<html>
<head>
    <title>Movie Page</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <?php
    $page_role = 0;
    require_once '../nav.php'; // Navigation bar
    require_once '../login.php';
    require_once '../login/checksession.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    if (isset($_GET['Movie_ID'])) {
        $Movie_ID = $_GET['Movie_ID'];
        $query = "SELECT * FROM Movie WHERE Movie_ID=$Movie_ID";
        $result = $conn->query($query);
        if (!$result) die($conn->error);
        $row = $result->fetch_array(MYSQLI_ASSOC);

        echo <<<HTML
            <h1>Movie Details</h1>
            <div class='movieDetails'>
                <img src='/rottensushi/images/example.jpg' alt='Movie Image'>
            </div>
            <div class='movieDetails'>
                <p>
                    <h3><a href='update-movie.php?Movie_ID={$row['Movie_ID']}'>{$row['Movie_Name']}</a></h3>
                    Director: {$row['Director']}<br>
                    Release Date: {$row['Release_Date']}<br>
                    Awards: {$row['Award']}<br>
                    Details: {$row['Details']}<br>
                    Actors:<br>
        HTML;

        // Fetch actors associated with the movie from the roles table
        $query = "SELECT a.* FROM Actor a
                  INNER JOIN roles r ON a.Actor_ID = r.Actor_ID
                  WHERE r.Movie_ID = $Movie_ID";
        $result = $conn->query($query);
        if (!$result) die($conn->error);

        while ($actor = $result->fetch_array(MYSQLI_ASSOC)) {
            echo "{$actor['First_Name']} {$actor['Last_Name']}<br>";
        }

        echo "</p>";
        echo "</div>";

        echo "<form action='delete-movie.php' method='post'>";
        echo "<input type='hidden' name='delete' value='yes'>";
        echo "<input type='hidden' name='Movie_ID' value='{$row['Movie_ID']}'>";
        echo "<input type='submit' class='button' value='DELETE MOVIE'>";
        echo "</form>";

        echo "<div class='reviews'><p><h3>Reviews:</h3>";

        $query = "SELECT * FROM review r
                  INNER JOIN user u ON r.User_ID = u.User_ID
                  WHERE Movie_ID=$Movie_ID";
        $result = $conn->query($query);
        if (!$result) die($conn->error);

        while ($review = $result->fetch_array(MYSQLI_ASSOC)) {
            echo <<<HTML
                User: {$review['Username']} <br>
                Rating: {$review['Rating']}<br>
                <a href='../crud-review/update-review.php?Review_ID={$review['Review_ID']}'>Description</a>: {$review['Description_']}<br><br>
            HTML;
        }

        echo "</p></div>";
        echo "<div class='reviews'>";
        echo "<a href='../cart.php?Movie_ID=$Movie_ID'><button type='button' class='button'>Purchase Movie!</button></a>";
        echo "</div>";
    }
    ?>

</body>
</html>
