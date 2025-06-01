<?php


$servername = "localhost";
$database = "xiaomi_shop";
$username = "root";
$password = "";

// Create connection

$mysqli = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}