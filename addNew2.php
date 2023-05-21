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
    $id = $_GET["id"];
?>

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

            require "adminHeder.php";

            ?>


            <!--/-->
            <main class="main ">
                <input type="text" value="<?php echo $id ?>" id="id" hidden>
                <div class="row justify-content-center">
                    <div class="col-10 shadow-lg  mt-5 mb-5" style="border-radius: 16px; ">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="row">
                                    <img src="resouses/mac header.jpg" class="col-12 mt-4" alt="">
                                </div>
                            </div>
                            <div class="container-fluid" style="margin-top: -50px; ">
                                <div class="slider-style5 ">
                                    <div class="swiper-wrapper">



                                        <?php

                                        $cover_rs = Database::search("SELECT * FROM `coverimage` WHERE `id`='" . $id . "'");
                                        if (!$cover_rs->num_rows == 0) {
                                            for ($c = 0; $c < $cover_rs->num_rows; $c++) {
                                                $cover_data = $cover_rs->fetch_assoc();
                                        ?>
                                                <img src="<?php echo $cover_data["path"]; ?>" class="slider-item  swiper-slide" for="profileimg" id="i2" style="border-radius: 20px; ">

                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <!--slider-1-->
                                            <img src="resouses/d.png" class="slider-item  swiper-slide" for="profileimg" id="i0" style="border-radius: 20px; ">



                                            <!--slider-2-->
                                            <!-- <div class="slider-item  swiper-slide" style=" height: 550px;"> -->
                                            <img src="resouses/d.png" class="slider-item  swiper-slide" for="profileimg" id="i1" style="border-radius: 20px; ">

                                            <!-- </div> -->

                                        <?php
                                        }

                                        ?>
                                    </div>

                                    <!--pagination-->
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div class="col-lg-11 col-9 mt-lg-0 mt-10">
                                    <div class="row justify-content-end">
                                        <?php
                                        if ($cover_rs->num_rows == 0) {
                                        ?>
                                            <div class="form-group col-lg-4 col-11">

                                                <h5>You can select 3 cover image</h5>
                                            </div>
                                            <div class="form-group col-lg-2  col-4">
                                                <!-- <button type="submit" class="btn-custom" for="profileimg" id="viweImage">Add Cover Image</button> -->
                                                <div class="d-block" id="selectCover">
                                                    <input type="file" class="d-none" id="ccoverImage" multiple iaccept="image/*">



                                                    <label for="ccoverImage" class="add-new-main-img " onclick="changeProductImage();">
                                                        <img alt="">
                                                        <!-- <button type="submit" class=""></button> -->

                                                        <h1 class="btn-custom">Select Cover Image</h1>
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="form-group col-lg-2  col-4">
                                                <div class="d-none" id="saveCover">

                                                    <h1 class="btn-custom" onclick="AddCoverImage('<?php echo $id; ?>');">Save Selected</h1>

                                                </div>

                                            </div>
                                        <?php
                                        }

                                        ?>


                                        <!-- <div class="form-group col-lg-1 col-4 " style="margin-left: 20px;">


                                        <h1 class="btn-custom">Save</h1>
                                        </label>
                                    </div> -->
                                    </div>
                                </div>
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

                        <div class="row justify-content-center">
                            <?php
                            if ($post_data["description"] == null) {
                            ?>
                                <h6 class="entry-title fw-bold ">
                                    <!-- <input type="text" placeholder="Enter Decription" style="border: none;"> -->
                                    <!-- <textarea name="" id="" cols="70" style="border: none;" rows="5" ></textarea> -->
                                    <input type="text" class="fw-bold col-11" id="des" style="border: none;" placeholder="Enter Description">
                                </h6>
                                <div class="">

                                    <h1 class="btn-custom  offset-10 text-center" onclick="addDes('<?php echo $id; ?>');">Save Description</h1>

                                </div>
                            <?php
                            } else {
                            ?>
                                <h6><?php echo $post_data["description"]; ?></h6>
                            <?php
                            }
                            ?>

                        </div>
                        <?php
                        $gallry_rs = Database::search("SELECT * FROM `gallry` WHERE `post_id`='" . $id . "'");
                        $gallry_num = $gallry_rs->num_rows;

                        if ($gallry_num == 0) {
                        ?>

                            <div class="row mt-5 align-content-end">
                                <div class="form-group  col-lg-1 col-4 " style="margin-left: 20px;">

                                    <div class="d-block" id="selectgallry">
                                        <h1 class="btn-custom" data-bs-toggle="modal" onclick="selectgallry();" data-bs-target="#exampleModalToggle">Select Image Gallary</h1>
                                        <!-- <button type="button" class="btn btn-primary"  data-bs-whatever="@mdo">Open modal for @mdo</button> -->
                                        </label>
                                    </div>

                                    <div class="d-none" id="savegallry">
                                        <h1 class="btn-custom" onclick="addGallryImge('<?php echo $id; ?>');">Save Gallary </h1>
                                    </div>

                                </div>

                            </div>
                            <div class="row mt-5">

                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">
                                        <label style="margin-left: 10px; cursor: pointer;" id="close0" onclick="removeImage(0);">
                                            <h6 style="margin-left: 30px; " class="" id="remove0" onclick="removeImage(0);"></h6>
                                        </label>

                                        <img src="resouses/d.png" alt="" id="g0">

                                    </div>

                                </div>
                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">

                                        <label style="margin-left: 10px; cursor: pointer;" id="close1" onclick="removeImage(1);">
                                            <h6 style="margin-left: 30px; " class="" id="remove1" onclick="removeImage(1);"></h6>
                                        </label>

                                        <img src="" alt="" id="g1">

                                    </div>

                                </div>
                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">
                                        <label style="margin-left: 10px; cursor: pointer;" id="close2" onclick="removeImage(2);">
                                            <h6 style="margin-left: 30px; " class="" id="remove2" onclick="removeImage(2);"></h6>
                                        </label>
                                        <img src="" alt="" id="g2">

                                    </div>

                                </div>
                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">
                                        <label style="margin-left: 10px; cursor: pointer;" id="close3" onclick="removeImage(3);">
                                            <h6 style="margin-left: 30px; " class="" id="remove3" onclick="removeImage(3);"></h6>
                                        </label>
                                        <img src="" alt="" id="g3">

                                    </div>

                                </div>
                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">
                                        <label style="margin-left: 10px; cursor: pointer;" id="close4" onclick="removeImage(4);">
                                            <h6 style="margin-left: 30px; " class="" id="remove4" onclick="removeImage(4);"></h6>
                                        </label>
                                        <img src="" alt="" id="g4">

                                    </div>

                                </div>
                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">
                                        <label style="margin-left: 10px; cursor: pointer;" id="close5" onclick="removeImage(5);">
                                            <h6 style="margin-left: 30px; " class="" id="remove5" onclick="removeImage(5);"></h6>
                                        </label>
                                        <img src="" alt="" id="g5">

                                    </div>

                                </div>
                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">
                                        <label style="margin-left: 10px; cursor: pointer;" id="close6" onclick="removeImage(6);">
                                            <h6 style="margin-left: 30px; " class="" id="remove6" onclick="removeImage(6);"></h6>
                                        </label>
                                        <img src="" alt="" id="g6">

                                    </div>

                                </div>
                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">
                                        <label style="margin-left: 10px; cursor: pointer;" id="close7" onclick="removeImage(7);">
                                            <h6 style="margin-left: 30px; " class="" id="remove7" onclick="removeImage(7);"></h6>
                                        </label>
                                        <img src="" alt="" id="g7">

                                    </div>

                                </div>
                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">
                                        <label style="margin-left: 10px; cursor: pointer;" id="close8" onclick="removeImage(8);">
                                            <h6 style="margin-left: 30px; " class="" id="remove8" onclick="removeImage(8);"></h6>
                                        </label>
                                        <img src="" alt="" id="g8">

                                    </div>

                                </div>
                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">
                                        <label style="margin-left: 10px; cursor: pointer;" id="close9" onclick="removeImage(9);">
                                            <h6 style="margin-left: 30px; " class="" id="remove9" onclick="removeImage(9);"></h6>
                                        </label>
                                        <img src="" alt="" id="g9">

                                    </div>

                                </div>
                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">
                                        <label style="margin-left: 10px; cursor: pointer;" id="close10" onclick="removeImage(10);">
                                            <h6 style="margin-left: 30px; " class="" id="remove10" onclick="removeImage(10);"></h6>
                                        </label>
                                        <img src="" alt="" id="g10">

                                    </div>

                                </div>
                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">
                                        <label style="margin-left: 10px; cursor: pointer;" id="close11" onclick="removeImage(11);">
                                            <h6 style="margin-left: 30px; " class="" id="remove11" onclick="removeImage(11);"></h6>
                                        </label>
                                        <img src="" alt="" id="g11">

                                    </div>

                                </div>
                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">
                                        <label style="margin-left: 10px; cursor: pointer;" id="close12" onclick="removeImage(12);">
                                            <h6 style="margin-left: 30px; " class="" id="remove12" onclick="removeImage(12);"></h6>
                                        </label>
                                        <img src="" alt="" id="g12">

                                    </div>

                                </div>
                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">
                                        <label style="margin-left: 10px; cursor: pointer;" id="close13" onclick="removeImage(13);">
                                            <h6 style="margin-left: 30px; " class="" id="remove13" onclick="removeImage(13);"></h6>
                                        </label>
                                        <img src="" alt="" id="g13">

                                    </div>

                                </div>
                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">
                                        <label style="margin-left: 10px; cursor: pointer;" id="close14" onclick="removeImage(14);">
                                            <h6 style="margin-left: 30px; " class="" id="remove14" onclick="removeImage(14);"></h6>
                                        </label>
                                        <img src="" alt="" id="g14">

                                    </div>

                                </div>
                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">
                                        <label style="margin-left: 10px; cursor: pointer;" id="close15" onclick="removeImage(15);">
                                            <h6 style="margin-left: 30px; " class="" id="remove15" onclick="removeImage(15);"></h6>
                                        </label>
                                        <img src="" alt="" id="g15">

                                    </div>

                                </div>
                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">
                                        <label style="margin-left: 10px; cursor: pointer;" id="close16" onclick="removeImage(16);">
                                            <h6 style="margin-left: 30px; " class="" id="remove16" onclick="removeImage(16);"></h6>
                                        </label>
                                        <img src="" alt="" id="g16">

                                    </div>

                                </div>
                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">
                                        <label style="margin-left: 10px; cursor: pointer;" id="close17" onclick="removeImage(17);">
                                            <h6 style="margin-left: 30px; " class="" id="remove17" onclick="removeImage(17);"></h6>
                                        </label>
                                        <img src="" alt="" id="g17">

                                    </div>

                                </div>
                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">
                                        <label style="margin-left: 10px; cursor: pointer;" id="close18" onclick="removeImage(18);">
                                            <h6 style="margin-left: 30px; " class="" id="remove18" onclick="removeImage(18);"></h6>
                                        </label>
                                        <img src="" alt="" id="g18">

                                    </div>

                                </div>
                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">
                                        <label style="margin-left: 10px; cursor: pointer;" id="close19" onclick="removeImage(19);">
                                            <h6 style="margin-left: 30px; " class="" id="remove19" onclick="removeImage(19);"></h6>
                                        </label>
                                        <img src="" alt="" id="g19">

                                    </div>

                                </div>
                                <div class="col-lg-4 col-12 mt-5">
                                    <div class="gallary">
                                        <label style="margin-left: 10px; cursor: pointer;" id="close20" onclick="removeImage(20);">
                                            <h6 style="margin-left: 30px; " class="" id="remove20" onclick="removeImage(20);"></h6>
                                        </label>
                                        <img src="" alt="" id="g20">

                                    </div>

                                </div>
                            </div>

                        <?php
                        } else {
                        ?>
                            <div class="row masonry-items mt-5">
                                <!--Post-1-->
                                <?php
                                $post_rs = Database::search("SELECT * FROM `gallry`  WHERE `post_id`='" . $id . "' ");
                                $post_num = $post_rs->num_rows;
                                for ($x = 0; $x < $post_num; $x++) {
                                    $post_img_data = $post_rs->fetch_assoc();
                                ?>
                                    <div class="col-xl-4 col-lg-6 col-md-6 masonry-item" onclick="view(<?php echo $post_img_data['post_id']; ?>);">
                                        <div class="post-card">
                                            <div class="post-card-image">
                                                <a data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                                                    <img src="<?php echo $post_img_data["path"]; ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <img src="" id="viweImage">

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
                        <?php
                        }

                        ?>

                    </div>
                    <!-- <div class="col-10 mb-5">
                        <div class="row justify-content-end">
                            <div class="form-group justify-content-end col-1">
                                <button type="submit" class="btn-custom" onclick="AddCoverImage('<?php echo $id; ?>');">Save </button>
                            </div>
                        </div>
                    </div> -->
                </div>
            </main>


            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Upload Image Gallary</h1>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                        </div>
                        <div class="modal-body">
                            Show a second modal and hide this one with the button below.
                        </div>
                        <div class="modal-footer">
                            <!-- <button class="btn-custom" for="imageuploder" data-bs-dismiss="modal" data-bs-toggle="modal">Ok</button> -->
                            <input type="file" class="d-none" id="imagegallary" multiple iaccept="image/*">



                            <label for="imagegallary" class="add-new-main-img " onclick="changeImageGallary();">

                                <!-- <button type="submit" class=""></button> -->

                                <h1 class="btn-custom" data-bs-dismiss="modal">Ok</h1>
                            </label>

                        </div>
                    </div>
                </div>
            </div>

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

    <h1>somting went wrang</h1>

<?php
}

?>