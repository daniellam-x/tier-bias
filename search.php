<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search</title>
    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/search.css">
    <link rel="stylesheet" href="./styles/base.css?abcde">
    <link rel="stylesheet" href="./styles/search.css?abcde">
    <link rel="icon" href="images/logo.png">
    <script defer src="scripts/searchscript.js"></script>
    <script defer src="scripts/searchscript.js?abc"></script>
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
            //error_reporting(E_ALL);
            //ini_set('display_errors', 1);
        
            $searchword = $_GET['search'];
            //echo "You searched up: ".$searchword."<br>";
            
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
                
                $usersql = "SELECT * FROM tiers WHERE title LIKE '%".$searchword."%'"; 
                //echo "Searching for word.. <br>";
                
                $result = $mysqli->query($usersql);  
            
                if (!$mysqli->query($usersql)) {
                    echo("Error description: ".$mysqli- error);
                    
                } else {
                    
                    $tier = "<div class='tierFeed'>";
                    
                    // For each row found, it is posted
                    while($row = $result->fetch_assoc()){

                        $tier .= "<div class='tierPost' data-tier_id='$row[tier_id]'>";
                        $tier .= "<span class='profile material-symbols-outlined'>account_circle</span>";

                        $tier .= "<div class='tierContent'>";

                        $tier .= "<p class='username'>$row[username]</p>";

                        $tier .= "<p class='title'>$row[title]</p>";

                        // grad data in query.php 
                        $tier .= "<div class='tier'><span class='rank s'>S</span>";
                        $tier .= "<p class='item'>$row[s_tier]</p>";
                        $tier .= "<p class='upVotes'>$row[s_up]</p>";
                        $tier .= "<button class='voteBtn'><span class='material-symbols-outlined'>expand_less</span></button>";
                        $tier .= "<button class='voteBtn'><span class='material-symbols-outlined'>expand_more</span></button>";
                        $tier .= "<p class='downVotes'>$row[s_down]</p>";
                        $tier .= "</div>";

                        $tier .= "<div class='tier'><span class='rank a'>A</span>";
                        $tier .= "<p class='item'>$row[a_tier]</p>";
                        $tier .= "<p class='upVotes'>$row[a_up]</p>";
                        $tier .= "<button class='voteBtn'><span class='material-symbols-outlined'>expand_less</span></button>";
                        $tier .= "<button class='voteBtn'><span class='material-symbols-outlined'>expand_more</span></button>";
                        $tier .= "<p class='downVotes'>$row[a_down]</p>";
                        $tier .= "</div>";

                        if ($row['b_tier']) {
                            $tier .= "<div class='tier'><span class='rank b'>B</span>";
                            $tier .= "<p class='item'>$row[b_tier]</p>";
                            $tier .= "<p class='upVotes'>$row[b_up]</p>";
                            $tier .= "<button class='voteBtn'><span class='material-symbols-outlined'>expand_less</span></button>";
                            $tier .= "<button class='voteBtn'><span class='material-symbols-outlined'>expand_more</span></button>";
                            $tier .= "<p class='downVotes'>$row[b_down]</p>";
                            $tier .= "</div>";
                        }
                        if ($row['c_tier']) {
                            $tier .= "<div class='tier'><span class='rank c'>C</span>";
                            $tier .= "<p class='item'>$row[c_tier]</p>";
                            $tier .= "<p class='upVotes'>$row[c_up]</p>";
                            $tier .= "<button class='voteBtn'><span class='material-symbols-outlined'>expand_less</span></button>";
                            $tier .= "<button class='voteBtn'><span class='material-symbols-outlined'>expand_more</span></button>";
                            $tier .= "<p class='downVotes'>$row[c_down]</p>";
                            $tier .= "</div>";
                        }
                        if ($row['d_tier']) {
                            $tier .= "<div class='tier'><span class='rank d'>D</span>";
                            $tier .= "<p class='item'>$row[d_tier]</p>";
                            $tier .= "<p class='upVotes'>$row[d_up]</p>";
                            $tier .= "<button class='voteBtn'><span class='material-symbols-outlined'>expand_less</span></button>";
                            $tier .= "<button class='voteBtn'><span class='material-symbols-outlined'>expand_more</span></button>";
                            $tier .= "<p class='downVotes'>$row[d_down]</p>";
                            $tier .= "</div>";
                        }
                        if ($row['e_tier']) {
                            $tier .= "<div class='tier'><span class='rank e'>E</span>";
                            $tier .= "<p class='item'>$row[e_tier]</p>";
                            $tier .= "<p class='upVotes'>$row[e_up]</p>";
                            $tier .= "<button class='voteBtn'><span class='material-symbols-outlined'>expand_less</span></button>";
                            $tier .= "<button class='voteBtn'><span class='material-symbols-outlined'>expand_more</span></button>";
                            $tier .= "<p class='downVotes'>$row[e_down]</p>";
                            $tier .= "</div>";
                        }
                        if ($row['f_tier']) {
                            $tier .= "<div class='tier'><span class='rank f'>F</span>";
                            $tier .= "<p class='item'>$row[f_tier]</p>";
                            $tier .= "<p class='upVotes'>$row[f_up]</p>";
                            $tier .= "<button class='voteBtn'><span class='material-symbols-outlined'>expand_less</span></button>";
                            $tier .= "<button class='voteBtn'><span class='material-symbols-outlined'>expand_more</span></button>";
                            $tier .= "<p class='downVotes'>$row[f_down]</p>";
                            $tier .= "</div>";
                        }

                        $tier .= "</div>";

                        $tier .= "<button class='likeBtn'><span class='material-symbols-outlined'>favorite</span></button>";
                        $tier .= "<p class='likes'>$row[tier_likes]</p>";

                        $tier .= "</div>";
                    }

                    $tier .= "</div>";
                    
                }
                
                echo $tier;
                
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