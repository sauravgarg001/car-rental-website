<?php
session_start();
include_once("do-connect.php");

$rating = 5-$_POST["rating"]+1;
$email = $_SESSION["email"];
$fromDate = $_POST["fromDate"];
$review = $_POST["review"];

$query = "update trip set rating = '$rating', review = '$review' where email='$email' and fromDate = '$fromDate'";
mysqli_query($dbRef, $query);
$msg = mysqli_error($dbRef);
if ($msg == "")
    "Account Created Succesfully";
else
    echo "Error Occured $msg";
header("Location:trips.php");
