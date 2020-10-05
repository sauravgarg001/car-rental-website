<!DOCTYPE html>
<html lang="zxx" class="no-js">
<?php
session_start();
if (isset($_SESSION["email"]))
    header("Location:index.php");
?>

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Licably</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <?php include("header.php"); ?>


    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-center">
                <div class="col-md-6 offset-3 header-right m-0">
                    <h4 class="text-white pb-30">Sign Up!</h4>
                    <form class="form" role="form" autocomplete="off">
                        <div>
                            <div class="invalid-feedback" id="name_feedback">
                                Enter your Full Name?</div>
                            <input class="form-control txt-field isNull" type="text" name="name" id="name" placeholder="Your name">

                            <div class="invalid-feedback" id="email_feedback">
                            </div>
                            <input class="form-control txt-field" type="email" name="email" id="email" placeholder="Email address">


                            <div class="invalid-feedback" id="mobile_feedback">
                            </div>
                            <input class="form-control txt-field" type="tel" name="mobile" id="mobile" placeholder="Phone number">

                            <div class="invalid-feedback" id="password_feedback">
                            </div>
                            <input class="form-control txt-field" type="password" name="password" placeholder="Password" id="password">


                            <button type="button" id="signup" class="btn btn-default btn-lg btn-block text-center text-uppercase">Sign Up</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- start footer Area -->
    <?php include("footer.php"); ?>
    <!-- End footer Area -->

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/easing.min.js"></script>
    <script src="js/hoverIntent.js"></script>
    <script src="js/superfish.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/main.js"></script>
    <script src="js/signup.js"></script>
</body>

</html>