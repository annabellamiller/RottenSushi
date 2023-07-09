<!DOCTYPE html>
	<head>
		<title>Add Movie</title>
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

        <h1>Add A New Movie</h1>

        <div class='addMovie'>
            <p>
                <form action='#' method='post'>
                    Movie Name:<br>
                    <input type='text' name='Movie_Name' required><br>
                    Director:<br>
                    <input type='text' name='Director'><br>
                    Release Date:<br>
                    <input type='date' name='Release_Date' required><br>
                    Award:<br>
                    <input type='text' name='Award'><br>
                    Details: <br>
                    <input type='text' name='Details' required><br>
                    <label for='actor'>Actors:</label><br>
                    <select id='actor' multiple>
                        <?php

                        ?>
                        <!--Use for loop to add all actors from db-->
                        <option value='actorID'>Actor1</option>
                        <option value='actorID'>Actor2</option>
                        <option value='actorID'>Actor3</option>
                    </select> <br><br>
                    <input type='submit' value='SUBMIT' class="button">
                </form>                
            </p>
        </div>
	</body>
</html>

<?php
require_once  '../login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//check if name exists
if(isset($_POST['Movie_Name'])) 
{
	//Get data from POST object
	$Movie_Name = $_POST['Movie_Name'];
	$Release_Date = $_POST['Release_Date'];
	$Director = $_POST['Director'];
    $Award = $_POST['Award'];
    $Details = $_POST['Details'];
	
	$query = "INSERT INTO Movie (Movie_Name, Release_Date, Director, Award, Details) VALUES ('$Movie_Name', '$Release_Date','$Director', '$Award', '$Details')";
	
	//echo $query.'<br>';
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: ../home.php");
		
}

$conn->close();

?>


