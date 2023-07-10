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
    $Review_ID = $_POST['Review_ID'];

	$query = "DELETE FROM review WHERE Review_ID='$Review_ID'";
	
	//Run the query
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	//Return to the view actors page
	header("Location: ../home.php");
	
}

$conn->close();

?>