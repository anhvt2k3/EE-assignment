<html lang="en">
<?php
include ("../db/conn.php");
// get products
$start = 0;
$item_per_call = isset($_POST["limit"]) ? $_POST["limit"] : 10;
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


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap 5 CDN-->
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="../css/product_style.css">
    <title>Products</title>
</head>

<body style="background-image: url('https://wallpaper.dog/large/10930724.png'); background-size: cover; height: 100%;">
    <?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: ../screens/login.php");
    } else
        ;
    include ("../partials/bootstrap_header.php");
    ?>
    <section>
        <div class="center">
            <h2>Our Products</h2>
        </div>
        <!-- Items per page:
        <form method="post" action="#">
            <select name="limit" id="limit">
                <option disabled="disabled" selected="selected">--- Items loaded ---</option>
                <?php foreach ([5, 10, 15, 20] as $intervals): ?>
                    <option <?php if (isset($_POST["limit"]) && $_POST["limit"] == $intervals)
                        echo "selected" ?> value="<?= $intervals; ?>">
                        <?= $intervals; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
        </form> -->
        <div class="row" style="justify-content: space-between;">
        <!-- <?php
        session_start();
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = [];
        }
        ?>
        <script>
        function add2cart() {
            var cart = <?php echo json_encode($_SESSION["cart"]); ?>;
            var item = {
                productName: "<?php echo $row["productName"] ?>",
                price: "<?php echo $row["prices"] ?>"
            };
            cart.push(item);
            <?php $_SESSION["cart"] = $cart; ?>
            console.log(cart);
        }
         </script> -->
            <?php
            while ($row = mysqli_fetch_assoc($result1)) {
                ?>
                <div class="col-sm-4">
                    <form method="post" action="../controller/checkout.php">
                        <div class="card" style="width: 18rem; padding: 5px; margin: 5px;">
                            <img src="..\img\img\daniel-korpai-HyTwtsk8XqA-unsplash.jpg" class="card-img-top" alt="..." loading="lazy">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $row["productName"] ?>
                                </h5>
                                <input type="hidden" name="productName" value="<?php echo $row["productName"] ?>">
                                <p class="card-text">
                                    <strong>
                                        <?php echo $row["currency"] ?>
                                    </strong>
                                    <?php echo $row['prices'] ?>
                                </p>
                                <input type="hidden" name="price" value="<?php echo $row["prices"] ?>">
                                <button type="submit" class="btn btn-primary" name="checkout"><span><span>Buy Now!</span></span></button>
                                <button type="button" class="btn btn-success" name="addToCart" onclick=add2cart
                                ><span><span>Add to Cart</span></span></button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
            }
            ?>
        </div>
        <ul class="pagination" style="float: center;">
            <!-- Prev -->
            <?php
            if (isset($_GET['page-no']) && $_GET['page-no'] > 0) {
                ?>
                <li class="page-item"><a class="page-link" href="?page-no=<?php echo $_GET['page-no'] - 1; ?>">Previous</a>
                </li>
                <?php
            }
            ;
            for ($i = 0; $i < $pages; $i++) {
                ?>
                <li class="page-item"><a class="page-link" href="?page-no=<?php echo $i; ?>">
                        <?php echo $i + 1; ?>
                    </a></li>
                <?php
            }
            ;
            if (isset($_GET['page-no']) && $_GET['page-no'] < $pages - 1) {
                ?>
                <li class="page-item"><a class="page-link" href="?page-no=<?php echo $_GET['page-no'] + 1; ?>">Next</a>
                </li>
                <?php
            }
            ?>
        </ul>
    </section>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#limit").change(function () {
                $('form').submit();
            })
        })
    </script>
    <?php
    include ("../partials/footer.php") ?>
</body>

</html>