<?php
// Connect to mySQL
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "OnlineStore";

$mysqli = new mysqli("localhost", "root", "1234", "OnlineStore");

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>