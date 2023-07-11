<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/rottensushi/login.php');


session_start();
$checkAdmin = 0;

if(!isset($_SESSION['User_ID'])){
	header("Location: /rottensushi/login/login-page.php");
	exit();
}
else {
	$User_ID = $_SESSION['User_ID'];

	//echo "$User_ID"; //for debugging purposes
	

	//grab permissions from database
	$conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error) die($conn->connect_error);
	$query="SELECT Admin FROM user where User_ID='$User_ID'";
	$result=$conn->query($query);
	if(!$result) die ($conn->error);
	$row=$result->fetch_array(MYSQLI_BOTH);

	//check authorization
	$Admin = $row['Admin'];
	$checkAdmin = $Admin;
	
	if(!$Admin && $page_role==1){
		header("Location: /rottensushi/login/unauthorized.php");
		exit();
	}
}



?>