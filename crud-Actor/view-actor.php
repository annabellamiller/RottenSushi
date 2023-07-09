<!DOCTYPE html>
	<head>
		<title>View Actors</title>
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

        <h1>View Actor List</h1>
	</body>
</html>




<?php

require_once  '../login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM Actor";

$result = $conn->query($query); 
if(!$result) die($conn->error);

//show results
if($result->num_rows > 0){
    // Output data of each row
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		echo <<<_END
			<div class=''><pre>
			Actor: <a href='update-actor.php?Actor_ID=$row[Actor_ID]'>$row[First_Name] $row[Last_Name]</a>
			Date of Birth: $row[Date_of_Birth]
			</pre>
			
			<form action='delete-actor.php' method='post'>
				<input type='hidden' name='delete' value='yes'>
				<input type='hidden' name='Actor_ID' value='$row[Actor_ID]'>
				<input type='submit' class='button' value='DELETE ACTOR'>	
			</form></div>
			
		_END;

	}
} else {
    echo "No data found.";
}

$conn->close();

?>