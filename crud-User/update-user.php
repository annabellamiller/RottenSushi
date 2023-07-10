<!DOCTYPE html>
	<head>
		<title>Update User</title>
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

        <h1>Update User</h1>
	</body>
</html>

<?php

$page_role = 1; //Need to be admin

require_once  '../login.php';
require_once  '../login/checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['User_ID'])){

$User_ID = $_GET['User_ID'];

$query = "SELECT * FROM user where User_ID=$User_ID";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 
	
	echo <<<HTML
	<pre>
	<form action='update-user.php' method='post'>
		Username: <input type='text' name='Username' value='{$row['Username']}' required><br>
		Password: <input type='password' name='Password' value='{$row['Password_']}' required><br>
		First Name: <input type='text' name='First_Name' value='{$row['First_Name']}' required><br>
		Last Name: <input type='text' name='Last_Name' value='{$row['Last_Name']}' required><br>
		Admin: <input type='checkbox' name='Admin' ";
	</pre>
	<input type='hidden' name='update' value='yes'>
	<input type='hidden' name='User_ID' value='{$row['User_ID']}'>
	<input type='submit' class='button' value='UPDATE USER'>	
	</form>
	HTML;
	
	


}

}

if (isset($_POST['update'])) {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $First_Name = $_POST['First_Name'];
    $Last_Name = $_POST['Last_Name'];
    $Admin = isset($_POST['Admin']) ? 1 : 0;
    $User_ID = $_POST['User_ID'];
    
    $query = "UPDATE user SET Username='$Username', Password_='$Password', First_Name='$First_Name', Last_Name='$Last_Name', Admin='$Admin'
              WHERE User_ID=$User_ID";
    
    $result = $conn->query($query); 
    if (!$result) die($conn->error);
    
    header("Location: view-user.php");
    exit();
}

$conn->close();



?>