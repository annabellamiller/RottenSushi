<!DOCTYPE html>
<html>
<head>
    <title>Movie Page</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <!--Navigation bar-->
    <div id="nav-placeholder"></div>
    <script>
        $(function(){
        $("#nav-placeholder").load("rottensushi/nav.php");
        });
    </script>
    <!--end of Navigation bar-->
    <?php
        require_once '../login.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);
        if (isset($_GET['Movie_ID'])) {
            $Movie_ID = $_GET['Movie_ID'];
            $query = "SELECT * FROM Movie where Movie_ID=$Movie_ID";
            $result = $conn->query($query);
            if (!$result) die($conn->error);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            echo "<h1>Movie Details</h1>";
            echo <<<HTML
            <div class="movieDetails">
                <img src="/rottensushi/images/example.jpg" alt="Movie Image">       
            </div>
            <div class="movieDetails">
                <p>
                    <h3><a href='update-movie.php?Movie_ID=$row[Movie_ID]'>{$row['Movie_Name']}</a></h3>
                    Director: {$row['Director']}<br>
                    Release Date: {$row['Release_Date']}<br>
                    Awards: {$row['Award']}<br>
                    Details: {$row['Details']}<br>
                    Actors:<br>
                </p>
            </div>
            
            <form action="delete-movie.php" method="post">
                <input type="hidden" name="delete" value="yes">
                <input type="hidden" name="Movie_ID" value="{$row['Movie_ID']}">
                <input type="submit" class='button' value="DELETE MOVIE">    
            </form>         
            HTML;
        }
    ?>

    <div class="reviews">
        <p>
        <h3>Reviews:</h3>
        </p>
    </div>
    <div class="reviews">
        <a href="../cart.php?Movie_ID=<?php echo $Movie_ID; ?>"><button type="button" class='button'>Purchase Movie!</button></a>
    </div>

</body>
</html>
