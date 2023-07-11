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
      font-size: 40px;
      font-weight: bold;
      text-align: center;
    }

    .firstname {
      width: 50%;
      margin-right: 10px;
    }

    .lastname {
      width: 50%;
      margin-right: 10px;
    }

    .rectangle,
    .firstname,
    .lastname,
    input[type="text"],
    input[type="password"] {
      font-size: 15px;
      font-weight: bold;
    }

    .rectangle {
      border: 3px solid #C049F8;
      height: 58px;
      text-align: left;
      border-radius: 35px;
      box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
      margin-bottom: 25px;
    }

    .input-group {
      display: flex;
    }

    .rectangle.full-width {
      width: 100%;
    }

    .register-button {
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
      cursor: pointer;
    }

</style>
</head>
<body>
<div class="navbar">
        <div class="navbar-left">
            <a href="../home.php">Rotten Sushi</a>
          </div>  
    </div>

<div class="container">
  <h1 class="login-heading">Create Account</h1>
  <form method='post' action="new-user.php">
    <div class="input-group">
      <input class="rectangle firstname" type="text" name='First_Name' placeholder="First Name" required>
      <input class="rectangle lastname" type="text" name='Last_Name' placeholder="Last Name" required>
    </div>
    <input class="rectangle full-width" type="text" name='Username' placeholder="Username" required>
    <input class="rectangle full-width" type="password" name='Password_' placeholder="Password" required>
    <input class="register-button" type="submit" value="Create">
  </form> 
  <p class="register-text">Already have an account? <a href="../login/login-page.php" class="register-link"><span>Login</span></a></p>
</div>
</body>
</html>
<?php

require_once '../login.php';


$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['Username'])){
  $First_Name = $_POST['First_Name'];
  $Last_Name = $_POST['Last_Name'];
  $Username = $_POST['Username'];
  $Password_ = $_POST['Password_'];
  
  //password_hash code here
  $token = password_hash($Password_, PASSWORD_DEFAULT);

  //code to add user here
  $query = "INSERT INTO user(Username, Password_, First_Name, Last_Name) VALUES ('$Username', '$token', '$First_Name', '$Last_Name')";
  echo "Query: $query"; // Debug statement to check the query
  
  $result = $conn->query($query);
  if(!$result) {
    die("Error: " . $conn->error); // Display the error message
  }
  
  // Redirect the user to the login page after successful registration
  header("Location: ../login/login-page.php");
  exit(); // Exit the script after redirecting
}

$conn->close();

?>
