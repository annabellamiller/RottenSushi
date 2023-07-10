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
   

    <div class="cart">
        <!-- Start Cart Items -->
        <div class="cart-item">
            <div class="poster"></div>
            <a href="#">Movie Title 1</a>
            <button class="button">Remove</button>
        </div>
        <div class="cart-item">
            <div class="poster"></div>
            <a href="#">Movie Title 2</a>
            <button class="button">Remove</button>
        </div>
        <div class="cart-item">
            <div class="poster"></div>
            <a href="#">Movie Title 3</a>
            <button class="button">Remove</button>
        </div>
        <div class="cart-item">
            <div class="poster"></div>
            <a href="#">Movie Title 4</a>
            <button class="button">Remove</button>
        </div>
        <!-- You can add more cart items as necessary -->
    </div>

    <button class="button checkout-btn" style="margin-top: 40px;">Checkout</button>
    <button class="button" style="margin-top: 20px;">Clear Cart</button>

</body>
</html>

<?php
$page_role = 0; //Need to be logged in

require_once  'login.php';
require_once  'login/checksession.php';

$User_ID = $_SESSION['User_ID'];
echo "<H1>$User_ID</H1>";

?>