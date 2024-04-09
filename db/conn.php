<?php
// Connect to mySQL
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "OnlineStore";

$mysqli = new mysqli("localhost", "root", "root", "OnlineStore");

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>