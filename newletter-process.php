<?php
include_once("do-connect.php");

$email = $_GET["email"];

$query = "insert into newsletter values('$email');";
mysqli_query($dbRef, $query);
$msg = mysqli_error($dbRef);
if ($msg == "")
    echo "You are Now Subscribed to our Newsletter";
else
    echo "You are already Subscribed to our Newsletter";
