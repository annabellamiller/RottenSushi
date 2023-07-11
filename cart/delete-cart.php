<!DOCTYPE html>
	<head>
		<title>Delete Purchase</title>
	</head>
</html>

<?php
$page_role = 0; //Need to be logged in

require_once  '../login.php';
require_once  '../login/checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$cart = $_SESSION['cart'];

if(isset($_GET['Movie_ID'])) {
    $Movie_ID = $_GET['Movie_ID'];
    $User_ID = $_SESSION['User_ID'];

    // Find the key of the first occurrence of $Movie_ID in $cart array
	$key = array_search($Movie_ID, $cart);

	// If the key is found, unset the element from the array
	if ($key !== false) {
		unset($cart[$key]);
	}


    $_SESSION['cart'] = $cart; // Update the session variable with the modified cart array

	//return to cart
    header("Location: /rottensushi/cart/cart.php");
    exit();
}

$conn->close();
?>









