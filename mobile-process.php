<?php
    include_once("do-connect.php");//to establish connection to database
    $mobile = $_GET["mobile"];
    $query="select * from visitor where mobile = '$mobile';";//check if there is any existing pno 
    $table=mysqli_query($dbRef,$query);//execute query ans store results
    if(mysqli_num_rows($table)>=1){
        echo "exists";
    }
?>