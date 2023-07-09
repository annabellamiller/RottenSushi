<!DOCTYPE html>
<html>
<head>
    <title>Add Movie</title>
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

    <h1>Add A New Movie</h1>

    <div class='addMovie'>
        <p>
            <form action='#' method='post'>
                Movie Name:<br>
                <input type='text' name='Movie_Name' required><br>
                Director:<br>
                <input type='text' name='Director'><br>
                Release Date:<br>
                <input type='date' name='Release_Date' required><br>
                Award:<br>
                <input type='text' name='Award'><br>
                Details:<br>
                <input type='text' name='Details' required><br>
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
