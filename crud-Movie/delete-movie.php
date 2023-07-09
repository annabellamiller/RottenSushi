<?php

//import credentials for db
require_once  '../login.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['delete']))
{
	$Movie_ID = $_POST['Movie_ID'];

    //NEED TO DELETE PURCHASES FIRST

	$query = "DELETE FROM Movie WHERE Movie_ID='$Movie_ID' ";
	
	//Run the query
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	//Return to the viewAllClassics page
	header("Location: ../home.php");
	
}

$conn->close();


?>