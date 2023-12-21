<?php

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

// define variables and set to empty values
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

mysqli_close($conn);

$stmt = $mysqli->prepare("SELECT * FROM users WHERE userName = ?;");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$result1 = $row["pass"];

if ($result1 == $_POST['password']) {
    session_start();
    $_SESSION['username'] = $email;
    header('Location: ../index.html');
    exit;
} else {
    $msg = "failed";
    header("Location: ../screens/login.php?msg=" . $msg);
    exit;
}


?>