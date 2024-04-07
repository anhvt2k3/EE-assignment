<?php
if (isset($_SESSION['username'])) {
    header("Location: ../screens/login.php");
    exit();
}
session_start();
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/dark_style.css" />
    <link rel="stylesheet" type="text/css" href="../css/overlay_search.css" />
    <title>LabWork</title>
</head>

<body>
    <!--Actual Content-->
    <?php include ("../partials/header.php"); ?>
    <section>
        <?php echo ("Hello, user " . $_SESSION['username']) ?>
    </section>
    <p>This is your current location:</p>
    <div id="googleMap" style="width:100%;height:400px;"></div>

    <script>
        function myMap() {
            var mapProp = {
                center: new google.maps.LatLng(10.773444, 106.659693),
                zoom: 18,
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=myMap" async defer></script>
    <?php include ('../partials/footer.php') ?>
</body>

</html>