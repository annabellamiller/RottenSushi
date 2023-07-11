<!DOCTYPE html>
<html>
<head>
    <title>Add Review</title>
    <link rel='stylesheet' href='../styles.css'>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <style>
        /* Updated CSS styles */
        .addMovie {
            margin: 0 auto;
            max-width: 400px;
            padding: 20px;
            text-align: center;
            font-family: Verdana, Arial, sans-serif;
        }

        .addMovie label,
        .addMovie input,
        .addMovie select {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            font-size: 16px;
        }

        .addMovie input[type='submit'] {
            background-color: #FF1A1A;
            color: white;
            font-size: 25px;
            font-weight: bold;
            line-height: 40px;
            width: 100%;
            padding: 0 20px;
            border-radius: 35px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            border: none;
            margin-top: 20px;
            cursor: pointer;
        }

        .addMovie label.movie,
        .addMovie label.rating,
        .addMovie label.description {
            font-weight: bold;
        }
    </style>
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
        <form action='add-review.php' method='post'>
            <label for='movie' class="movie">Movie:</label>
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
            </select>

            <label for='description' class="description">Description:</label>
            <input type='text' name='Description_' id='description'>

            <label for='rating' class="rating">Rating:</label>
            <input type='range' id='rating' min='0' max='10' value='0' name='Rating'>

            <input type='submit' value='SUBMIT' class="button">
        </form>
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
