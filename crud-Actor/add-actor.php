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

        <h1>Add A New Actor</h1>
        <div class='addMovie'>
            <p>
                <h4>Add Actor</h4>
                <form action='add-actor.php' method='post'>
                    First Name:<br>
                    <input type='text' name='First_Name'><br>
                    Last Name:<br>
                    <input type='text' name='Last_Name'><br>
                    Date of Birth:<br>
                    <input type='date' name='Birth_Date'><br><br>
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








