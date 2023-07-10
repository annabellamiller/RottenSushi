<!DOCTYPE html>
<html>
<head>
    <title>Update Review</title>
    <link rel='stylesheet' href='../styles.css'>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
    <!--Navigation bar-->
    <div id="nav-placeholder"></div>
    <script>
        $(function(){
        $("#nav-placeholder").load("../nav.php");
        });
    </script>
    <!--end of Navigation bar-->

    <h1>Update Review</h1>
</body>
</html>

<?php
    $page_role = 1; // Need to be admin
    require_once  '../login.php';
    require_once  '../login/checksession.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    if (isset($_GET['Review_ID'])) {

        $Review_ID = $_GET['Review_ID'];

        $query = "SELECT * FROM review WHERE Review_ID=$Review_ID";

        $result = $conn->query($query); 
        if (!$result) die($conn->error);

        $row = $result->fetch_array(MYSQLI_ASSOC); 
        $Movie_ID = $row['Movie_ID'];
        echo $Movie_ID;

        
        $query = "SELECT * FROM Movie";
        $result = $conn->query($query);
        
        $Movie_Name = "";
        
        while ($movie = $result->fetch_array(MYSQLI_ASSOC)) {
            if ($movie['Movie_ID'] == $Movie_ID) {
                $Movie_Name = $movie['Movie_Name'];
                break;
            }
        }
        
        $result->close();
        
        echo <<<HTML
                <div>
                    <form action='update-review.php' method='post'>
                        <label for='movie'>Movie: $Movie_Name</label><br>
                        Description:<br>
                        <input type='text' name='Description_' value='{$row['Description_']}'><br>
                        Rating:<br>
                        <input type='range' id='rating' min='0' max='10' value='{$row['Rating']}' name='Rating'><br><br>
                        <input type='hidden' name='update' value='yes'>
                        <input type='hidden' name='Review_ID' value='$Review_ID'>
                        <input type='hidden' name='Movie_ID' value='$Movie_ID'>
                        <input type='submit' class='button' value='UPDATE REVIEW'>    
                    </form>
                    <form action='delete-review.php' method='post'>
                        <input type='hidden' name='delete' value='yes'>
                        <input type='hidden' name='Review_ID' value='$Review_ID'>
                        <input type='submit' class='button' value='DELETE REVIEW'>    
                    </form>
                </div>
            HTML;

    }

    if (isset($_POST['update'])) {
        
        $Description_ = $_POST['Description_'];
        $Rating = $_POST['Rating'];
        $Review_ID = $_POST['Review_ID'];
        $Movie_ID = $_POST['Movie_ID'];
        
        $query = "UPDATE review SET Rating='$Rating', Description_='$Description_' WHERE Review_ID=$Review_ID";
        
        $result = $conn->query($query); 
        if (!$result) die($conn->error);
        
        header("Location: ../crud-movie/movie-description.php?Movie_ID=$Movie_ID");
        exit();
    }

    $conn->close();
?>
