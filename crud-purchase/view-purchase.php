<!DOCTYPE html>
	<head>
		<title>View Purchase</title>
		<link rel='stylesheet' href='../styles.css'>
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
	</body>
</html>


<?php

$page_role = 0; //Need to be logged in

require_once  '../login.php';
require_once  '../login/checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$User_ID = $_SESSION['User_ID'];

$query = "SELECT u.Username, u.First_Name, u.Last_Name, m.Movie_Name, p.Credit_Card, m.Movie_ID, p.CVV, p.Expiration_Date, p.Purchase_ID
            FROM `user` u
            INNER JOIN purchases p ON u.User_ID = p.User_ID
            INNER JOIN Movie m ON p.Movie_ID = m.Movie_ID
            WHERE u.User_ID='$User_ID';";


$result = $conn->query($query); 
if(!$result) die($conn->error);

//show results
if ($result->num_rows > 0) {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    echo "<h1>{$row['Username']} Movies</h1>";

    do {
        echo <<<HTML
            <div class="myMovies">
                <div class="poster"></div>
                <a href="/rottensushi/crud-Movie/movie-description.php?Movie_ID={$row['Movie_ID']}">{$row['Movie_Name']}</a><br>
                <a href="/rottensushi/crud-purchase/update-purchase.php?Purchase_ID={$row['Purchase_ID']}">Update Purchase</a>:<br>
                Card Used: {$row['Credit_Card']}<br>
                CVV: {$row['CVV']}<br>
                Expiration Date: {$row['Expiration_Date']}<br>
                <a href="/rottensushi/crud-purchase/delete-purchase.php?Purchase_ID={$row['Purchase_ID']}"><button class="button">Remove</button></a>
            </div>
HTML;
    } while ($row = $result->fetch_array(MYSQLI_ASSOC));
} else {
    echo "No data found.";
}


$conn->close();

?>