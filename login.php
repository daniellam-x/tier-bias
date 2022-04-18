<?php
    error_reporting(E_ALL);
    ini_set("display_errors", "on");
    session_start();
    // session_unset();
    // session_destroy();

    $error = "";

    if (isset($_POST['submit'])) {
        if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['repeat'])) {
            $error = "*" . "Please fill all the required fields";
        } else if (!preg_match('/^[A-Za-z0-9]{3,}$/', $_POST['username'])) {
            $error = "*" . "Username must contain at least three characters with only letters and digits";
        } else if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/', $_POST['password'])) {
            $error = "*" . "Password must contain at least eight characters, one letter, one number and one special character";
        } else if ($_POST['password'] !== $_POST['repeat']) {
            $error = "*" . "Password and the repeat password must match";
        } else {
            $_SESSION['loggedIn'] = true;
            $username = $_POST['username'];
            $_SESSION['username'] = $username;
        };
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Log-In</title>
    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/login.css">
    <link rel="icon" href="images/logo.png">
    <!-- <script defer src="loginscript.js"></script> -->
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="description" content="Tier Bias, a new social media">
    <meta name="author" content="Lori VanHoose, Daniel Lam, Jessica Trejo, Brandon Kimble">
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
                        // unset($_SESSION['loggedIn']);
                        // unset($_SESSION['username']);
                    } else {
                        echo "<li><a href='login.php'>Login</a></li>";
                    }
                ?>
            </ul>
        </div>
    </div>

    <div id="container">
        <div class="login">
            <img src="images/logo.png" class="logo" width="30" height="30">`
            <h1>Login</h1>
        </div>

        <form action="login.php" method="post">
            <div class="field">
                <input name="username" type="text" placeholder="username">
            </div>
            <div class="field">
                <input name="password" type="password" placeholder="password">
            </div>
            <div class="field">
                <input name="repeat" type="password" placeholder="repeat password">
            </div>
            <?php
                if (isset($_POST['submit']) && isset($error)) {
                    echo "<p style='color:red; font-size:.75em; padding-top:1em;'>" . $error . "</p>";
                }
            ?>
            <div class="buttons">
                <button type="submit" name="submit" id="registerBtn">Login</button>
                <button type="reset" name="reset" id="clearBtn">Clear</button>
            </div>
        </form>
    </div>


    <div class="footer">
        <p>
            Lori VanHoose, Daniel Lam, Jessica Trejo, Brandon Kimble - 4/18/2022/2022
        </p>
    </div>

</body>

</html>