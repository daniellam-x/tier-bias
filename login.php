<?php
error_reporting(E_ALL);
ini_set("display_errors", "on");
session_start();
// session_unset();
// session_destroy();

$server = "spring-2022.cs.utexas.edu";
$user   = "cs329e_bulko_brandonk";
$pwd    = "medal&high4smoke";
$dbName = "cs329e_bulko_brandonk";

$mysqli = new mysqli($server, $user, $pwd, $dbName);

if ($mysqli->connect_errno) {
    die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
}

$mysqli->select_db($dbName) or die($mysqli->error);

$error = "";

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "* " . " Please fill all the required fields";
    } else if (!preg_match('/^[A-Za-z0-9]{3,}$/', $_POST['username'])) {
        $error = "*" . " Username must contain at least three characters with only letters and digits";
    } else if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/', $_POST['password'])) {
        $error = "*" . " Password must contain at least eight characters, one letter, one number and one special character";
    } else {
        // username valid, so check if already exists
        $select = "SELECT * FROM users WHERE username = ?";
        $query = $mysqli->prepare($select);
        $query->bind_param("s", $username);
        $query->execute();
        ($result = $query->get_result()) or die("<script type='text/javascript'>alert('Query failed: (" . $query->error . ")');</script>");
        if ($result->num_rows == 0) {
            $error = "*" . " Username not found";
        } else {
            $row = $result->fetch_assoc();
            if ($password != $row['password']) {
                $error = "*" . " Incorrect username or password";
            } else {
                $_SESSION['loggedIn'] = true;
                $_SESSION['username'] = $username;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
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
                    header("Location:user.php");
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
            <div id="loginErr">
                <?php
                if (isset($_POST['submit']) && isset($error)) {
                    echo "<p style='color:red; font-size:.75em;'>" . $error . "</p>";
                }
                ?>
            </div>
            <div class="buttons">
                <button type="submit" name="submit" id="registerBtn">Log in</button>
                <button type="reset" name="reset" id="clearBtn">Clear</button>
            </div>
        </form>
    </div>
    <div id="container2">
        <p>Don't have an account?  <a href="register.php">Sign up</a></p>
    </div>


    <div class="footer">
        <p>
            Lori VanHoose, Daniel Lam, Jessica Trejo, Brandon Kimble - 5/6/2022
        </p>
    </div>

</body>
</html>