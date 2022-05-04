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

        error_reporting(E_ALL);
        ini_set('display_errors', 1);


        if (isset($_POST["confirm"])) {
            thanksPage();
        } else {
            tierForm();
        }


        // #######################################################################

        function tierForm()
        {
            $script = $_SERVER['PHP_SELF'];

            echo "<form method = 'post' action = '$script' onsubmit='return validateForm()'>";
            echo "  <div id='form-contents' style='text-align:center'>";
            echo "  </div>";
            echo '</form>';
        }

        function insertTier($sql) {
            $username = "\"Brandon\"";
            $title = "NULL";
            $s_tier = "NULL";
            $a_tier = "NULL";
            $b_tier = "NULL";
            $c_tier = "NULL";
            $d_tier = "NULL";
            $e_tier = "NULL";
            $f_tier = "NULL";
            if (isset($_POST["tier-title"])) {
                $title = $_POST["tier-title"];
                $title = "\"$title\"";
            }

            if (isset($_POST["tier-element"])) {
                $tiers = $_POST["tier-element"];
                if (isset($tiers["s_tier"])) {
                    $s_tier = $tiers["s_tier"];
                    $s_tier = "\"$s_tier\"";
                }
                if (isset($tiers["a_tier"])) {
                    $a_tier = $tiers["a_tier"];
                    $a_tier = "\"$a_tier\"";
                }
                if (isset($tiers["b_tier"])) {
                    $b_tier = $tiers["b_tier"];
                    $b_tier = "\"$b_tier\"";
                }
                if (isset($tiers["c_tier"])) {
                    $c_tier = $tiers["c_tier"];
                    $c_tier = "\"$c_tier\"";
                }
                if (isset($tiers["d_tier"])) {
                    $d_tier = $tiers["d_tier"];
                    $d_tier = "\"$d_tier\"";
                }
                if (isset($tiers["e_tier"])) {
                    $e_tier = $tiers["e_tier"];
                    $e_tier = "\"$e_tier\"";
                }
                if (isset($tiers["f_tier"])) {
                    $f_tier = $tiers["f_tier"];
                    $f_tier = "\"$f_tier\"";
                }
            }
            
            $command = "INSERT INTO tiers (username, title, s_tier, a_tier, b_tier, c_tier, d_tier, e_tier, f_tier) VALUES ";
            $format = "( %s, %s, %s, %s, %s, %s, %s, %s, %s)";
            $args = sprintf($format, $username, $title, $s_tier, $a_tier, $b_tier, $c_tier, $d_tier, $e_tier, $f_tier);
            $command = $command . $args;
            try {
                $result = $sql->query($command);
                if($result) {
                    return "Success";
                } else {
                    return "Error";
                }
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }

            return "Error";
        }

        function thanksPage()
        {

            $server = "spring-2022.cs.utexas.edu";
            $user   = "cs329e_bulko_brandonk";
            $pwd    = "medal&high4smoke";
            $dbName = "cs329e_bulko_brandonk";
    
            $mysqli = new mysqli($server, $user, $pwd, $dbName);
    
            if ($mysqli->connect_errno) {
                die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
            }
    

            $res = insertTier($mysqli);

            if (isset($_POST["tier-title"])) {
                echo "<div class='center'>";
                echo "Tier Title: " . $_POST["tier-title"];
                echo "</div>";
            }

            if (isset($_POST["tier-element"])) {
                $tiers = $_POST["tier-element"];
                echo "<div id='tier-submit-page' class='center'>";
                echo "Tier Elements: ";
                print "<ul>";
                foreach ($tiers as $key => $val) {
                    print "<li>";
                    print $key . "  " . $val;
                    print "</li>";
                }
                print "</ul>";
                echo "</div>";
            }
            if($res == "Success") {
                echo "<div class='center'>";
                echo "Your tier has been submitted";
                echo "</div>";
            } else {
                echo "<div class='center'>";
                echo "Your tier failed to be submitted";
                echo "</div>";
            }
           
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