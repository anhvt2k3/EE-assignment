<?php
include("../db/conn.php");

$start = 0;
$item_per_call = 10;
if (isset($_POST["limit"])) {
    $item_per_call = $_POST['limit'];
} else
    ;
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
} else {
    echo "error";
}

// For Pagination
$pages = ceil($result->num_rows / $item_per_call);
if (isset($_GET["page-no"])) {
    $page = $_GET["page-no"];
    $start = $page * $item_per_call;
}


$sql1 = "SELECT * FROM products LIMIT $start, $item_per_call";
$result1 = mysqli_query($conn, $sql1);
?>