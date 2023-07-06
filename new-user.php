<html>
<head>
<link rel='stylesheet' href='styles.css'>
<style>
    body {
      font-family: Verdana, Arial, sans-serif;
    }

    .navbar {
      background-color: black;
      height: 55px;
    }

    .login {
      position: absolute;
      top: 25px;
      right: 15px;
      color: white;
      font-size: 40px;
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

    .firstname .lastname
    .input-group .rectangle {
      width: 50%;
      margin-right: 10px;
    }

    .rectangle {
      border: 3px solid #C049F8;
      height: 58px;
      text-align: left;
      border-radius: 35px;
      box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
      margin-bottom: 25px;
    }


    .register-button {
      background-color: #C049F8;
      color: white;
      font-size: 25px;
      font-weight: bold;
      line-height: 58px;
      width: 100%;
      padding: 0 20px;
      border-radius: 24px;
      box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
      border: none;
      cursor: pointer;
    }

    .register-text {
      text-align: center;
      font-size: 25px;
    }

    .register-text span {
      font-weight: bold;
      color: black;
    }

    .register-link {
      text-decoration: none;
      color: black;
    }
</style>
</head>
<body>
<div class="navbar">
  <div class="login">Login</div>
</div>
<div class="container">
  <h1 class="login-heading">Create an Account</h1>
  <form method='post' action="login-page.php">
    <div class="input-group">
      <input class="rectangle" type="text" name='forename' placeholder="First Name" required>
      <input class="rectangle" type="text" name='surname' placeholder="Last Name" required>
    </div>
    <input class="rectangle" type="email" name='email' placeholder="Email">
    <input class="rectangle" type="text" name='username' placeholder="Username" required>
    <input class="rectangle" type="password" name='password' placeholder="Password" required>
    <input class="rectangle" type="text" name ='cardnum' placeholder="CreditCard??">
    <input class = "register-button" type="submit" value="Add User">
  </form> 
  <p class="register-text">Already have an account? <a href="login-page.php" class="register-link"><span>Login</span></a></p>
</div>
</body>
</html>

<?php

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['username'])){

	$forename = $_POST['forename'];
	$surname = $_POST['surname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//password_hash code here
	$token = password_hash($password, PASSWORD_DEFAULT);

	//code to add user here
	$query = "insert into user(forename, surname, username, password_) values ('$forename', '$surname', '$username', '$token')";
	$result = $conn->query($query);
	if(!$result) die($conn->error);

    header("Location:user-list.php");
}

$conn->close();


?>