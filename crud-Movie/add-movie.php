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

        .moviename,
        .director,
        .award,
        .details {
            color: black;
            font-size: 20px;
            font-weight: bold;
            line-height: 58px;
            padding-left: 15px;
        }

        input[type='date'] {
            font-size: 20px;
            margin-top: 10px;
        }

        label[for='release_date'] {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .addMovie input[type='submit'] {
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
                #actor {
            font-size: 18px;
            height: 150px;
        }

        label[for='actor'] {
            font-weight: bold;
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
        <h1>Add A New Movie</h1>

        <div class='addMovie'>
            <p>
                <h4>Add Movie</h4>
                <form action='#' method='post'>
                
            
      <input class="moviename rectangle" type="text" name='Movie_Name' placeholder="Movie Name">
      <input class="director rectangle" type="text" name='Director' placeholder="Director">
     <input class="award rectangle" type="text" name='Award' placeholder="Award">
     <input class="details rectangle" type="text" name='Details' placeholder="Details">
                    
                    <label for="release_date" style="font-weight: bold; margin-bottom: 10px;">Release Date:</label><br>
                    <input type='date' name='Release_Date' id="birth_date"><br><br>

                    <label for='actor'>Actors:</label><br>
                    <select id='actor' name='actor[]' multiple>
                        <?php
                        require_once '../login.php';
                        $conn = new mysqli($hn, $un, $pw, $db);
                        if ($conn->connect_error) die($conn->connect_error);

                        $query = "SELECT * FROM Actor";
                        $result = $conn->query($query);
                        if (!$result) die($conn->error);

                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                            $actorID = $row['Actor_ID'];
                            $firstName = $row['First_Name'];
                            $lastName = $row['Last_Name'];
                            echo "<option value='$actorID'>$firstName $lastName</option>";
                        }

                        $result->close();
                        $conn->close();
                        ?>
                    </select> <br><br>
                    <input type='submit' value='SUBMIT' class="button">
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

if(isset($_POST['Movie_Name'])) {
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    // Prepare the statement
    $query = "INSERT INTO Movie (Movie_Name, Release_Date, Director, Award, Details) 
              VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    // Get data from POST object
    $Movie_Name = $_POST['Movie_Name'];
    $Release_Date = $_POST['Release_Date'];
    $Director = $_POST['Director'];
    $Award = $_POST['Award'];
    $Details = $_POST['Details'];
    
    // Bind parameters and execute the statement
    $stmt->bind_param("sssss", $Movie_Name, $Release_Date, $Director, $Award, $Details);
    $result = $stmt->execute();
    if(!$result) die($stmt->error);

    $movieID = $stmt->insert_id;
    $stmt->close();

    // Get the selected actors
    if(isset($_POST['actor'])) {
        $actors = $_POST['actor'];
        foreach ($actors as $actorID) {
            $query = "INSERT INTO roles (Movie_ID, Actor_ID) VALUES (?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $movieID, $actorID);
            $result = $stmt->execute();
            if(!$result) die($stmt->error);
            $stmt->close();
        }
    }
    
    $conn->close();
    header("Location: ../home.php");
    exit();
}
?>
