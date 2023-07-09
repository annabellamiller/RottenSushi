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
    $Movie_ID = $_POST['Movie_ID'];

	$query = "DELETE FROM review WHERE User_ID='$User_ID' && Movie_ID='$Movie_ID' ";
	
	//Run the query
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	//Return to the view actors page
	header("Location: ../home.php");
	
}

$conn->close();

?>