<?php session_start();
include_once("do-connect.php");
$email = $_SESSION["email"];
$pickupDate = $_GET["pickupDate"];
$pickupLocation = $_GET["pickupLocation"];
$dropoffDate = $_GET["dropoffDate"];
$dropoffLocation = $_GET["dropoffLocation"];
$carnumber = $_GET["carnumber"];
$total = $_GET["total"];
$query = "insert into trip(email,carnumber,fromDate,toDate,fromLocation,toLocation,price) values('$email','$carnumber','$pickupDate','$dropoffDate','$pickupLocation','$dropoffLocation','$total');";
mysqli_query($dbRef, $query);
$msg = mysqli_error($dbRef);
if ($msg == "")
    echo "done";
else
    echo "Error Occured";
