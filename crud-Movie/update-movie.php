<!DOCTYPE html>
	<head>
		<title>Update Movie</title>
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

        <h1>Update Movie</h1>
	

		<?php

		$page_role = 1; //admin
		require_once  '../login.php';
		require_once  '../login/checksession.php';

		$conn = new mysqli($hn, $un, $pw, $db);
		if($conn->connect_error) die($conn->connect_error);

		if(isset($_GET['Movie_ID'])){
		$Movie_ID = $_GET['Movie_ID'];
		$query = "SELECT * FROM Movie where Movie_ID=$Movie_ID";
		$result = $conn->query($query); 
		if(!$result) die($conn->error);

		$rows = $result->num_rows;

		for($j=0; $j<$rows; $j++)
		{
			//$result->data_seek($j); 
			$row = $result->fetch_array(MYSQLI_ASSOC); 
			
		echo <<<_END
			<pre>
			<form action='update-movie.php' method='post'>
			Movie Name: <input type='text' name='Movie_Name' value='$row[Movie_Name]'>
			Release Date: <input type='date' name='Release_Date' value='$row[Release_Date]'>	
			Director: <input type='text' name='Director' value='$row[Director]'>	
			Award: <input type='text' name='Award' value='$row[Award]'>	
			Details: <input type='text' name='Details' value='$row[Details]'>			
			</pre>
				<input type='hidden' name='update' value='yes'>
				<input type='hidden' name='Movie_ID' value='$row[Movie_ID]'>
				<input type='submit' class='button' value='UPDATE MOVIE'>	
			</form>
			
		_END;

		}

		}

		if (isset($_POST['update'])) {
			$Movie_ID = $_POST['Movie_ID'];
			$Movie_Name = $_POST['Movie_Name'];
			$Release_Date = $_POST['Release_Date'];
			$Director = $_POST['Director'];
			$Award = $_POST['Award'];
			$Details = $_POST['Details'];
			
			//prepared statement so ' can go in movie descriptions.
			$query = "UPDATE Movie SET Movie_Name=?, Release_Date=?, Director=?, Award=?, Details=? WHERE Movie_ID=?";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("sssssi", $Movie_Name, $Release_Date, $Director, $Award, $Details, $Movie_ID);
			$stmt->execute();
			$stmt->close();

			header("Location: ../home.php");
			exit();
		}


		$conn->close();

		?>
	</body>
</html>

