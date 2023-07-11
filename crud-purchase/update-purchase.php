<!DOCTYPE html>
	<head>
		<title>Update Purchase</title>
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
        <h1>Update Purchase</h1>
	</body>
</html>

<?php

$page_role = 1; //Need to be admin

require_once  '../login.php';
require_once  '../login/checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['Purchase_ID'])){

    $Purchase_ID = $_GET['Purchase_ID'];

    $query = "SELECT * FROM purchases where Purchase_ID=$Purchase_ID";

    $result = $conn->query($query); 
    if(!$result) die($conn->error);

    $rows = $result->num_rows;

    for($j=0; $j<$rows; $j++)
    {
        //$result->data_seek($j); 
        $row = $result->fetch_array(MYSQLI_ASSOC); 
        
        echo <<<HTML
        <pre>
        <form action='update-purchase.php' method='post'>
            Credit Card: <input type='text' name='Credit_Card' value='{$row['Credit_Card']}' required><br>
            Expiration Date: <input type='date' name='Expiration_Date' value='{$row['Expiration_Date']}' required><br>
            CVV: <input type='text' name='CVV' value='{$row['CVV']}' required><br>
        </pre>
        <input type='hidden' name='update' value='yes'>
        <input type='hidden' name='Purchase_ID' value='{$row['Purchase_ID']}'>
        <input type='submit' class='button' value='UPDATE PURCHASE'>	
        </form>
        HTML;
        
        


    }

}

if (isset($_POST['update'])) {
    $Credit_Card = $_POST['Credit_Card'];
    $Expiration_Date = $_POST['Expiration_Date'];
    $CVV = $_POST['CVV'];
    $Purchase_ID = $_POST['Purchase_ID'];
    
    $query = "UPDATE purchases SET Credit_Card='$Credit_Card', Expiration_Date='$Expiration_Date', CVV='$CVV'
              WHERE Purchase_ID=$Purchase_ID";
    
    $result = $conn->query($query); 
    if (!$result) die($conn->error);
    
    header("Location: view-purchase.php");
    exit();
}

$conn->close();



?>