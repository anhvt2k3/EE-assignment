<head>
    <!--Bootstrap 5 CDN-->
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/overlay_search.css">
    <link rel="stylesheet" href="../css/light_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<?php
if (isset($_SESSION["username"])) {
    ?>
    <header style="justify-content: space-between;">
        <a href="../index.html"><img src="../img/logo/800x800.png" alt="" class="logo"></a>
        <nav>
            <div class="btn btn-light" onclick="openSearch()"><i class="fa fa-search"></i></div>
            <div class="btn btn-light"><a href="../screens/product_listing.php?page-no=0?page-no=0"><i
                        class="fa fa-shopping-cart"></i></a>
            </div>
            <div class="btn btn-light" id="dropdown-btn" onclick="showDropDown()"><i class="fa fa-user dropdown">
                    <div class="dropdown-menu pull-right" id="dropdown-cnt">
                        <a class="dropdown-item" href="user_home.php">
                            <p>
                                <?php echo ('Hello, ' . $_SESSION['username']); ?>
                            </p>
                        </a>
                        <a class="dropdown-item" href="../auth/logout.php">
                            <p style="display: inline;">
                                Log Out
                            </p>
                        </a>
                    </div>
                </i></div>
        </nav>
    </header>
    <?php
} else { ?>
    <header>
        <a href="../index.html"><img src="../img/logo/800x800.png" alt="" class="logo"></a>
        <nav>
            <div class="button" onclick="openSearch()"><i class="fa fa-search"></i></div>
            <div class="button"><a href="../screens/product_listing.php?page-no=0"><i class="fa fa-shopping-cart"></i></a>
            </div>
            <div class="button"><a href="login.php"><i class="fa fa-sign-in"></i></a></div>
        </nav>
    </header>
    <?php
}
?>

<!-- ----------------- -->
<!-- Overlay Search Bar-->
<!-- ----------------- -->
<div id="myOverlay" class="overlay_search">
    <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
    <div class="overlay-content">
        <input type="text" placeholder="Search.." id="search" name="search">
        <br>
        <div id="search_results" style="background-color: white;"></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#search").keyup(function () {
            var input = $(this).val();
            // alert(input);

            if (input != "") {
                $.ajax({
                    url: "../controller/livesearch_products.php",
                    method: "POST",
                    data: { input: input },

                    success: function (data) {
                        $("#search_results").css("display", "block");
                        $("#search_results").html(data);
                    }
                })
            } else {
                $("#search_results").css("display", "none");
            }

        })
    })
</script>
<script>
    show = false;
    function showDropDown() {
        if (!show) {
            show = !show;
            document.getElementById("dropdown-cnt").style.display = "block"
            document.getElementById("title").style.zIndex = "0";
        } else {
            show = !show;
            document.getElementById("dropdown-cnt").style.display = "none"
            document.getElementById("title").style.zIndex = "1";
        }

    }
    function openSearch() {
        document.getElementById("myOverlay").style.display = "block";
        document.getElementById("title").style.zIndex = "0";
    }

    function closeSearch() {
        document.getElementById("myOverlay").style.display = "none";
        document.getElementById("title").style.zIndex = "1";
    }
</script>s