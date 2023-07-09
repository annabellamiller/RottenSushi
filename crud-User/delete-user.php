<?php

$page_role = 1; //Need admin authority

//import credentials for db
require_once  '../login.php';
require_once  '../login/checksession.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);


if(isset($_POST['delete']))
{
	$User_ID = $_POST['User_ID'];

	//delete from tables with FK to user
	$query = "DELETE FROM review WHERE User_ID='$User_ID' ";
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	$query = "DELETE FROM purchases WHERE User_ID='$User_ID' ";
	$result = $conn->query($query); 
	if(!$result) die($conn->error);

	$query = "DELETE FROM user WHERE User_ID='$User_ID' ";
	
	//Run the query
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	//Return to the view actors page
	header("Location: view-user.php");
	
}

$conn->close();


?>