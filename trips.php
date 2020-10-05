<?php
session_start(); ?>
<!DOCTYPE html>
<html class="no-js">
<?php
include_once("do-connect.php");
$trip = array();
$query = "select * from trip t,car c where t.carnumber = c.carnumber and t.email='".$_SESSION['email']."'";
$table = mysqli_query($dbRef, $query);
while ($row = mysqli_fetch_array($table)) {
    $trip[] =  $row;
}
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
    <!-- CSS -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
        .w3hubs {
            transform: translate(-50%, -50%) rotateY(180deg);
            display: flex;
        }

        .w3hubs input {
            display: none;
        }

        .w3hubs label {
            display: block;
            cursor: pointer;
            width: 30px;
        }

        .w3hubs label:before {
            content: '\f005';
            font-family: fontAwesome;
            position: relative;
            display: block;
            font-size: 30px;
            color: #101010;
        }

        .w3hubs label:after {

            content: '\f005';
            font-family: fontAwesome;
            position: absolute;
            display: block;
            font-size: 30px;
            color: #FF7F50;
            top: 0;
            opacity: 0;
            transition: .5s;
            text-shadow: 0 2px 5px rgba(0, 0, 0, .5);
        }

        .w3hubs label:hover:after,
        .w3hubs label:hover~label:after,
        .w3hubs input:checked~label:after {
            opacity: 1;
        }
    </style>
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
                <div class="col-md-12">

                    <?php
                    foreach ($trip as $item) {
                        $profile = "no_image.png";
                        if (isset($item['profile']) && $item['profile'] !== '')
                            $profile = $item['profile'];
                    ?>
                        <form action="trips-process.php" method="POST">
                            <div class="banner-content card car">
                                <div class="row no-gutters px-2 ">
                                    <div class="col-md-4 mt-3">
                                        <img src="<?php echo $profile; ?>" class="card-img" alt="...">
                                    </div>
                                    <div class="col-md-4" style="line-height: 0.5;">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <span id="carname"><?php echo ucwords($item['carname']); ?></span>
                                            </h5>
                                            <p class="card-text">
                                                <span id="carType"><?php echo ucwords($item['cartype']); ?></span>
                                            </p>
                                            <p class="card-text">
                                                <span id="carnumber"><?php echo ucwords($item['carnumber']); ?></span>
                                            </p>
                                            <p class="card-text">
                                                &#x20B9;
                                                <span id="fareperhour"><?php echo ($item['fareperhour']); ?></span>
                                                / Hour
                                            </p>
                                            <p class="card-text">
                                                &#x20B9;
                                                <span id="fareperstay"><?php echo ($item['fareperstay']); ?></span>
                                                / Night
                                            </p>
                                            <p class="card-text">
                                                &#x20B9;
                                                <span id="fareperkm"><?php echo ($item['fareperkm']); ?></span>
                                                / KM
                                            </p>
                                            <p class="card-text">
                                                <?php echo ucwords($item['varient'] . ' | ' . $item['mileage'] . ' KMPL | ' . $item['seater'] . ' Seater') ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="line-height: 0.8;">
                                        <div class="card-body">
                                            <div class="card-title font-weight-bold text-black" style="font-size: 2em;">&#x20B9;<?php echo round($item['price'], 2); ?></div>
                                            <p class="card-text">
                                                From
                                                <span class="fromLocation"><?php echo ($item['fromLocation']); ?></span>
                                                at
                                                <span class="fromDate"><?php echo ($item['fromDate']); ?></span>
                                                <input name="fromDate" type="text" value="<?php echo ($item['fromDate']); ?>" hidden required>
                                            </p>
                                            <p class="card-text">
                                                To
                                                <span class="toLocation"><?php echo ($item['toLocation']); ?></span> at
                                                <span class="toDate"><?php echo ($item['toDate']); ?></span>
                                            </p>
                                            <?php if (!isset($item['review'])) { ?>

                                                <p class="card-text px-2" style="display: flex;">
                                                    <div class="w3hubs mx-2">
                                                        <input type="radio" name="rating" id="star1"  value="1" required><label for="star1"></label>
                                                        <input type="radio" name="rating" id="star2" value="2"><label for="star2"></label>
                                                        <input type="radio" name="rating" id="star3" value="3"><label for="star3"></label>
                                                        <input type="radio" name="rating" id="star4" value="4"><label for="star4"></label>
                                                        <input type="radio" name="rating" id="star5" value="5"><label for="star5"></label>
                                                    </div>
                                                </p>
                                                <div class="form-group m-0">
                                                    <textarea class="form-control" id="review" rows="3" placeholder="write your review regarding trip here.." name="review" required></textarea>
                                                </div>
                                                <button class="btn btn-dark submitReview mt-3" style="background-color: #FF7F50" type="submit">Submit</button>


                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </form>
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
    <script src="js/roadway.js"></script>

</body>

</html>