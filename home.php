<!DOCTYPE html>
<html>
<head>
    <title>Movies</title>
    <style>
       body {
        display: flex;
        flex-direction: row; /* Changed from "row" to "column" */
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0; /* Added to remove default margin */
    }

    .navbar {
        padding: 10px;
        background-color: #000;
        overflow: hidden;
        width: 100%;
    }

    .navbar a {
        margin-right: 10px;
        text-decoration: none;
        float: right;
        color: #fff;
        text-align: center;
        padding: 14px 16px;
        font-size: 18px;
    }
    .navbar-left {
        float: left;
    }

    .navbar a:first-child {
        margin-right: auto;
    }

        .movie {
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

        .movie a {
            text-decoration: none;
            color: #d11b85;
            text-transform: uppercase;
            font-weight: bold;
        }

        .movie:hover {
            box-shadow: 0 0 10px rgba(255,255,255,0.5);
        }

        .button {
            margin-top: 10px;
            padding: 10px;
            background-color: #4CAF50; /* Green */
            color: #fff;
            border: none;
            text-transform: uppercase;
            cursor: pointer;
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
    
    <!-- Start Movie Divs -->
    <div class="movie" id="movie1">
        <div class="poster"></div>
        <a href="movie-description.php">Movie Title 1</a>
        <button class="button">Add to Cart</button>
    </div>
    <div class="movie" id="movie2">
        <div class="poster"></div>
        <a href="#">Movie Title 2</a>
        <button class="button">Add to Cart</button>
    </div>
    <div class="movie" id="movie3">
        <div class="poster"></div>
        <a href="#">Movie Title 3</a>
        <button class="button">Add to Cart</button>
    </div>
    <div class="movie" id="movie4">
        <div class="poster"></div>
        <a href="#">Movie Title 4</a>
        <button class="button">Add to Cart</button>
    </div>
    <div class="movie" id="movie5">
        <div class="poster"></div>
        <a href="#">Movie Title 5</a>
        <button class="button">Add to Cart</button>
    </div>
    <div class="movie" id="movie6">
        <div class="poster"></div>
        <a href="#">Movie Title 6</a>
        <button class="button">Add to Cart</button>
    </div>
    <div class="movie" id="movie7">
        <div class="poster"></div>
        <a href="#">Movie Title 7</a>
        <button class="button">Add to Cart</button>
    </div>
    <div class="movie" id="movie8">
        <div class="poster"></div>
        <a href="#">Movie Title 8</a>
        <button class="button">Add to Cart</button>
    </div>
    <div class="movie" id="movie9">
        <div class="poster"></div>
        <a href="#">Movie Title 9</a>
        <button class="button">Add to Cart</button>
    </div>
    <div class="movie" id="movie10">
        <div class="poster"></div>
        <a href="#">Movie Title 10</a>
        <button class="button">Add to Cart</button>
    </div>
    <div class="movie" id="movie11">
        <div class="poster"></div>
        <a href="#">Movie Title 11</a>
        <button class="button">Add to Cart</button>
    </div>
    <div class="movie" id="movie12">
        <div class="poster"></div>
        <a href="#">Movie Title 12</a>
        <button class="button">Add to Cart</button>
    </div>
    <div class="movie" id="movie13">
        <div class="poster"></div>
        <a href="#">Movie Title 13</a>
        <button class="button">Add to Cart</button>
    </div>
    <div class="movie" id="movie14">
        <div class="poster"></div>
        <a href="#">Movie Title 14</a>
        <button class="button">Add to Cart</button>
    </div>
    <div class="movie" id="movie15">
        <div class="poster"></div>
        <a href="#">Movie Title 15</a>
        <button class="button">Add to Cart</button>
    </div>
    <!-- End Movie Divs -->
</body>
</html>