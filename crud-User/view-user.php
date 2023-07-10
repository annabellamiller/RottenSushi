<!DOCTYPE html>
	<head>
		<title>View Users</title>
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

        <h1>View User List</h1>
	</body>
</html>

<?php

$page_role = 1; //Admin

require_once  '../login.php';
require_once  '../login/checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM User";

$result = $conn->query($query); 
if(!$result) die($conn->error);

//show results
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        echo <<<_END
            <div class=''>
            <pre>
                User: <a href='update-user.php?User_ID=$row[User_ID]'>$row[First_Name] $row[Last_Name]</a>
                User ID: $row[User_ID]
                Username: $row[Username]
                Admin: $row[Admin]
                
                <form action='delete-user.php' method='post'>
                    <input type='hidden' name='delete' value='yes'>
                    <input type='hidden' name='User_ID' value='$row[User_ID]'>
                    <input type='submit' class='button' value='DELETE USER'>    
                </form>
                </pre>
            </div>
            
        _END;
    }
} else {
    echo "No data found.";
}


$conn->close();

?>