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
</head>

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

        require "header1.php";
        require "connection.php";
        ?>


        <!--/-->
        <main class="main">
            <!--slider-style1-->
            <div class="slider-style1">
                <div class="swiper-wrapper">
                    <!--slider-1-->
                    <div class="slider-item  swiper-slide" style="background-image: url(resouses/couple.jpeg);">
                        <div class="container ">
                            <div class="row">
                                <div class="col-lg-8 m-auto">
                                    <div class="slider-item-content">
                                       
                                        <h1 class="entry-title">
                                            <a href="post-default.html">We are neosoft photography team</a>
                                        </h1>
                                        <ul class="entry-meta list-inline">
                                            <li class="post-author-img">
                                                <a href="contact.php"> <img src="resouses/neosoft.png" style="background-position: center; background-size: cover;" alt=""></a>
                                            </li>
                                            <li class="post-author"><a href="author.html">Neosoft</a> </li>
                                            
                                            <li class="post-timeread"> <span class="dot"></span> + 94 76 70 71 129</li>
                                            <li class=""> <span class="dot"></span> sandaruwandissanayake9@gmail.com</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--slider-2-->
                    <div class="slider-item  swiper-slide" style="background-image: url(resouses/girl.jpeg);">
                    <div class="container ">
                            <div class="row">
                                <div class="col-lg-8 m-auto">
                                    <div class="slider-item-content">
                                       
                                        <h1 class="entry-title">
                                            <a href="post-default.html">We are neosoft photography team</a>
                                        </h1>
                                        <ul class="entry-meta list-inline">
                                            <li class="post-author-img">
                                                <a href="contact.php"> <img src="resouses/neosoft.png" style="background-position: center; background-size: cover;" alt=""></a>
                                            </li>
                                            <li class="post-author"><a href="author.html">Neosoft</a> </li>
                                            
                                            <li class="post-timeread"> <span class="dot"></span> + 94 76 70 71 129</li>
                                            <li class=""> <span class="dot"></span> sandaruwandissanayake9@gmail.com</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
                <!--pagination-->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <!--masonry-layout-->
            <section class="mt-90">
                <div class="container-fluid">
                    <div class="row masonry-items">
                        <!--Post-1-->

                        <?php

                        $post_rs = Database::search("SELECT * FROM `post`");
                        $post_num = $post_rs->num_rows;
                        for ($x = 1; $x <= $post_num; $x++) {
                            $post_data = $post_rs->fetch_assoc();
                            $post_img_rs = Database::search("SELECT * FROM `cartimage` WHERE `id`='" . $post_data["id"] . "'");
                            $post_img_data = $post_img_rs->fetch_assoc();
                        ?>

                            <div class="col-xl-4 col-lg-6 col-md-6 masonry-item" onclick="viewCart(<?php echo $post_data['id']; ?>);">
                                <div class="post-card ">
                                    <div class="post-card-image">
                                        <a>

                                            <img src="<?php echo $post_img_data["path"]; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="post-card-content">

                                        <h5 class="entry-title">
                                            <a><?php echo $post_data["about"]; ?></a>
                                        </h5>


                                    </div>
                                </div>
                            </div>


                        <?php
                        }

                        ?>


                        <!--/-->


                    </div>

                   
                </div>
            </section>
            <!--/-->
            <?php require "footer.php"; ?>

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

</body>

</html>