<!-- <?php

require __DIR__ . "\\vendor\\autoload.php";

$key = "sk_test_51P2qvJLo4BElNGZ9VRehN2tPxoEB7CWpxfyUIWFVPfM1wAbsww6rxp1j9fQrm9Kynp4GdUXYYvuj3J4wil4A52NT00TjRs5umX";

\Stripe\Stripe::setApiKey($key);

$checkoutSess = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/WebProgLab/screens/payment_success.php?",
    "cancel_url" => "http://localhost/WebProgLab/screens/product_listing.php?page-no=0",
    "line_items" => [
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
    ]
]);

http_response_code(303);
header("Location: " . $checkoutSess->url);
?> -->