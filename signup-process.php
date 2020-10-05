<?php
include_once("do-connect.php");

$name = $_GET["name"];
$email = $_GET["email"];
$mobile = $_GET["mobile"];
$password = md5($_GET["password"]);

$query = "insert into visitor values('$name','$email','$mobile','$password');";
mysqli_query($dbRef, $query);
$msg = mysqli_error($dbRef);
if ($msg == "")
    echo "Account Created Succesfully";
else
    echo "Error Occured $msg";
?>