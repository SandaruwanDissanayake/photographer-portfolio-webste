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
    <title> About Us </title>

    <!--Stylesheets -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/swiper.min.css">

    <!-- main style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
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
        require "connection.php";
        ?>


        <!--/-->
        <section class="mt-90">
            <div class="container-fluid mt-5">
                <div class="row mt-5">
                    <div class="col-lg-12 m-auto mt-5">
                        <div class="contact">
                            <div class="row">
                                <div class="google-map col-lg-5">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15824.99562221361!2d80.20903578958938!3d7.437687558462884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae3246e2a3b43bf%3A0x7638d4647992863d!2sNarammala!5e0!3m2!1sen!2slk!4v1683523284410!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                <form action="assets/php/mail.php" class="widget-form contact_form col-lg-7" method="POST" id="main_contact_form">
                                    <h5>Hey We Can Help You.</h5>
                                    <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, repudiandae.</p> -->
                                    <div class="alert alert-success contact_msg" style="display: none" role="alert">
                                        Your message was sent successfully.
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Your Name*" required="required">
                                    </div>

                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Your Email*" required="required">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Your Subject*" required="required">
                                    </div>

                                    <div class="form-group">
                                        <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Your Message*" required="required"></textarea>
                                    </div>

                                    <button type="submit" name="submit" class="btn-custom">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>

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