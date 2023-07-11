<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='styles.css'>
    <title>Movies</title>
    <style>
        body {
            background-color: #fff; /* Set the background color to white */
            font-family: Verdana, Arial, sans-serif;
        }
        
        .movie {
            width: calc(100% / 6 - 40px); /* Adjust the width to evenly distribute the movies */
            margin: 20px;
            text-align: center;
            color: #fff;
            display: inline-block; /* Use inline-block instead of flex */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a slight drop shadow */
        }
        .poster {
            width: 100%;
            height: 400px; /* Increase the height to accommodate the movie title */
            background: #000;
            margin-bottom: 10px;
            border-radius: 35px;
            overflow: hidden;
            position: relative; /* Position the movie title */
            object-fit: cover; /* Adjust the movie poster fit */
        }
        .poster img {
            width: 200px; /* Set the fixed width */
            height: 300px; /* Set the fixed height */
            border-radius: 20px;
            object-fit: cover; /* Adjust the image fit */
            margin-top: 20px; /* Add margin to the top of the image */
        }
        .movie a {
            position: absolute;
            bottom: 10px; /* Add margin of 5px from the bottom */
            left: 0;
            width: 100%;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.7); /* Add background color to make the text more readable */
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
            color: #C049F8; /* Set the color of the movie title */
            box-sizing: border-box;
            text-decoration: none; /* Remove underline */
        }
        .movie-row {
            display: flex;
            justify-content: space-between;
        }
        .movie:hover {
            box-shadow: 0 0 20px rgba(255,255,255,0.5);
        }
        .button {
            background-color: #4CAF50; /* Green */
        }

        /* Media Queries */
        @media (max-width: 1200px) {
            .movie {
                width: calc(100% / 5 - 40px);
            }
        }

        @media (max-width: 992px) {
            .movie {
                width: calc(100% / 4 - 40px);
            }
        }

        @media (max-width: 768px) {
            .movie {
                width: calc(100% / 3 - 40px);
            }
        }

        @media (max-width: 576px) {
            .movie {
                width: calc(100% / 2 - 40px);
            }
        }

        @media (max-width: 400px) {
            .movie {
                width: calc(100% - 40px);
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
    <!--Navigation bar-->
    <div id="nav-placeholder"></div>
    <script>
        $(function(){
        $("#nav-placeholder").load("nav.php");
        });
    </script>
    <!--end of Navigation bar-->
    
    <!-- Movie Divs -->
    <?php
    $page_role = 0; //Need to be logged in

    require_once  './login.php';
    require_once($_SERVER['DOCUMENT_ROOT'] . '/rottensushi/login/checksession.php');


    $conn = new mysqli($hn, $un, $pw, $db);
    if($conn->connect_error) die($conn->connect_error);

    $query = "SELECT * FROM movie";

    $result = $conn->query($query); 
    if(!$result) die($conn->error);

    //show results
    if($result->num_rows > 0){
        $count = 0; // Variable to keep track of movies per row

        // Output data of each row
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            // Start a new row if the current count is divisible by 6
            if ($count % 6 === 0) {
                echo '<div class="movie-row">';
            }

            echo <<< _END
            <div class="movie">
                <div class="poster">
                    <a href="/rottensushi/crud-Movie/movie-description.php?Movie_ID={$row['Movie_ID']}"><span style="margin-bottom: 5px;">{$row['Movie_Name']}</span></a>
                    <img src="Images/{$row['Movie_ID']}.jpg" alt="insert {$row['Movie_Name']} image here">
                </div>
            </div>
_END;

            $count++;

            // Close the row if the current count is divisible by 6 or it's the last movie
            if ($count % 6 === 0 || $count === $result->num_rows) {
                echo '</div>';
            }
        }
    } 
    else {
        echo "No data found.";
    }

    $conn->close();
    ?>
    <!-- End Movie Divs -->
</body>
</html>
