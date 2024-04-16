<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checking out!</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Your PHP code goes here -->
    <?php

    if(isset($_GET['action'])) {
        $action = $_GET['action'];
        
        require __DIR__ . "\\vendor\\autoload.php";
        
        $key = "sk_test_51P2qvJLo4BElNGZ9VRehN2tPxoEB7CWpxfyUIWFVPfM1wAbsww6rxp1j9fQrm9Kynp4GdUXYYvuj3J4wil4A52NT00TjRs5umX";
        
        \Stripe\Stripe::setApiKey($key);

        switch($action) {
            case 'buying':
                if (!isset($_GET["carts"])) {
                    $lineitem = [
                        [
                            "quantity" => 1,
                            "price_data" => [
                                "currency" => "usd",
                                "unit_amount" => (int) $_POST["price"] * 100,
                                "product_data" => [
                                    "name" => $_POST["productName"],
                                ]
                            ]
                        ]
                                ];
                }
                else {
                    $carts = json_decode($_GET['carts'], true);
                    $lineitem = [];
                    foreach ($carts as $cart) {
                        $lineitem[] = [
                            "quantity" => 1,
                            "price_data" => [
                                "currency" => "usd",
                                "unit_amount" => (int) $cart["price"] * 100,
                                "product_data" => [
                                    "name" => $cart["productName"],
                                ]
                            ]
                        ];
                    }
                }
                
                $checkoutSess = \Stripe\Checkout\Session::create([
                    "mode" => "payment",
                    "success_url" => "http://localhost/EE/screens/payment_success.php?",
                    "cancel_url" => "http://localhost/EE/screens/product_listing.php?page-no=0",
                    "line_items" => $lineitem
                ]);
                http_response_code(303);
                header("Location: " . $checkoutSess->url);
            break;
            
            case 'gotocart': 
                // Display cart items from POST data
                echo "<div class='container mt-5'>"; // Add margin to the top using mt-5 (margin top)
                echo "<h2>Cart Items</h2>";
                $carts = json_decode($_POST['carts'], true);
                if (empty($carts)) {
                    echo "<p>Cart is empty!</p>";
                    echo "<a href='../screens/product_listing.php?page-no=0' class='btn btn-primary'>Continue Shopping</a>";
                    break;
                }
                echo "<div class='table-responsive'>";
                echo "<table class='table table-bordered table-hover'>"; 
                echo "<thead class='thead-light'>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                        </tr>
                    </thead>";
                echo "<tbody>";
                foreach ($carts as $product) {
                    echo "<tr>";
                    echo "<td>" . $product['productName'] . "</td>";
                    echo "<td>" . $product['price'] . " USD</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>"; 
                echo "<div class='d-flex justify-content-start mt-3'>"; // Use flexbox to align buttons to the left
                echo "<a href='../screens/product_listing.php?page-no=0&clearstore=1' class='btn btn-danger mr-2'>Clear cart and Continue Shopping</a>"; // Add mr-2 class for right margin
                echo "<a href='../screens/product_listing.php?page-no=0' class='btn btn-primary mr-2'>Continue Shopping</a>"; // Add mr-2 class for right margin
                echo "<a href='../controller/checkout.php?action=buying&carts=" . json_encode($carts) . "' class='btn btn-success'>Checkout</a>";
                echo "</div>"; 
                echo "</div>"; 
                break;                        
                
            default:
                echo "Invalid action!";
        }
    } else {
        echo "Action parameter is missing!";
    }
?>
    <!-- Include Bootstrap JavaScript at the end of the body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
