<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='styles.css'>
    <title>Shopping Cart</title>
    <style>
        .section-title {
            color: #fff;
            margin: 20px;
        }
        .cart-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 200px;
            margin: 20px;
            text-align: center;
            color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }
        .poster {
            width: 100%;
            height: 300px;
            background: #000;
            margin-bottom: 10px;
        }
        .cart-item a {
            text-decoration: none;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
        }
        .cart-item:hover {
            box-shadow: 0 0 10px rgba(255,255,255,0.5);
        }
        .cart {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 40px;
        }
        .checkout-btn {
            background-color: #4CAF50; /* Green */
        }
    </style>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
    <!--Navigation bar-->
    <div id="nav-placeholder"></div>
    <script>
        $(function(){
        $("#nav-placeholder").load("nav.php");
        });
    </script>
    <!--end of Navigation bar-->

    <h1 class="section-title">Shopping Cart</h1>
</body>
</html>

<?php
$page_role = 0; // Need to be logged in

require_once 'login.php';
require_once 'login/checksession.php';

$User_ID = $_SESSION['User_ID'];
$cart = $_SESSION['cart'];

echo "<h1>$User_ID's Cart</h1>";

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

foreach ($cart as $movie) {
    $query = "SELECT * FROM Movie WHERE Movie_ID='$movie'";

    $result = $conn->query($query);
    if (!$result) die($conn->error);

    // Show results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            echo <<<HTML
            <div class="cart">
                <div class="cart-item">
                    <div class="poster"></div>
                    <a href="/rottensushi/crud-Movie/movie-description.php?Movie_ID={$row['Movie_ID']}">{$row['Movie_Name']}</a>
                    <a href="/rottensushi/crud-purchase/delete-purchase.php?Movie_ID={$row['Movie_ID']}"><button class="button">Remove</button></a>
                </div>
            </div>
HTML;

        }
    } else {
        echo "No data found.";
    }
    //<button class="button checkout-btn" style="margin-top: 40px;">Checkout</button>

    echo "<form method="POST">
                <button class="button checkout-btn" style="margin-top: 40px;">Checkout</button>
            </form>}";


    echo "<form method="POST">
            <button class="button" style="margin-top: 20px;" name="clear_cart">Clear Cart</button>
        </form>}";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       if (isset($_POST['clear_cart'])) {
           // Clear the cart
           unset($_SESSION['cart']);
           echo "Cart cleared.";
       }
    }
    
?>
