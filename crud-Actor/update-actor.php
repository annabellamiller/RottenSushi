<!DOCTYPE html>
	<head>
		<title>Update Actor</title>
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

        <h1>Update Actor</h1>
	</body>
</html>

<?php

require_once  '../login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['Actor_ID'])){

$Actor_ID = $_GET['Actor_ID'];

$query = "SELECT * FROM Actor where Actor_ID=$Actor_ID";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 
	
echo <<<_END
	<pre>
	<form action='update-actor.php' method='post'>
	First Name: <input type='text' name='First_Name' value='$row[First_Name]'>
	Last Name: <input type='text' name='Last_Name' value='$row[Last_Name]'>	
	Birth Date: <input type='date' name='Date_of_Birth' value='$row[Date_of_Birth]'>			
	</pre>
		<input type='hidden' name='update' value='yes'>
		<input type='hidden' name='Actor_ID' value='$row[Actor_ID]'>
		<input type='submit' class='button' value='UPDATE ACTOR'>	
	</form>
	
_END;

}

}

if(isset($_POST['update'])){
	
	$Actor_ID = $_POST['Actor_ID'];
	$First_Name = $_POST['First_Name'];
	$Last_Name = $_POST['Last_Name'];
	$Date_of_Birth = $_POST['Date_of_Birth'];
	
	
	$query = "UPDATE Actor set First_Name='$First_Name', Last_Name='$Last_Name', Date_of_Birth='$Date_of_Birth' where Actor_ID = $Actor_ID ";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: view-actor.php");
	
}

$conn->close();



?>