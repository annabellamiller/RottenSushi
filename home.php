<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='styles.css'>
    <title>Movies</title>
    <style>
        .movie {
            width: 200px;
            margin: 20px;
            text-align: center;
            color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            display:flex;
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
            box-shadow: 0 0 20px rgba(255,255,255,0.5);
        }
        .button {
            background-color: #4CAF50; /* Green */
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
    
    <!-- End Movie Divs -->
</body>
</html>

<?php
$page_role = 0; //Need to be logged in

require_once  './login.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '/rottensushi/login/checksession.php');


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
            <div class="movie">
            <div class="poster">
                <a href="/rottensushi/crud-Movie/movie-description.php?Movie_ID=$row[Movie_ID]">$row[Movie_Name]</a>
                </div>
            </div>
        _END;

	}
} 
else {
    echo "No data found.";
}

$conn->close();

?>