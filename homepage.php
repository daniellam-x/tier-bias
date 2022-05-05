<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/homepage.css">
    <link rel="icon" href="images/logo.png">
    <script defer src="./scripts/homescripts.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat&family=Open+Sans:wght@400;700&family=Raleway&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <meta charset="UTF-8" />
    <meta name="description" content="Tier Bias, a new social media" />
    <meta name="author" content="Lori VanHoose, Daniel Lam, Jessica Trejo, Brandon Kimble" />
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
        <a href="./homepage.php"><img src="./images/logo.png" alt="Tier Bias Logo" width="50" height="50" /></a>
        <h1>Welcome</h1>
        <p id="abouttext">
            Tier Bias is a list sharing site where users post ranked tier lists about any subject. Friends, family, or just random people online are able to agree or disagree with the original posters tier ranking by up-voting or down-voting on individual items of the lists themselves. The site works to showcase the most controversial items on user’s lists by singling out the item in the main feed.
        </p>
    </div>

    <div class="sort">
        <p>
            Sort by
            <button id="likeSort" class=sortBy>Most Liked</button>
            <button id="newSort" class=sortBy>Newest</button>
        </p>
    </div>

    <div id='ajaxDiv'>
        <!-- <div class="tierFeed"> -->

        <!-- <div class="tierPost">
    
                <span class="material-symbols-outlined">account_circle</span>
    
                <div class="tierContent">
                    <p class="username"></p>
                    <p class="title"></p>
    
                    <div class="tier"><span>s</span>
                        <p></p>
                        <p class="upVotes"></p>
                        <span class="material-symbols-outlined">expand_less</span>
                        <span class="material-symbols-outlined">expand_more</span>
                        <p class="downVotes"></p>
                    </div>
                    <div class="tier"><span>a</span>
                        <p></p>
                        <p class="upVotes"></p>
                        <span class="material-symbols-outlined">expand_less</span>
                        <span class="material-symbols-outlined">expand_more</span>
                        <p class="downVotes"></p>
                    </div>
                    <div class="tier"><span>b</span>
                        <p></p>
                        <p class="upVotes"></p>
                        <span class="material-symbols-outlined">expand_less</span>
                        <span class="material-symbols-outlined">expand_more</span>
                        <p class="downVotes"></p>
                    </div>
                    <div class="tier"><span>c</span>
                        <p></p>
                        <p class="upVotes"></p>
                        <span class="material-symbols-outlined">expand_less</span>
                        <span class="material-symbols-outlined">expand_more</span>
                        <p class="downVotes"></p>
                    </div>
                    <div class="tier"><span>d</span>
                        <p></p>
                        <p class="upVotes"></p>
                        <span class="material-symbols-outlined">expand_less</span>
                        <span class="material-symbols-outlined">expand_more</span>
                        <p class="downVotes"></p>
                    </div>
                    <div class="tier"><span>e</span>
                        <p></p>
                        <p class="upVotes"></p>
                        <span class="material-symbols-outlined">expand_less</span>
                        <span class="material-symbols-outlined">expand_more</span>
                        <p class="downVotes"></p>
                    </div>
                    <div class="tier"><span>f</span>
                        <p></p>
                        <p class="upVotes"></p>
                        <span class="material-symbols-outlined">expand_less</span>
                        <span class="material-symbols-outlined">expand_more</span>
                        <p class="downVotes"></p>
                    </div>
                </div>
    
                <span class="material-symbols-outlined">favorite</span>
                <p class="likes"></p>
    
            </div>
    
        </div> -->

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