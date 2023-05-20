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
    <link rel="icon" sizes="16x16" href="assets/img/favicon.png">

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


                <!--masonry-layout-->
                <section class="mt-90">
                    <div class="container-fluid">
                        <div class="row masonry-items">
                            <!--Post-1-->


                            <?php
                            
                            $post_rs=Database::search("SELECT * FROM `post`");
                            for($x=0;$x<$post_rs->num_rows;$x++){
                                $post_data=$post_rs->fetch_assoc();

                                $post_cart_rs=Database::search("SELECT  * FROM `cartimage` WHERE `id`='".$post_data["id"]."'");
                                $post_cart_data=$post_cart_rs->fetch_assoc();
                                ?>
                                <div class="col-xl-3 col-lg-3 col-md-3 masonry-item">
                                <div class="post-card ">
                                    <div class="post-card-image">
                                        <a href="post-default.html">
                                            <img src="<?php echo $post_cart_data["path"]; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="post-card-content">

                                        <h6 class="entry-title">
                                            <a href="post-default.html"><?php echo $post_data["about"]; ?></a>
                                        </h6>



                                        <ul class="entry-meta list-inline justify-content-center">

                                            <li class="post-author me-5"><a href="author.html"> <i class="bi bi-trash"></i> Delete</a> </li>
                                            <li class="post-author me-5"><a href="author.html"><i class="bi bi-pencil-square"></i> Edit</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                
                                <?php
                            }
                            
                            ?>

                            
                            <!--/-->


                        </div>

                        <!--pagination-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pagination ">
                                    <ul class="list-inline">
                                        <li class="active"> <a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#"><i class="fas fa-arrow-right"></i></a></li>
                                    </ul>
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

    </body>

</html>
<?php
} else {
?>
    <h1>somthing went wrong</h1>
<?php
}
?>