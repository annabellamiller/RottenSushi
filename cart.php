<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #373b44, #4286f4); /* Ocean Blue Gradient */
            font-family: Arial, sans-serif;
        }

        .section-title {
            color: #fff;
            margin: 20px;
        }
        .navbar {
  background-color: #000;
  overflow: hidden;
  width: 100%;
}

.navbar a {
  float: right;
  color: #fff;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 18px;
}

.navbar-left {
  float: left;
}

.navbar a:hover {
  background-color: #555;
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

        .button {
            margin-top: 10px;
            padding: 10px;
            background-color: #f44336; /* Red */
            color: #fff;
            border: none;
            text-transform: uppercase;
            cursor: pointer;
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
</head>
<body>
    <div class='navbar'>
        <div class='navbar-left'>
               <a href='home.php'>Rotten Sushi</a>
        </div>
           <a href='login-page.php'>Logout</a>
           <a href='cart.php'>Cart</a>
           <a href='add-movie.php'>Add Movie</a>
           <a href='add-review.php'>Add Review</a>
    </div>

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
