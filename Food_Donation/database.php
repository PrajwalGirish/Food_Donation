<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "food_donation";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>