<!DOCTYPE html>
<head>
    <title>View Actors</title>
    <link rel='stylesheet' href='../styles.css'>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <style>
        /* Updated CSS styles */
        .container {
            text-align: center;
            font-family: Verdana, Arial, sans-serif;
        }

        .actor-container {
            border: 3px solid #000000;
            border-radius: 25px;
            padding: 10px;
            margin-bottom: 20px;
        }

        .actor-info {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .delete-button {
            background-color: #FF1A1A;
            color: white;
            font-size: 16px;
            font-weight: bold;
            line-height: 36px;
            width: 200px;
            border-radius: 25px;
            border: none;
            cursor: pointer;
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
        <h1>View Actor List</h1>
        <?php
        $page_role = 0; //Need to be logged in

        require_once  '../login.php';
        require_once  '../login/checksession.php';

        $conn = new mysqli($hn, $un, $pw, $db);
        if($conn->connect_error) die($conn->connect_error);

        $query = "SELECT * FROM Actor";

        $result = $conn->query($query); 
        if(!$result) die($conn->error);

        //show results
        if($result->num_rows > 0){
            // Output data of each row
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                echo "<div class='actor-container'>";
                echo "<div class='actor-info'>";
                echo "Actor: <a href='update-actor.php?Actor_ID=$row[Actor_ID]'>$row[First_Name] $row[Last_Name]</a><br>";
                echo "Date of Birth: $row[Date_of_Birth]<br>";
                echo "</div>";
                echo "<form action='delete-actor.php' method='post'>";
                echo "<input type='hidden' name='delete' value='yes'>";
                echo "<input type='hidden' name='Actor_ID' value='$row[Actor_ID]'>";
                echo "<input type='submit' class='delete-button' value='DELETE ACTOR'>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "No data found.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
