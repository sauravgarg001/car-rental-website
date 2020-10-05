<?php session_start();
include_once("do-connect.php");
$email = $_GET["email"];
$password = md5($_GET["password"]);
$query = "select * from visitor where email = '$email' and password = '$password'";
$table = mysqli_query($dbRef, $query);
if (mysqli_num_rows($table) == 1) {
    $row = mysqli_fetch_array($table);
    $_SESSION["email"] = $row["email"];
    $_SESSION["name"] = $row["name"];
    echo "done";
} else
    echo "Invalid Password or Email";
