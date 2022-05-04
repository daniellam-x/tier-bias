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
    
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

    $tier .= "<div class='tierPost'>";
    $tier .= "<span class='material'symbols-outlined'>account_circle</span>";

    $tier .= "<div class='tierContent'>";

    $tier .= "<p class='username'>$row[username]</p>";

    $tier .= "<p class='title'>$row[title]</p>";

    $tier .= "<div class='tier'><span>s</span>";
    $tier .= "<p>$row[s_tier]</p>";

    $tier .= "<p class='upVotes'>$row[s_up]</p>";
    $tier .= "<span class='material-symbols-outlined'>expand_less</span>";
    $tier .= "<span class='material-symbols-outlined'>expand_more</span>";
    $tier .= "<p class='downVotes'>$row[s_down]</p>";
    $tier .= "</div>";
    $tier .= "<div class='tier'><span>a</span>";
    $tier .= "<p>$row[a_tier]</p>";

    $tier .= "<p class='upVotes'>$row[a_up]</p>";
    $tier .= "<span class='material-symbols-outlined'>expand_less</span>";
    $tier .= "<span class='material-symbols-outlined'>expand_more</span>";
    $tier .= "<p class='downVotes'>$row[a_down]</p>";
    $tier .= "</div>";
    $tier .= "<div class='tier'><span>b</span>";
    $tier .= "<p>$row[b_tier]</p>";

    $tier .= "<p class='upVotes'>$row[b_up]</p>";
    $tier .= "<span class='material-symbols-outlined'>expand_less</span>";
    $tier .= "<span class='material-symbols-outlined'>expand_more</span>";
    $tier .= "<p class='downVotes'>$row[b_down]</p>";
    $tier .= "</div>";
    $tier .= "<div class='tier'><span>c</span>";
    $tier .= "<p>$row[c_tier]</p>";

    $tier .= "<p class='upVotes'>$row[c_up]</p>";
    $tier .= "<span class='material-symbols-outlined'>expand_less</span>";
    $tier .= "<span class='material-symbols-outlined'>expand_more</span>";
    $tier .= "<p class='downVotes'>$row[c_down]</p>";
    $tier .= "</div>";
    $tier .= "<div class='tier'><span>d</span>";
    $tier .= "<p>$row[d_tier]</p>";

    $tier .= "<p class='upVotes'>$row[d_up]</p>";
    $tier .= "<span class='material-symbols-outlined'>expand_less</span>";
    $tier .= "<span class='material-symbols-outlined'>expand_more</span>";
    $tier .= "<p class='downVotes'>$row[d_down]</p>";
    $tier .= "</div>";
    $tier .= "<div class='tier'><span>e</span>";
    $tier .= "<p>$row[e_tier]</p>";

    $tier .= "<p class='upVotes'>$row[e_up]</p>";
    $tier .= "<span class='material-symbols-outlined'>expand_less</span>";
    $tier .= "<span class='material-symbols-outlined'>expand_more</span>";
    $tier .= "<p class='downVotes'>$row[e_down]</p>";
    $tier .= "</div>";
    $tier .= "<div class='tier'><span>f</span>";
    $tier .= "<p>$row[f_tier]</p>";

    $tier .= "<p class='upVotes'>$row[f_up]</p>";
    $tier .= "<span class='material-symbols-outlined'>expand_less</span>";
    $tier .= "<span class='material-symbols-outlined'>expand_more</span>";
    $tier .= "<p class='downVotes'>$row[f_down]</p>";
    $tier .= "</div>";

    $tier .= "</div>";
        
    $tier .= "<span class='material-symbols-outlined'>favorite</span>";
    $tier .= "<p class='likes'>$row[tier_likes]</p>";

    $tier .= "</div>";
}

echo $tier;
?>