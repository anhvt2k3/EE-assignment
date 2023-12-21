<?php
session_start();
include("../db/conn.php");

$email = $_POST["email"];
$password = $_POST["password"];

$stmt = $mysqli->prepare("INSERT INTO users(username, pass) VALUE (?, ?);");
$stmt->bind_param("ss", $email, $password);

if ($stmt->execute() === TRUE) {
    $_SESSION['username'] = $email;
    header("Location: ../index.html");
    exit();
} else {
    echo "Failed";
}
?>