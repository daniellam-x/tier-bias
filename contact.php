<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/contact.css">
    
    <script defer src="contactscript.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Tier Bias, a new social media">
    <meta name="author" content="Lori VanHoose, Daniel Lam, Jessica Trejo, Brandon Kimble">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    
    <div class="contact-page">
        <h1>
            <a href="./homepage.php"><img src="./images/logo.png" alt ="Tier Bias Logo" width="50" height="50"/></a>
            Contact Us
        </h1>
        <div>
            <div class="contact-item">
                <h3>Brandon Kimble</h3>
                <a href="mailto:kimble.brandonm@gmail.com">kimble.brandonm@gmail.com</a>
                <p>
                    Hi there! I'm a senior Computational Biology major at the University of Texas at Austin. I've enjoyed honing my programming skills through self-study and UT's Elements of Computing courses and hope to continue my learning journey within the software industry!
                </p>
            </div>
            <div class="contact-item">
                <h3>Daniel Lam</h3>
                <a href="mailto:daniellam@utexas.edu">daniellam@utexas.edu</a>
                <p>
                    Hi! I am a senior Math major at the University of Texas at Austin! I have experience in python, R, and Javascript and am hoping to enter into the Data Science field. In my free time I enjoy dancing and playing video games!
                </p>
            </div>                
            <div class="contact-item">
                <h3>Jessica Trejo</h3>
                <a href="mailto:trejo100@utexas.edu">trejo100@utexas.edu</a>
                <p>
                    Hi, my name Jessica Trejo. I am a senior Health and Society Major at The University of Texas at Austin working towards an Elements of Computing  certificate. I hope to use my degree to help vulnerable communities like the one I come from.
                </p>
            </div>                
            <div class="contact-item">
                <h3>Lori VanHoose</h3>
                <a href="mailto:lvanhoose5@utexas.edu">lvanhoose5@utexas.edu</a>
                <p>
                    Hello! I am a senior at the University of Texas at Austin that is graduating May 2022. My major is Art and Entertainment Technologies with a certificate in Computer Science (18 hours). I have worked as an art director intern, VR assistant, and NASA intern. This shows my diverse skills from developing 3D art assets for VR games to leading teams to complete projects.              
                </p>
            </div>
        </div>
    </div>
    
    <!-- <script src="" async defer></script> -->
    <div class="footer">
        <p>
            Lori VanHoose, Daniel Lam, Jessica Trejo, Brandon Kimble - 4/18/2022/2022
        </p>
    </div>
    
</body>
</html>