<!DOCTYPE html>
<html>
<head>
    <title>Add Movie</title>
    <link rel='stylesheet' href='../styles.css'>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <style>
        /* Updated CSS styles */
        .container {
            text-align: center;
            font-family: Verdana, Arial, sans-serif;
        }

        .rectangle {
            border: 3px solid #000000;
            height: 58px;
            width: 100%;
            text-align: left;
            border-radius: 35px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            margin-bottom: 25px;
        }

    .firstname,
  	.lastname {
    color: black;
    font-size: 20px;
    font-weight: bold;
    line-height: 58px;
    padding-left: 15px;
  }
        .register-button {
            background-color: #FF1A1A;
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
        }

        input[type='date'] {
            font-size: 20px;
            margin-top: 10px;
        }

        label[for='birth_date'] {
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
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

    <div class="container">
        <h1>Add A New Actor</h1>
        <div class='addMovie'>
            <p>
                <h4>Add Actor</h4>
                <form action='add-actor.php' method='post'>
             
                    
                       <input class="firstname rectangle" type="text" name='First Name' placeholder="First Name">
    <input class="lastname rectangle" type="Last Name" name='Last Name' placeholder="Last Name">
                    </div>
          
                    <label for="birth_date" style="font-weight: bold; margin-bottom: 10px;">Date of Birth:</label><br>
                    <input type='date' name='Birth_Date' id="birth_date"><br><br>
                    <input type='submit' value='REGISTER' class="register-button">
                </form>                
            </p>
        </div>
    </div>
</body>
</html>

<?php
$page_role = 0; //Need to be logged in

require_once  '../login.php';
require_once  '../login/checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);


//check if name exists
if(isset($_POST['First_Name'])) 
{
    //Get data from POST object
    $First_Name = $_POST['First_Name'];
    $Last_Name = $_POST['Last_Name'];
    $Date_of_Birth = $_POST['Birth_Date'];
    
    //echo $First_Name.'<br>';
    
    $query = "INSERT INTO Actor (First_Name, Last_Name, Date_of_Birth) VALUES ('$First_Name', '$Last_Name','$Date_of_Birth')";
    
    //echo $query.'<br>';
    $result = $conn->query($query); 
    if(!$result) die($conn->error);
    
    header("Location: view-actor.php");
        
}

echo "<br><br>";
$query = "SELECT CONCAT(a.First_Name, ' ', a.Last_Name) AS Actor_Name
            FROM actor a
            INNER JOIN roles r ON r.Actor_ID = a.Actor_ID
            GROUP BY a.Actor_ID
            ORDER BY COUNT(r.Actor_ID) DESC
            LIMIT 1;
            ";

$result = $conn->query($query);
if (!$result) die($conn->error);

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    echo "Current Most Popular Actor: {$row['Actor_Name']} <br>";
}


$conn->close();

?>
