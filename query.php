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

if ($sort == 'likes') {
    
    $select = "SELECT * FROM tiers ORDER BY tier_likes DESC";
    $query = $mysqli->prepare($select);
    $query->execute();
    ($result = $query->get_result()) or die("<script type='text/javascript'>alert('Query failed: (" . $query->error . ")');</script>");

} else {

    $select = "SELECT * FROM tiers ORDER BY date_created DESC";
    $query = $mysqli->prepare($select);
    $query->execute();
    ($result = $query->get_result()) or die("<script type='text/javascript'>alert('Query failed: (" . $query->error . ")');</script>");

}
$tier  = "";
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

    $tier .= "<div class='tierPost'>";
    $tier .= "<span class='profile material-symbols-outlined'>account_circle</span>";

    $tier .= "<div class='tierContent'>";

    $tier .= "<p class='username'>$row[username]</p>";

    $tier .= "<p class='title'>$row[title]</p>";

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

echo $tier;
?>