<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<?php
include_once("do-connect.php");
$query = "select * from admin;";
$table = mysqli_query($dbRef, $query);
$admin = array();
while ($row = mysqli_fetch_array($table)) {
    $admin =  $row;
}
$query = "select  name, review, rating from trip t,visitor v where t.email = v.email and t.review is not NULL";
$table = mysqli_query($dbRef, $query);
$review = array();
while ($row = mysqli_fetch_array($table)) {
    $review[] =  $row;
}

?>

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/elements/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Car Rentals</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <?php include("header.php"); ?>
    <!-- #header -->

    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-5">
                    <h1 class="text-white">
                        About Us
                    </h1>
                    <p style="color:#f77D0A; font-size: 25px;"> We provide the best cab service!</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start home-about Area -->
    <section class="home-about-area" id="about">
        <div class="container-fluid">
            <div class="box">
                <div class="box-row ">
                    <div class="box-row">
                        <div class="box-cell box1 mt-4">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-review">
                                        <h3>We are best of hiring car</h3>
                                        LICABLY offers customers the comfortable and easiest option for travelling by a road.Our website saves customers time by searching taxis at very short notice of time period by fetching the best results from the vendors to book an outstation taxi.</p>
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6">
                                    <div class="single-review">
                                        <span>
                                            <h3>OUR DOOR DELIVERY QUICKLY</h3>
                                            This means that we are providing to our customers very quick and fastest pick and drop facility from their pickup point. Like everyone wants to save their precious time when they travelled from one place to another. Our aim to keeping passenger comfort as top most priority.
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-review">
                                        <span>
                                            <h3>ALL INDIA PERMIT YOUR TRIPS</h3>
                                            <p>
                                                We want to mentioned that your trip by using our online cab booking services yields permit in all over INDIA.This feature will make all of our customers road trip comfortable and joyful.
                                            </p>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-review">
                                        <span>
                                            <h3>QUALITY SERVICES</h3>
                                            <p>LICABLY offers highly effective and quality services to our customers. Like good quality running cab with highly trustworthy, honest drivers. We do care for customer satisfaction. We provide 24x7 customer care support to our customers from the beginning to the end of their journey.</p>
                                        </span>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
    </section> <!-- End home-about Area -->



    <!-- Start fact Area -->
    <section class="facts-area section-gap" id="facts-area" style="background-color:#F77D0A">
        <div class="container">
            <div class="row">
                <div class="col single-fact">
                    <h1 class="counter"><?php echo $admin['noofvisitors']; ?></h1>
                    <p>Number Of Visitors</p>
                </div>
                <div class="col single-fact">
                    <h1 class="counter"><?php echo $admin['reallyhappyclients']; ?></h1>
                    <p>Really Happy Rides</p>
                </div>
                <div class="col single-fact">
                    <h1 class="counter"><?php echo $admin['totalridecompleted']; ?></h1>
                    <p>Total Ride Completed</p>
                </div>
                <div class="col single-fact">
                    <h1 class="counter"><?php echo $admin['noofcabs']; ?></h1>
                    <p>Number Of cabs</p>
                </div>
            </div>
        </div>
    </section>
    <!-- end fact Area -->

    <!-- Start reviews Area -->
    <section class="reviews-area section-gap" id="review">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 pb-40 header-text text-center">
                    <h1>Our Customer Says</h1>
                </div>
            </div>
            <div class="row">
                <?php foreach ($review as $item) {
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-review">
                            <h4><?php echo $item['name']; ?></h4>
                            <p>
                                <?php echo $item['review']; ?>
                            </p>
                            <div class="star">
                                <?php for ($i = 0; $i < (int) $item['rating']; $i++) { ?>
                                    <span class="fa fa-star checked"></span>
                                <?php } ?>
                                <?php for ($i = 0; $i < 5 - (int) $item['rating']; $i++) { ?>
                                    <span class="fa fa-star"></span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- End reviews Area -->
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
</body>

</html>