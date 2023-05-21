<?php

require "connection.php";
$id = $_GET["id"];

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




<body style="overflow-x: hidden;">
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

        ?>


        <!--/-->
        <main class="main ">

            <div class="row justify-content-center">
                <div class="col-11  mt-5 mb-5" style="border-radius: 16px;">
                    <div class="row justify-content-center">
                        <div class="col-12">

                        </div>
                        <div class="container-fluid" style="margin-top: -50px; ">
                            <div class="slider-style5 ">
                                <div class="swiper-wrapper">

                                    <?php

                                    $cover_rs = Database::search("SELECT * FROM `coverimage` WHERE `id`='" . $id . "'");
                                    if (!$cover_rs->num_rows == 0) {
                                        for ($y = 0; $y < $cover_rs->num_rows; $y++) {
                                            $cover_data = $cover_rs->fetch_assoc();
                                    ?>
                                            <div class="swiper-slide slider-item" style="background-image: url(<?php echo $cover_data["path"]; ?>);">

                                            </div>

                                    <?php
                                        }
                                    }

                                    ?>






                                    <!--pagination-->
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>


                                </div>

                            </div>
                            <div class="row justify-content-center">
                                <h2 class="entry-title fw-bold">
                                    <?php

                                    $post_rs = Database::search("SELECT * FROM `post` WHERE `id`='" . $id . "'");
                                    $post_data = $post_rs->fetch_assoc();

                                    ?>
                                    <a><?php echo $post_data["about"]; ?></a>
                                </h2>
                            </div>

                            <div class="row justify-content-center mb-5">
                                <h6 class="entry-title fw-bold ">

                                    <p><?php echo $post_data["description"] ?></p>
                                </h6>
                            </div>

                            <div class="row masonry-items mt-5">
                                <!--Post-1-->
                                <?php
                                $post_rs = Database::search("SELECT * FROM `gallry`  WHERE `post_id`='" . $id . "' ");
                                $post_num = $post_rs->num_rows;
                                for ($x = 0; $x < $post_num; $x++) {
                                    $post_img_data = $post_rs->fetch_assoc();
                                ?>
                                    <div class="col-xl-4 col-lg-6 col-md-6 masonry-item" onclick="view(<?php echo $post_img_data['id']; ?>);">
                                        <div class="post-card">
                                            <div class="post-card-image">
                                                <a data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                                                    <img src="<?php echo $post_img_data["path"]; ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">

                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="row">
                                                        <button type="button"  class="btn-close "  data-bs-dismiss="modal" aria-label="Close"></button>

                                                        <img src="" id="viweImage">
                                                    </div>


                                                    <!-- <input type="text" value="" id="viweImage"> -->

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <!--/-->


                                <!-- <script>
                                    function view() {
                                        var inputElement = postCardElement.querySelector(".post-card-input");
                                        var inputValue = inputElement.value;
                                        alert(inputValue);
                                    }
                                </script> -->
                            </div>

                        </div>

                    </div>
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