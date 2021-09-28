<?php
    include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'dbconn.php';
    session_start();
    $orderid = (int) $_GET['orderid'];
    $time = time();
    $sql = mysqli_query($con, "UPDATE finalorder SET cancel = 1, delivery = 1, timedelivery= $time, deliveryboy= -1 WHERE o_id=$orderid");
    if($sql){
        header("location: ownerdash.php");

    }else{
        header("location: ownerdash.php");
    }