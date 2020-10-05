<?php
include_once("do-connect.php");

$name = $_GET["name"];
$email = $_GET["email"];
$subject = $_GET["subject"];
$message = $_GET["message"];

$query = "insert into query values('$email','$name','$subject','$message');";
mysqli_query($dbRef, $query);
$msg = mysqli_error($dbRef);
if ($msg == "")
    echo "Response Recorded";
else
    echo "Error Occured";
