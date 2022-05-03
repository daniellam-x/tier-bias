<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/homepage.css">
    <link rel="icon" href="images/logo.png">
    <script defer src="./scripts/homescripts.js" defer ></script>
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8"/>
    <meta name="description" content="Tier Bias, a new social media"/>
    <meta name="author" content="Lori VanHoose, Daniel Lam, Jessica Trejo, Brandon Kimble"/>
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
            Tier Bias
        </h1>
        <p id = "abouttext">
            Tier Bias is a list sharing site where users post ranked tier lists about any subject. Friends, family, or just random people online are able to agree or disagree with the original posters tier ranking by up-voting or down-voting on individual items of the lists themselves. The site works showcase the most controversial items on user’s lists by singling out the item in the main feed.
        </p>
    </div>
    
    <div class="sort">
        <p>
            Sort by:
            <button class = sortBy onclick="controversialSort()">Most Controversial</button>
            <button class = sortBy onclick="newestSort()">Newest Post</button>
        </p>
    </div>
    
    <!-- dummy post skeleton, should be removed soon
    <div class="tierpost">
        <h2>Tier Name</h2>
        <p>Information about the tier ranking</p>
    </div>
    -->

    <!-- post-feed container do not remove -->
    <div id="post-feed">

    </div>
    
    <div class="footer">
        <p>
            Lori VanHoose, Daniel Lam, Jessica Trejo, Brandon Kimble - 5/6/2022
        </p>
    </div>
    
</body>
    
</html>

<!-- git feature branch & rebase workflow =
 
    git checkout -b feature_name
    .. make some commits (git add . && git commit)
    git fetch
    git rebase origin/master
    git checkout master && git pull
    git merge feature && git push
    git branch -d feature_name 
    
-->

