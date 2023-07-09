<!DOCTYPE html>
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
                <form action='add-review' method='post'>
                    Movie ID:<br>
                    <input type='text' name='movieName'><br>
                    Description:<br>
                    <input type='text' name='director'><br>
                    Rating:<br>
                    <input type='range' id='rating' min='0' max='10' value='0' name='category'><br><br>
                    <input type='submit' value='SUBMIT' class="button">
                </form>                
            </p>
        </div>
	</body>
</html>

<?php
require_once  '../login.php';
require_once '../login/checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//check if name exists
if(isset($_POST['First_Name'])) 
{
	//Get data from POST object
	$First_Name = $_POST['First_Name'];
	$Last_Name = $_POST['Last_Name'];
	$Date_of_Birth = $_POST['Birth_Date'];
	
	//echo $First_Name.'<br>';
	
	$query = "INSERT INTO Actor (First_Name, Last_Name, Date_of_Birth) VALUES ('$First_Name', '$Last_Name','$Date_of_Birth')";
	
	//echo $query.'<br>';
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: view-actor.php");
		
}

$conn->close();

?>


