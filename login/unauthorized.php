<html>
<head>
    <link rel='stylesheet' href='../styles.css'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<!--Navigation bar-->
 <div class='navbar'>
      <div class="navbar-left">
        <a href='/rottensushi/home.php'>Rotten Sushi</a>
        <img src='\RottenSushi\Images\logo.jpg' alt='Rotten Sushi Logo' style="display: flex; align-items: center; width: 50px; height: auto; margin-right: 10px;">
      </div>
    </div>

</body>
</html>

<?php

echo "You are not authorized to view this page<br>";
echo "<a href='logout.php'>back to login</a>";

?>