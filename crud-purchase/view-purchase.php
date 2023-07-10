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

        <h1>My Movies</h1>
	</body>
</html>


<?php

$page_role = 0; //Need to be logged in

require_once  '../login.php';
require_once  '../login/checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$User_ID = $_SESSION['User_ID'];

$query = "SELECT * FROM Purchases WHERE User_ID='$User_ID';";

$result = $conn->query($query); 
if(!$result) die($conn->error);

//show results
if($result->num_rows > 0){
    // Output data of each row
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		echo "Movie_ID: $row[Movie_ID]";
	}
} else {
    echo "No data found.";
}

$conn->close();

?>