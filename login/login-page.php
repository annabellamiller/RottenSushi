<html>
<head>
<link rel='stylesheet' href='../styles.css'>
<style>
  body {
    font-family: Verdana, Arial, sans-serif;
    background-image: url(/rottensushi/Images/LoginPageBackground.png);
    background-repeat: no-repeat;
    background-size: cover;
  }

  .login {
    position: absolute;
    top: 25px;
    right: 15px;
    color: white;
    font-size: 15px;
    font-weight: bold;
    text-decoration: underline;
    text-decoration-color: #C049F8;
    text-decoration-thickness: 3px;
  }

  .container {
    margin: 0 auto;
    margin-top: 200px;
    width: 400px;
    height: 500px;
    background-color: white;
    border-radius: 35px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    padding: 20px;
  }

  .login-heading {
    color: black;
    font-size: 50px;
    font-weight: bold;
    text-align: center;
  }

  .rectangle {
    border: 3px solid #C049F8;
    height: 58px;
    width: 100%;
    text-align: left;
    border-radius: 35px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    margin-bottom: 25px;
  }

  .username,
  .password {
    color: black;
    font-size: 20px;
    font-weight: bold;
    line-height: 58px;
    padding-left: 15px;
  }

  .login-button {
    background-color: #C049F8;
    color: white;
    font-size: 25px;
    font-weight: bold;
    line-height: 58px;
    width: 100%;
    padding: 0 20px;
    border-radius: 35px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    border: none;
    margin-bottom: 20px;
    cursor: pointer;

  .register-text {
    text-align: center;
    font-size: 25px;
  }

  .register-text span {
    font-weight: bold;
    color: black;
    text-align: center;
  }

  .register-link {
    text-decoration: none;
    color: black;
    text-align: center;
  }
  
</style>
</head>
<body>
    <div class='navbar'>
      <div class="navbar-left">
        <a href='/rottensushi/home.php'>Rotten Sushi</a>
        <img src='\RottenSushi\Images\logo.jpg' alt='Rotten Sushi Logo' style="display: flex; align-items: center; width: 50px; height: auto; margin-right: 10px;">
      </div>
    </div>

<div class="container">
  <h1 class="login-heading">Login</h1>
    <form method='post' action='login-page.php'>
    <input class="username rectangle" type="text" name='Username' placeholder="Username">
    <input class="password rectangle" type="password" name='Password_' placeholder="Password">
    <input class="login-button" type='submit' value='Login'>
  </form>
  <p class="register-text">Don't have an account? <a href="../crud-user/new-user.php" class="register-link"><span>Register</span></a></p>
</div>
</body>
</html>

<?php


require_once '../login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_POST['Username']) && isset($_POST['Password_'])) {
	
	//Get values from login screen and sanitize them (NO EASY HACKS HERE)
	$Username = mysql_entities_fix_string($conn, $_POST['Username']);
	$Password_ = mysql_entities_fix_string($conn, $_POST['Password_']);
	
	//get password from DB w/ SQL
	$query = "SELECT * FROM user WHERE Username = '$Username'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	$passwordFromDB="";
  $User_ID = "";
	for($j=0; $j<$rows; $j++)
	{
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$passwordFromDB = $row['Password_'];
    $User_ID = $row['User_ID'];
	
	}

			echo "$Password_";

	//Compare passwords
	if(password_verify($Password_, $passwordFromDB))
	{
		echo "successful login<br>";
		session_start();
		$_SESSION['User_ID'] = $User_ID;
    $_SESSION['cart'] = array();

		header("Location: ../home.php");
	}
	else
	{
		echo "login error<br>";
	}	
	
}

$conn->close(); //Remember to close connection!


//sanitization functions
function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string)); 	
}

function mysql_fix_string($conn, $string){
	$string = stripslashes($string);
	return $conn->real_escape_string($string);
}



?>