<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/dark_style.css" />
    <title>LabWork</title>
</head>

<body>

    <?php
    session_start();
    include('../partials/header.php');
    ?>
    <section>
        <ul>
            <h1 class="overlay" id="title">Welcome to KTech!
            </h1>
            <img src="../img/img/ales-nesetril-Im7lZjxeLhg-unsplash.jpg" alt="" loading="eager">
            <?php if (isset($_SESSION["username"])) { ?>
                <a class="right-bound" href="../screens/product_listing.php?page-no=0">Read more...<i
                        class="fa fa-chevron-right" style="color: white;"></i></a>
                <?php
            } else { ?>
                <a class="right-bound" href="../screens/login.php">Learn more...<i class="fa fa-chevron-right"
                        style="color: white;"></i></a>
            <?php } ?>
        </ul>
    </section>
    <section>
        <div class="grid-fixed-2">
            <ul class="left-bound">
                <h1>CONTENT</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat...</p>
                <?php if (isset($_SESSION["username"])) { ?>
                    <a class="right-bound" href="../screens/product_listing.php?page-no=0">Read more...<i
                            class="fa fa-chevron-right" style="color: white;"></i></a>
                    <?php
                } else { ?>
                    <a class="right-bound" href="../screens/login.php">Read more...<i class="fa fa-chevron-right"
                            style="color: white;"></i></a>
                <?php } ?>
            </ul>
            <img src="../img/img/nasim-dadfar-n_-kWSE4LKo-unsplash.jpg" alt="" loading="lazy">
        </div>
    </section>
    <section>
        <div class="grid-fixed-2">
            <img src="../img/img/daniel-korpai-HyTwtsk8XqA-unsplash.jpg" alt="" loading="lazy">
            <ul class="right-bound">
                <h1>CONTENT</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat...</p>
                <?php if (isset($_SESSION["username"])) { ?>
                    <a class="right-bound" href="../screens/product_listing.php?page-no=0">Read more...<i
                            class="fa fa-chevron-right" style="color: white;"></i></a>
                    <?php
                } else { ?>
                    <a class="right-bound" href="../screens/login.php">Read more...<i class="fa fa-chevron-right"
                            style="color: white;"></i></a>
                <?php } ?>
        </div>
    </section>
    <?php
    include('../partials/footer.php');
    session_abort();
    ?>
</body>

</html>