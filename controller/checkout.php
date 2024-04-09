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
            echo "<h2>Cart Items</h2>";
            $carts = json_decode($_POST['carts'], true);
            if (empty($carts)) {
                echo "<p>Cart is empty!</p>";
                echo "<a href='../screens/product_listing.php?page-no=0' style='display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;'>Continue Shopping</a>";
                break;
            }
            echo "<ul>";
            foreach ($carts as $product) {
                // echo <<<EOD
                //         <div class="card" style="width: 18rem; padding: 5px; margin: 5px;">
                //         <img style="width: 200px; height: 200px;" src="..\img\img\daniel-korpai-HyTwtsk8XqA-unsplash.jpg" class="card-img-top" alt="..." loading="lazy">
                //         <div class="card-body">
                //             <h5 class="card-title">
                //             {$product['productName']}
                //             </h5>
                //             <p class="card-text">
                //             <strong>
                //             USD
                //             </strong>
                //             {$product['price']}
                //             </p>
                    // EOD;
                echo "<li>" . $product['productName'] . " - " . $product['price'] . " USD</li>";
            }
            echo "</ul>";
            echo "<div style='display: flex; justify-content: left; gap: 10px;'>";
            echo "<a href='../screens/product_listing.php?page-no=0&clearstore=1' style='display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;'>Clear cart and Continue Shopping</a>";
            echo "<a href='../screens/product_listing.php?page-no=0' style='display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;'>Continue Shopping</a>";
            echo "<a href='../controller/checkout.php?action=buying&carts=" . json_encode($carts) . "' style='display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;'>Checkout!</a>";
            
            break;
            
            default:
                echo "Invalid action!";
        }
    } else {
        echo "Action parameter is missing!";
    }
?>