<!DOCTYPE html>
<html>
<head>
    <title>Add Review</title>
    <link rel='stylesheet' href='../styles.css'>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
    <!--Navigation bar-->
    <div id="nav-placeholder"></div>
    <script>
        $(function(){
        $("#nav-placeholder").load("/rottensushi/nav.php");
        });
    </script>
    <!--end of Navigation bar-->

    <h1>Add A New Review</h1>

    <div class='addMovie'>
        <p>
            <form action='add-review.php' method='post'>
                <label for='movie'>Movie:</label><br>
                    <select id='movie' name='Movie_Name' required>
                        <?php
                        require_once '../login.php';
                        $conn = new mysqli($hn, $un, $pw, $db);
                        if ($conn->connect_error) die($conn->connect_error);

                        $query = "SELECT * FROM Movie";
                        $result = $conn->query($query);
                        if (!$result) die($conn->error);

                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                            $Movie_ID = $row['Movie_ID'];
                            $Movie_Name = $row['Movie_Name'];
                            echo "<option value='$Movie_ID'>$Movie_Name</option>";
                        }

                        $result->close();
                        $conn->close();
                        ?>
                    </select> <br><br>
                Description:<br>
                <input type='text' name='Description_'><br>
                Rating:<br>
                <input type='range' id='rating' min='0' max='10' value='0' name='Rating'><br><br>
                <input type='submit' value='SUBMIT' class="button">
            </form>                
        </p>
    </div>
</body>
</html>

<?php

$page_role = 0; //Need to be logged in

require_once  '../login.php';
require_once '../login/checksession.php';

if(isset($_POST['Movie_Name'])) {
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    // Prepare the statement
    $query = "INSERT INTO Review (User_ID, Movie_ID, Description_, Rating) 
              VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    // Get data from POST object
    $User_ID = $_SESSION['User_ID'];
    $Movie_ID = $_POST['Movie_Name'];
    $Description_ = $_POST['Description_'];
    $Rating = $_POST['Rating'];
    
    // Bind parameters and execute the statement
    $stmt->bind_param("ssss", $User_ID, $Movie_ID, $Description_, $Rating);
    $result = $stmt->execute();
    if(!$result) die($stmt->error);

    $stmt->close();
    $conn->close();
    header("Location: ../home.php");
    exit();
}
?>
