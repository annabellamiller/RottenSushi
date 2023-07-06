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
  <div class="input-group">
    <input class="rectangle" type="text" placeholder="First Name">
    <input class="rectangle" type="text" placeholder="Last Name">
  </div>
  <input class="rectangle" type="email" placeholder="Email">
  <input class="rectangle" type="text" placeholder="Username">
  <input class="rectangle" type="password" placeholder="Password">
  <input class="rectangle" type="password" placeholder="Confirm Password">
  <button class="register-button" type="button" onclick="window.location.href='Login-Page.php'">Register</button>

  <p class="register-text">Already have an account? <a href="Login-Page.php" class="register-link"><span>Login</span></a></p>
</div>
</body>
</html>