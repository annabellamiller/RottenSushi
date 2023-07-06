<!DOCTYPE html>
	<head>
		<title>Add Movie</title>
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

        <h1>Add A New Movie</h1>

        <div class='addMovie'>
            <p>
                <form action='#' method='post'>
                    Movie Name:<br>
                    <input type='text' name='movieName'><br>
                    Director:<br>
                    <input type='text' name='director'><br>
                    Category:<br>
                    <input type='text' name='category'><br>
                    Release Date:<br>
                    <input type='month' name='year'><br>
                    Award:<br>
                    <input type='text' name='Award'><br>
                    Characters:<br>
                    <input type='text' name='Character'><br>
                    <label for='actor'>Actors:</label><br>
                    <select id='actor' multiple>
                        <!--Use for loop to add all actors from db-->
                        <option value='actorID'>Actor1</option>
                        <option value='actorID'>Actor2</option>
                        <option value='actorID'>Actor3</option>
                    </select> <br><br>
                    <input type='submit' value='SUBMIT' class="button">
                </form>                
            </p>
        </div>
        <div class='addMovie'>
            <p>
                <h4>Add Actor</h4>
                <form action='#' method='post'>
                    First Name:<br>
                    <input type='text' name='firstName'><br>
                    Last Name:<br>
                    <input type='text' name='lastName'><br>
                    Date of Birth:<br>
                    <input type='text' name='birthDate'><br>
                    <label for='character'>Movie Characters:</label><br>
                    <select id='character' multiple>
                        <!--Use for loop to add all characterss from db-->
                        <option value='characterID'>character1</option>
                    </select> <br><br>
                    <input type='submit' value='SUBMIT' class="button">
                </form>                
            </p>
        </div>
        <div class='addMovie'>
            <p>
                <h4>Add Character</h4>
                <form action='#' method='post'>
                    First Name:<br>
                    <input type='text' name='firstName'><br>
                    Last Name:<br>
                    <input type='text' name='lastName'><br>
                    Date of Birth:<br>
                    <input type='text' name='birthDate'><br><br>
                    <input type='submit' value='SUBMIT' class="button">
                </form>                
            </p>
        </div>
	</body>
</html>










