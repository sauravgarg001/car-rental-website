<?php
session_start();
include_once("do-connect.php");

    $email = $_GET["email"];
$password = $_GET["password"];
$password = md5($password);
    $otp = $_GET["otp"];
    if($otp == $_SESSION["OTP"]){
        $query="update visitor set password = '$password' where email = '$email'";

        mysqli_query($dbRef,$query);
        $msg = mysqli_error($dbRef);
        if($msg !== "")
            echo "Error Occured , Try Again";
        else{
            session_destroy();
            echo "Password Changed";
        }
    }
    else
        echo "Wrong OTP";
