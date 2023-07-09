<?php

//import credentials for db
require_once  '../login.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);


if(isset($_POST['delete']))
{
	$Actor_ID = $_POST['Actor_ID'];

	$query = "DELETE FROM Actor WHERE Actor_ID='$Actor_ID' ";
	
	//Run the query
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	//Return to the view actors page
	header("Location: view-actor.php");
	
}

$conn->close();


?>