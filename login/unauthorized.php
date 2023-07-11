<html>
<head>
    <link rel='stylesheet' href='../styles.css'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

</body>
</html>

<?php

echo "You are not authorized to view this page<br>";
echo "<a href='login-page.php'>back to login</a>";

?>