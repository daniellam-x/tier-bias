<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Tier</title>
    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/createtier.css">
    <link rel="icon" href="images/logo.png">
    <!-- <script defer src="createtierscript.js"></script> -->
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="description" content="Tier Bias, a new social media">
    <meta name="author" content="Lori VanHoose, Daniel Lam, Jessica Trejo, Brandon Kimble">
    <style>
        .center {
            text-align: center;
        }
    </style>
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
            Create Tier
        </h1>
    </div>
    <div class="tierform">
        <!-- <h1>New Tier</h1> -->
        <?php



        if (isset($_POST["confirm"])) {
            thanksPage();
        } else {
            tierForm();
        }


        // #######################################################################

        function tierForm()
        {
            $script = $_SERVER['PHP_SELF'];

            echo "<form method = 'post' action = '$script'>";
            echo "  <div id='form-contents' style='text-align:center'>";
            echo "  </div>";
            echo '</form>';
        }

        // #######################################################################

        function thanksPage()
        {
            if (isset($_POST["tier-title"])) {
                echo "<div class='center'>";
                echo "Tier Title: " . $_POST["tier-title"];
                echo "</div>";
            }

            if (isset($_POST["tier-element"])) {
                $tiers = $_POST["tier-element"];
                echo "<div class='center'>";
                echo "Tier Elements: ";
                print "<ul>";
                foreach ($tiers as $key => $val) {
                    print "<li>";
                    print $val;
                    print "</li>";
                }
                print "</ul>";
                echo "</div>";
            }

            echo "<div class='center'>";
            echo "Your tier has been submitted";
            echo "</div>";
        }


        ?>
    </div>

    <div class="footer">
        <p>
            Lori VanHoose, Daniel Lam, Jessica Trejo, Brandon Kimble - 4/18/2022/2022
        </p>
    </div>



    <script src="./scripts/createtierscripts.js"></script>
</body>

</html>