<!DOCTYPE html>
<html>
<head>
    <title>Movies</title>
    <style>
        body {
            display: flex;
            flex-direction: column; 
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .navbar {
            padding: 10px 0;
            background-color: #000;
            overflow: hidden;
            width: 100%;
            box-sizing: border-box;
            float:right;
            margin-right: 10px; */
            text-decoration: none;
            color: #fff;
            text-align: center;
            font-size: 18px;
        }
        .navbar a {
            margin-right: 10px;
            text-decoration: none;
            float: right;
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            font-size: 18px;
        }
        .navbar-left {
            float: left;
        }
        .movie {
            width: 200px;
            margin: 20px;
            text-align: center;
            color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }
        .poster {
            width: 100%;
            height: 300px;
            background: #000;
            margin-bottom: 10px;
        }
        .movie a {
            text-decoration: none;
            color: #d11b85;
            text-transform: uppercase;
            font-weight: bold;
        }
        .movie:hover {
            box-shadow: 0 0 10px rgba(255,255,255,0.5);
        }
        .button {
            margin-top: 10px;
            padding: 10px;
            background-color: #4CAF50; /* Green */
            color: #fff;
            border: none;
            text-transform: uppercase;
            cursor: pointer;
        }
    </style>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
    <!--Navigation bar-->
    <div id="nav-placeholder"></div>
    <script>
        $(function(){
        $("#nav-placeholder").load("nav.php");
        });
    </script>
    <!--end of Navigation bar-->
    
    <!-- Start Movie Divs -->
    <div>
        <div class="movie" id="movie1">
            <div class="poster"></div>
            <a href="movie-description.php">Movie Title 1</a>
            <button class="button">Add to Cart</button>
        </div>
    </div>
    
    <!-- End Movie Divs -->
</body>
</html>

<?php

require_once  './login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM movie";

$result = $conn->query($query); 
if(!$result) die($conn->error);

//show results
if($result->num_rows > 0){
    // Output data of each row
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

        echo <<<_END
            <div class="poster"></div>
                <a href="/rottensushi/crud-Movie/movie-description.php?Movie_ID=$row[Movie_ID]">$row[Movie_Name]</a>
                <button class="button">Add to Cart</button>
            </div>
        _END;

	}
} 
else {
    echo "No data found.";
}

$conn->close();

?>