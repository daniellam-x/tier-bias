<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search</title>
    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/search.css">
    <link rel="icon" href="images/logo.png">
    <script defer src="searchscript.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="description" content="ENTER DESCRIPTION HERE">
    <meta name="author" content="ENTER NAME HERE">
</head> 
    
<body>
    <div class="topNav">
        <div class="leftNav">
            <a href="homepage.php">
                <img src="images/logo.png" alt ="Tier Bias Logo" width="30" height="30">
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
                    } else { echo "<li><a href='login.php'>Login</a></li>"; }
                ?>
            </ul>
        </div>
    </div>
    
    <div class="content">
        <h1>
            <a href="./homepage.php"><img src="./images/logo.png" alt ="Tier Bias Logo" width="50" height="50"/></a>
            Search
        </h1>
    </div>
    
    <div class="search">
        <form>
            <input type="text" id="search" name="search" value="Search here"><br>
        </form>
    </div>
    
    <div class="footer">
        <p>
            Lori VanHoose, Daniel Lam, Jessica Trejo, Brandon Kimble - 4/14/2022
        </p>
    </div>

</body>
</html>