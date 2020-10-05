<?php
session_start(); ?>
<!DOCTYPE html>
<html class="no-js">
<?php
include_once("do-connect.php");
$cartype = $_GET['cartype'];
$pickupLocation = $_GET['pickupLocation'];
$pickupTime = $_GET['pickupTime'];
$pickupDate = $_GET['pickupDate'];
$dropoffDate = $_GET['dropoffDate'];
$dropoffTime = $_GET['dropoffTime'];
$tripType = $_GET['tripType'];
$roundTrip = false;
$dropoffLocation = "";
$distance = 500;
if ($_GET["tripType"] === "Round Trip") {
    $roundTrip = true;
    $distance = 0;
} else {
    $dropoffLocation = $_GET['dropoffLocation'];
    $query2 = "select dist from distance where (start ='$pickupLocation' and destination='$dropoffLocation') or (destination ='$pickupLocation' and start='$dropoffLocation')";
    $table = mysqli_query($dbRef, $query2);
    while ($row = mysqli_fetch_array($table)) {
        $distance =  $row['dist'];
    }
}

$query = "select * from car where isavailable = 1 and cartype = '$cartype' and city = '$pickupLocation'";
$table = mysqli_query($dbRef, $query);
$car = array();
while ($row = mysqli_fetch_array($table)) {
    $car[] =  $row;
}
$date1 = strtotime("$pickupDate $pickupTime");
$date2 = strtotime("$dropoffDate $dropoffTime");
$diff = abs($date2 - $date1);
$hours = $diff / (60 * 60);
$nights = (int) ($hours / 24);
$hours = $hours - $nights * 24;
$duration = $hours;
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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <?php include("header.php"); ?>
    <style>
        header {
            background-color: #FF7F50;
        }
    </style>

    <section class="contact-page-area section-gap">
        <div class="container">
            <div class="row fullscreen d-flex">
                <div class="banner-content col-md-4 text-white bg-dark p-3" style="line-height: 2em">
                    <div class="row">
                        <div class="col-6" style="font-size: 1.25em;">
                            <div class="row">
                                <div class="col-12"><span class="lnr lnr-location"></span> <span id="pickupLocation"><?php echo $pickupLocation; ?></span></div>
                                <?php if (!$roundTrip) {
                                ?>
                                    <div class="col-12"><span class="lnr lnr-map-marker"></span> <span id="dropoffLocation"><?php echo $dropoffLocation; ?></span></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-md-12"><span class="lnr lnr-calendar-full"></span> <span id="pickupDate"><?php $date = strtotime($pickupDate);
                                                                                                                            $time = strtotime($pickupTime);
                                                                                                                            echo date('d M Y', $date) . " " . date('H:i', $time) ?></span></div>
                                <?php if (!$roundTrip) {
                                ?>
                                    <div class="col-md-12"><span class="lnr lnr-calendar-full"></span> <span id="dropoffDate"><?php $date = strtotime($dropoffDate);
                                                                                                                                $time = strtotime($dropoffTime);
                                                                                                                                echo date('d M Y', $date) . " " . date('H:i', $time) ?></span></div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['name'])) {
                    ?>
                        <div class="row">

                            <div class="col-12 font-weight-bold mt-3">Base Fare Includes</div>
                            <div class="col-6">Night Charge</div>
                            <div class="col-6">
                                <span id="fareperstay">- -</span>
                                per night
                            </div>
                            <span id="carnumber" hidden></span>
                            <div class="col-6">
                                <span id="nights"><?php echo $nights; ?></span>
                                Nights
                            </div>
                            <span id="carnumber" hidden></span>
                            <div class="col-6">
                                &#x20B9;
                                <span id="stayprice"> - -</span>
                            </div>
                            <div class="col-6">Hourly Charge</div>
                            <div class="col-6">
                                <span id="fareperhour">- -</span>
                                per hour
                            </div>
                            <div class="col-6">
                                <span id="hours"><?php echo $duration; ?></span>
                                Hours
                            </div>
                            <div class="col-6">
                                &#x20B9;
                                <span id="hourprice">- -</span>
                            </div>

                            <div class="col-12 font-weight-bold mt-3">Other Charges
                            </div>
                            <?php if (!$roundTrip) { ?>
                                <div class="col-6">Cab & Fuel Charges</div>
                                <div class="col-6">
                                    <span id="fareperkm">- -</span>
                                    per KM
                                </div>
                                <div class="col-6">
                                    <span id="distance"><?php echo $distance; ?></span>
                                    KM
                                </div>
                                <div class="col-6">
                                    &#x20B9;
                                    <span id="returnprice">- -</span>
                                </div>
                            <?php } ?>

                            <div class="col-6 font-weight-bold mt-3" style="font-size: 2.5em;">Total
                            </div>
                            <div class="col-6 font-weight-bold mt-3" style="font-size: 2.5em;">
                                &#x20B9;
                                <span id="total">--</span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <button class="btn btn-dark btn-block" style="background-color: #FF7F50" type="button" id="booknow">Book Now</button>
                            </div>
                        </div>
                    <?php } else {
                    ?>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <a class="btn btn-dark btn-block" style="background-color: #FF7F50" href="login.php">Sign In</a>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
                <div class="col-md-8">

                    <?php
                    foreach ($car as $item) {
                        $profile = "no_image.png";
                        if (isset($item['profile']) && $item['profile'] !== '')
                            $profile = $item['profile'];
                        $price = ($duration * (int) $item['fareperhour']) + $nights * (int) $item['fareperstay'];

                        $price += $distance * $item['fareperkm'];

                    ?>
                        <div class="banner-content card car">
                            <div class="row no-gutters px-2 ">
                                <div class="col-md-4 mt-3">
                                    <img src="<?php echo $profile; ?>" class="card-img" alt="...">
                                </div>
                                <div class="col-md-4" style="line-height: 0.5;">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?php echo ucwords($item['carname']); ?>
                                        </h5>
                                        <p class="card-text">
                                            <span class="carType"><?php echo ucwords($item['cartype']); ?></span>
                                        </p>
                                        <p class="card-text">
                                            <span class="carnumber"><?php echo ucwords($item['carnumber']); ?></span>
                                        </p>
                                        <p class="card-text">
                                            &#x20B9;
                                            <span class="fareperhour"><?php echo ($item['fareperhour']); ?></span>
                                            / Hour
                                        </p>
                                        <p class="card-text">
                                            &#x20B9;
                                            <span class="fareperstay"><?php echo ($item['fareperstay']); ?></span>
                                            / Night
                                        </p>
                                        <p class="card-text">
                                            &#x20B9;
                                            <span class="fareperkm"><?php echo ($item['fareperkm']); ?></span>
                                            / KM
                                        </p>
                                        <p class="card-text">
                                            <?php echo ucwords($item['varient'] . ' | ' . $item['mileage'] . ' KMPL | ' . $item['seater'] . ' Seater') ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card-body">
                                        <div class="card-title font-weight-bold text-black" style="font-size: 2em;">&#x20B9;<?php echo round($price, 2); ?></div>
                                        <?php if (isset($_SESSION['name'])) { ?>
                                            <button class="btn btn-dark selectcar" style="background-color: #FF7F50" type=" ">Select</button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>


                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
    </section>

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
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="js/roadway.js"></script>

</body>

</html>