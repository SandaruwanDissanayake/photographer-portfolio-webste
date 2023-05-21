<?php

require "connection.php";
session_start();


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- favicon -->
    <link rel="icon" sizes="16x16" href="resouses/neosoft.png">

    <!-- Title -->
    <title> Photography </title>

    <!--Stylesheets -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/swiper.min.css">

    <!-- main style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>


<?php

if (isset($_SESSION["u"])) {
?>

    <body>
        <!-- wrapper -->
        <div id="wrapper" class="wrapper">
            <!--loading -->
            <div class="loading">
                <div class="circle">
                <img src="resouses/neosoft.png" alt="">

                </div>
            </div>
            <!--/-->

            <!-- Header -->

            <?php

            require "adminHeder.php";

            ?>


            <!--/-->
            <main class="main">



                <section class="mt-90">
                    <div class="container-fluid">
                        <div class="row justify-content-center">



                            <div class="col-xl-4 col-lg-6 col-md-6 col-12 masonry-item ">
                                <div class="post-card ">
                                    <div class="post-card-image">
                                        <!-- <a href="">
                                            <img src="assets/img/blog/7.jpg" id="img" alt="">
                                            <input type="file" name="img" id="" >
                                        </a> -->

                                        <input type="file" class="d-none" id="cartImge" iaccept="image/*">



                                        <label for="cartImge" class="add-new-main-img " onclick="changeImage();"> <img src="resouses/d.png" for="profileimg" id="viweImage" alt="">
                                            <h1 class="plus-image"><i class="icon bi bi-plus-square"></i></h1>
                                        </label>

                                    </div>
                                    <div class="post-card-content">

                                        <h5 class="entry-title">


                                            <input type="text" style="border: none; font-weight: bold;" id="about" required placeholder="Enter About Shoot">
                                        </h5>



                                        <ul class="entry-meta list-inline">



                                            <input type="date" style="border: none;" id="datetime">
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-custom" onclick="uploadCart();">Save & Continue</button>
                                </div>
                            </div>












                        </div>






                    </div>
                </section>
                <!--/-->


            </main>




        </div>


        <!--plugins -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/swiper.min.js"></script>
        <script src="assets/js/masonry.min.js"></script>
        <script src="assets/js/theia-sticky-sidebar.min.js"></script>
        <script src="assets/js/ajax-contact.js"></script>
        <script src="assets/js/switch.js"></script>

        <!-- JS main  -->
        <script src="assets/js/main.js"></script>

        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>


    </body>

</html>
<?php
} else {
?>
    <h1>Somthing went wrong</h1>
<?php
}

?>