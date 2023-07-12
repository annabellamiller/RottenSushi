<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='../styles.css'>
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
        $("#nav-placeholder").load("../nav.php");
        });
    </script>
    <!--end of Navigation bar-->
    <!-- card info? -->
    <h1 class="section-title">Shopping Cart</h1>
</body>
</html>

<?php
    $page_role = 0; // Need to be logged in

    require_once '../login.php';
    require_once '../login/checksession.php';

    $User_ID = $_SESSION['User_ID'];
    $cart = $_SESSION['cart'];

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
                        <a href="/rottensushi/cart/delete-cart.php?Movie_ID={$row['Movie_ID']}"><button class="button">Remove</button></a>
                    </div>
                </div>
    HTML;

            }
        } else {
            echo "No data found.";
        }
    }

    echo "
    <form method='POST' action='cart.php'>
    Credit Card: <input type='text' name='Credit_Card' required><br>
    CVV: <input type='text' name='CVV' required><br>
    Expiration Date: <input type='date' name='Expiration_Date' required><br>
    <input type='hidden' name='checkout' value='yes'>
    <input type='submit' class='checkout-btn'  style='margin-top: 40px;' name='checkout' value='CHECKOUT'>	
</form>";


    echo"<form method='POST' action='/rottensushi/cart/cart.php'>
        <button class='button' style='margin-top: 20px;' name='clear_cart'>Clear Cart</button>
    </form>
    ";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['clear_cart'])) {
            $_SESSION['cart'] = array();
            header("Location: /rottensushi/cart/cart.php");
        }
        else if (isset($_POST['checkout'])) {
            //add each movie to purchases list using card info
            $User_ID = $_SESSION['User_ID'];
            $Credit_Card = $_POST['Credit_Card'];
            $CVV = $_POST['CVV'];
            $Expiration_Date = $_POST['Expiration_Date'];

            foreach ($cart as $movie) {
                // Add purchase to database
                $query = "INSERT INTO purchases (Movie_ID, User_ID, Credit_Card, CVV, Expiration_Date) VALUES ('$movie', '$User_ID', '$Credit_Card', '$CVV', '$Expiration_Date')";

                $result = $conn->query($query);
                if (!$result) die($conn->error);
            }
            
            // Clear the cart
            $_SESSION['cart'] = array();
            header("Location: /rottensushi/cart/cart.php");
        }
    }
?>
