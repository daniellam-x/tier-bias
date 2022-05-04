<?php
error_reporting(E_ALL);
ini_set("display_errors", "on");

$server = "spring-2022.cs.utexas.edu";
$user   = "cs329e_bulko_brandonk";
$pwd    = "medal&high4smoke";
$dbName = "cs329e_bulko_brandonk";

$mysqli = new mysqli($server, $user, $pwd, $dbName);

if ($mysqli->connect_errno) {
    die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
}

$mysqli->select_db($dbName) or die($mysqli->error);

$sort = $_GET['sort'];

if ($sort == 'new') {
    $select = "SELECT * FROM tiers ORDER BY date_created DESC";
    $query = $mysqli->prepare($select);
    $query->execute();
    ($result = $query->get_result()) or die("<script type='text/javascript'>alert('Query failed: (" . $query->error . ")');</script>");
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

        $tier .= "<div class='tierPost'>";
        $tier .= "<span class='material'symbols-outlined'>account_circle</span>";

        $tier .= "<div class='tierContent'>";

        $tier .= "<p class='username'>$row[username]</p>";

        $tier .= "<p class='title'>$row[title]</p>";

        $tier .= "<div class='tier'><span>s</span>";
        $tier .= "<p><!-- tier item goes here --></p>";

        $tier .= "<p class='upVotes'><!-- upvote count here --></p>";
        $tier .= "<span class='material-symbols-outlined'>expand_less</span>";
        $tier .= "<span class='material-symbols-outlined'>expand_more</span>";
        $tier .= "<p class='downVotes'><!-- upvote count here --></p>";
        $tier .= "</div>";
        $tier .= "<div class='tier'><span>a</span>";
        $tier .= "<p><!-- tier item goes here --></p>";

        $tier .= "<p class='upVotes'><!-- upvote count here --></p>";
        $tier .= "<span class='material-symbols-outlined'>expand_less</span>";
        $tier .= "<span class='material-symbols-outlined'>expand_more</span>";
        $tier .= "<p class='downVotes'><!-- upvote count here --></p>";
        $tier .= "</div>";
        $tier .= "<div class='tier'><span>b</span>";
        $tier .= "<p><!-- tier item goes here --></p>";

        $tier .= "<p class='upVotes'><!-- upvote count here --></p>";
        $tier .= "<span class='material-symbols-outlined'>expand_less</span>";
        $tier .= "<span class='material-symbols-outlined'>expand_more</span>";
        $tier .= "<p class='downVotes'><!-- upvote count here --></p>";
        $tier .= "</div>";
        $tier .= "<div class='tier'><span>c</span>";
        $tier .= "<p><!-- tier item goes here --></p>";

        $tier .= "<p class='upVotes'><!-- upvote count here --></p>";
        $tier .= "<span class='material-symbols-outlined'>expand_less</span>";
        $tier .= "<span class='material-symbols-outlined'>expand_more</span>";
        $tier .= "<p class='downVotes'><!-- upvote count here --></p>";
        $tier .= "</div>";
        $tier .= "<div class='tier'><span>d</span>";
        $tier .= "<p><!-- tier item goes here --></p>";

        $tier .= "<p class='upVotes'><!-- upvote count here --></p>";
        $tier .= "<span class='material-symbols-outlined'>expand_less</span>";
        $tier .= "<span class='material-symbols-outlined'>expand_more</span>";
        $tier .= "<p class='downVotes'><!-- upvote count here --></p>";
        $tier .= "</div>";
        $tier .= "<div class='tier'><span>e</span>";
        $tier .= "<p><!-- tier item goes here --></p>";

        $tier .= "<p class='upVotes'><!-- upvote count here --></p>";
        $tier .= "<span class='material-symbols-outlined'>expand_less</span>";
        $tier .= "<span class='material-symbols-outlined'>expand_more</span>";
        $tier .= "<p class='downVotes'><!-- upvote count here --></p>";
        $tier .= "</div>";
        $tier .= "<div class='tier'><span>f</span>";
        $tier .= "<p><!-- tier item goes here --></p>";

        $tier .= "<p class='upVotes'><!-- upvote count here --></p>";
        $tier .= "<span class='material-symbols-outlined'>expand_less</span>";
        $tier .= "<span class='material-symbols-outlined'>expand_more</span>";
        $tier .= "<p class='downVotes'><!-- upvote count here --></p>";
        $tier .= "</div>";

        $tier .= "</div>";
            
        $tier .= "<span class='material-symbols-outlined'>favorite</span>";
        $tier .= "<p class='likes'><!-- like count here --></p>";

        $tier .= "</div>";
    }
}
// CHECK
$select = "SELECT * FROM passwords WHERE username = ?";
$query = $mysqli->prepare($select);
$query->bind_param("s", $username);
$query->execute();
($result = $query->get_result()) or die("<script type='text/javascript'>alert('Query failed: (" . $query->error . ")');</script>");
if ($result->num_rows == 0) {
    // INSERT
    $insert = "INSERT INTO passwords VALUES (?, ?)";
    $query = $mysqli->prepare($insert);
    $query->bind_param("ss", $username, $password);
    $query->execute();
    if ($query->error) {
        die("<script type='text/javascript'>alert('Query failed: (" . $query->error . ")');</script>");
    } else {
        echo "New user registered";
    }
} else {
    $row = $result->fetch_assoc();
    if ($password != $row['password']) {
        // UPDATE
        $update = "UPDATE passwords SET password = ? WHERE username = ?";
        $query = $mysqli->prepare($update);
        $query->bind_param("ss", $password, $username);
        $query->execute();
        if ($query->error) {
            die("<script type='text/javascript'>alert('Query failed: (" . $query->error . ")');</script>");
        } else {
            echo "Password changed";
        }
    } else {
        // CONFIRM
        echo "User and password confirmed";
    }
}
?>