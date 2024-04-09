<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
        }
        .container {
            margin-top: 100px;
        }
        .success-message {
            font-size: 24px;
            color: green;
            margin-bottom: 20px;
        }
        .click-anywhere {
            font-size: 16px;
            color: blue;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-message">Success! Your payment has been done.</div>
        <a href="http://localhost/WebProgLab/screens/product_listing.php?page-no=0">Click here to return.</a>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "http://localhost/WebProgLab/screens/product_listing.php?page-no=0";
        }, 10000);
    </script>
</body>
</html>
