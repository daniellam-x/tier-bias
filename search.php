<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search</title>
    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/search.css">
    <link rel="icon" href="images/logo.png">
    <script defer src="scripts/searchscript.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <meta charset="UTF-8">
    <meta name="description" content="ENTER DESCRIPTION HERE">
    <meta name="author" content="ENTER NAME HERE">
</head>

<body>
    <div class="topNav">
        <div class="leftNav">
            <a href="homepage.php">
                <img src="images/logo.png" alt="Tier Bias Logo" width="30" height="30">
                <h1>Tier Bias</h1>
            </a>
        </div>

        <div class="rightNav">
            <ul>
                <li><a href="homepage.php">Home</a></li>
                <li><a href="createtier.php">Create Tier</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <!-- <li><a href="login.php">Login</a></li> -->
                <?php
                if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
                    echo "<li><a href='user.php'>" . $_SESSION['username'] . "</a></li>";
                } else {
                    echo "<li><a href='login.php'>Login</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="content">
        <h1>
            <a href="./homepage.php"><img src="./images/logo.png" alt="Tier Bias Logo" width="50" height="50" /></a>
            Search
        </h1>
    </div>

    <div class="search">
        <form method="get">
            <input type="text" id="search" name="search"><br>
        </form>
    </div>

    <div class="content">

        <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
        
            $searchword = $_GET['search'];
            echo "You searched up: ".$searchword."<br>";
            
            // Database parameters
            $server = "spring-2022.cs.utexas.edu";
            $user   = "cs329e_bulko_brandonk";
            $pwd    = "medal&high4smoke";
            $dbName = "cs329e_bulko_brandonk";
            
            // Connects to server
            $mysqli = new mysqli($server, $user, $pwd, $dbName);
            
            if ($mysqli->connect_errno) {
                die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
            }
        
            // Makes sure field is filled
            if ($searchword != "") {
                
                $usersql = "SELECT * FROM tiers WHERE title='".$searchword."'"; 
                echo "Searching for word.. <br>";
                
                $result = $mysqli->query($usersql);  
            
                if (!$mysqli->query($usersql)) {
                    echo("Error description: ".$mysqli- error);
                    
                } else {
                    
                    // For each row found, it is posted
                    while($row = $result->fetch_assoc()){
                        echo "Title: " . $row["title"]. " - Written by: " . $row["username"]."<br>";
                    }
                    
                }
                
            }
            
            // Exits server
            $mysqli->close();

        ?>

    </div>

    <div class="footer">
        <p>
            Lori VanHoose, Daniel Lam, Jessica Trejo, Brandon Kimble - 5/6/2022
        </p>
    </div>

</body>

</html>