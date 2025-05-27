<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'xiaomi_shop';

$conn = new mysqLi($server, $user, $pass, $database);
if ($conn) {
    mysqli_query($conn, " SET NAMES 'utf8' ");
    echo 'success';
} else {
    echo 'failed';
}
