<!DOCTYPE html>
	<head>
		<title>Add Review</title>
		<link rel='stylesheet' href='styles.css'>
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

        <h1>Add A New Review</h1>

        <div class='addMovie'>
            <p>
                <form action='#' method='post'>
                    Movie ID:<br>
                    <input type='text' name='movieName'><br>
                    Description:<br>
                    <input type='text' name='director'><br>
                    Rating:<br>
                    <input type='range' id='rating' min='0' max='10' value='0' name='category'><br><br>
                    <input type='submit' value='SUBMIT' class="button">
                </form>                
            </p>
        </div>
	</body>
</html>