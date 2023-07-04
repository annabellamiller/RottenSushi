<html>
<head>
<link rel='stylesheet' href='styles.css'>
<style>
body {
  font-family: Verdana, Arial, sans-serif;
  background-image: url(/Images/LoginPageBackground.png);
  background-repeat: no-repeat;
  background-size: cover;
}
}

.navbar {
  background-color: black;
  height: 55;
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
<div class="navbar">
        <div class="navbar-left">
            <a href="home.php">Rotten Sushi</a>
          </div>  
    </div>
<div class="container">
  <h1 class="login-heading">Login</h1>
  <input class="username rectangle" type="text" placeholder="Username">
  <input class="password rectangle" type="password" placeholder="Password">
 <button class="login-button" type="button" onclick="window.location.href='home.php'">Login</button>
    <p class="register-text">Don't have an account? <a href="CreateNewUser-Page.php" class="register-link"><span>Register</span></a></p>
</div>
</body>
</html>
