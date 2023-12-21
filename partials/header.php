<head>
    <link rel="stylesheet" href="../css/dark_style.css">
    <link rel="stylesheet" href="../css/overlay_search.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<?php
if (isset($_SESSION["username"])) {
    ?>
    <header>
        <a href="../index.html"><img src="../img/logo/800x800.png" alt="" class="logo"></a>
        <nav>
            <div class="button" onclick="openSearch()"><i class="fa fa-search"></i></div>
            <div class="button"><a href="../screens/product_listing.php?page-no=0"><i class="fa fa-shopping-cart"></i></a>
            </div>
            <div class="button" id="dropdown-btn" onclick="showDropDown()"><i class="fa fa-user dropdown">
                    <ul class="dropdown-content" id="dropdown-cnt">
                        <a href="user_home.php">
                            <?php echo ($_SESSION['username']); ?>
                        </a>
                        <a href="../auth/logout.php">
                            Log Out
                        </a>
                    </ul>
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
</script>