<!DOCTYPE html>
	<head>
		<title>Add Review</title>
		<link rel='stylesheet' href='styles.css'>
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