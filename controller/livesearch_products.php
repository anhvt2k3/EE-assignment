<?php
include("../db/conn.php");

if (isset($_POST["input"])) {
    $input = $_POST["input"];

    $query = "SELECT * FROM products WHERE productName LIKE '{$input}%' LIMIT 0, 5";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="result-cnt">
                <div style="width: 50%;float: left;">
                    <div style="float: left;">
                        <?php echo $row['productName']; ?>
                    </div>
                </div>
                <div style="width: 50%;float: right;">
                    <div style="float: right; color: green;">
                        <?php echo $row['currency'] . ' ' . $row['prices']; ?>
                    </div>
                </div>
                <br><br>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="result-cnt">
            <div style="color:red;">
                No Product Found!</div>
        </div>
        <?php
    }
}
?>