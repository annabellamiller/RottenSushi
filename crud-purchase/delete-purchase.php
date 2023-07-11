<!DOCTYPE html>
	<head>
		<title>Delete Purchase</title>
	</head>
</html>

<?php
$page_role = 1; //Need to be admin

require_once  '../login.php';
require_once  '../login/checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);


if(isset($_GET['Purchase_ID'])) {
    $Purchase_ID = $_GET['Purchase_ID'];

	$query = "DELETE FROM purchases WHERE Purchase_ID='$Purchase_ID' ";
	
	//Run the query
	$result = $conn->query($query); 
	if(!$result) die($conn->error);


	//return to view purchases
    header("Location: /rottensushi/crud-purchase/view-purchase.php");
    exit();
}

$conn->close();
?>









