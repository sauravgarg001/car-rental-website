<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<?php
include_once("do-connect.php");
$query = "select distinct city from car where isavailable = 1";
$table = mysqli_query($dbRef, $query);
$city = array();;
while ($row = mysqli_fetch_array($table)) {
	array_push($city, $row['city']);
}
$query = "select distinct cartype from car where isavailable = 1";
$table = mysqli_query($dbRef, $query);
$cartype = array();
while ($row = mysqli_fetch_array($table)) {
	array_push($cartype, $row['cartype']);
}
$query = "select start destination from distance union select destination from distance";
$table = mysqli_query($dbRef, $query);
$destination = array();
while ($row = mysqli_fetch_array($table)) {
	array_push($destination, $row['destination']);
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
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
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
				<div class="banner-content col-lg-5 col-md-4 ">
					<h4 class="text-white ">LICABLY-Outstaion Cab Provider</h4>
					<h1 class="text-white text-uppercase">
						Relaxed Journey Ever
					</h1>
					<p class="pt-20 pb-20 text-white">
						BOOK ONLINE CAB || ONEWAY OUTSTATION CAB || ROUND TRIP OUTSTATION CAB
					</p>

				</div>
				<div class="col-lg-7  col-md-8 header-right">
					<h4 class="text-white pb-30">GO FOR A RIDE!</h4>
					<form class="form" role="form" autocomplete="off" action="roadway.php" method="GET">
						<div class="form-group">
							<div class="default-select" id="default-select">
								<select name="cartype" class="isNull" required>
									<option value="" disabled selected hidden>Select Your Cab</option>
									<?php
									foreach ($cartype as $item) {
									?>

										<option value="<?php echo $item; ?>"><?php echo $item; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-4 wrap-left">
								<div class="default-select" id="default-select">
									<select id="pickupLocation" name="pickupLocation" class="isNull" required>
										<option value="" disabled selected hidden>Source City</option>
										<?php
										foreach ($city as $item) {
										?>

											<option value="<?php echo $item; ?>"><?php echo $item; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-md-4 ">
								<div class="input-group dates-wrap">
									<input id="datepicker" class="dates form-control isNull" id="exampleAmount" placeholder="Pickup Date" type="text" name="pickupDate" required>
									<div class="input-group-prepend">
										<span class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
									</div>
								</div>
							</div>
							<div class="col-md-4 wrap-right">
								<div class="input-group dates-wrap">
									<input id="timepicker" class="dates form-control isNull timepicker" id="exampleAmount" placeholder="Pickup Time" type="text" name="pickupTime" required>
									<div class="input-group-prepend">
										<span class="input-group-text"><span class="lnr lnr-clock"></span></span>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-4 wrap-left" id="dropOff">

								<div class="default-select" id="default-select">
									<select name="dropoffLocation" class="isNull">
										<option value="" disabled selected hidden>Destination City</option>
										<?php
										foreach ($destination as $item) {
										?>

											<option value="<?php echo $item; ?>"><?php echo $item; ?></option>
										<?php
										}
										?>
									</select>
								</div>

							</div>
							<div class="col-md-4 wrap-left" id="dropOffHide" style="display: none;"></div>
							<div class="col-md-4 ">
								<div class="input-group dates-wrap">
									<input id="datepicker2" class="dates form-control isNull" id="exampleAmount" placeholder="Dropoff Date" type="text" name="dropoffDate" required>
									<div class="input-group-prepend">
										<span class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
									</div>
								</div>
							</div>
							<div class="col-md-4 wrap-right">
								<div class="input-group dates-wrap">
									<input id="timepicker2" class="dates form-control isNull timepicker" id="exampleAmount" placeholder="Dropoff Time" type="text" name="dropoffTime" required>
									<div class="input-group-prepend">
										<span class="input-group-text"><span class="lnr lnr-clock"></span></span>
									</div>
								</div>
							</div>

						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<div class="custom-control custom-radio">
									<input type="radio" id="onewayTrip" name="tripType" class="custom-control-input" checked value="One Way" required>
									<label class="custom-control-label text-white" for="onewayTrip">One Way</label>
								</div>

							</div>
							<div class="col-md-6">
								<div class="custom-control custom-radio">
									<input type="radio" id="roundTrip" name="tripType" class="custom-control-input" value="Round Trip" required>
									<label class="custom-control-label text-white" for="roundTrip">Round Trip</label>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
								<input type="submit" class="btn btn-lg btn-block text-center text-uppercase text-white" style="background-color: #FF7F50;" value="Book CAB">
							</div>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/index.js"></script>
	<script>
		$(document).ready(function() {
			$("#roundTrip").click(function() {
				$("#dropOff").css("display", "none");
				$("#dropOffHide").css("display", "block");
			});
			$("#onewayTrip").click(function() {
				$("#dropOff").css("display", "block");
				$("#dropOffHide").css("display", "none");
			});
		});
	</script>
</body>

</html>