<!DOCTYPE html>
	<head>
		<title>Add Purchase</title>
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

    $cart[] = $Movie_ID; // Add Movie_ID to the cart array using [] notation

    // Perform any other operations you need to do with the cart or Movie_ID

    $_SESSION['cart'] = $cart; // Update the session variable with the modified cart array
    // echo "$cart[0]";
    foreach ($cart as $item) {
        echo $item . "<br>";
    }
    header("Location: /rottensushi/crud-Movie/movie-description.php?Movie_ID=$Movie_ID");
    exit();
}

$conn->close();
?>









