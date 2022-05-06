<?php
session_start();
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

$id = $_GET['id'];


$mysqli->select_db($dbName) or die($mysqli->error);

if (isset($_SESSION["username"])) {
    $select = "UPDATE tiers SET tier_likes = tier_likes + 1 WHERE tier_id = $id";
    $query = $mysqli->prepare($select);
    $query->execute();
    ($result = $query->get_result()) or die("<script type='text/javascript'>alert('Query failed: (" . $query->error . ")');</script>");    
}

?>