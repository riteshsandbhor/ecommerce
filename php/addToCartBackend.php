<?php
    session_start();
    include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'dbconn.php';

    if (isset($_SESSION['Custid'])) {
        $id=$_SESSION['Custid'];
        
      
    // if (isset($_POST['addtocart'])) {
        $itemid=$_POST['itemid'];
        $currenttime=time();
        $time=$currenttime+600;
        $quantity=$_POST['quantity1'];
        $itemtype=$_POST['itemtype'];
        $itemprice=$_POST['itemprice'];
        
        if($quantity=="" || $itemid=="" || $itemprice=="" || $itemtype==""){
            echo "Please Select Quantity";
        }
        else{

            $query1= "SELECT cart_id,weight FROM `cart` WHERE o_id=0 && c_id=$id && item_id=$itemid";
            $result1 = mysqli_query($con, $query1);
    
        if (mysqli_num_rows($result1) > 0){
            $row2 = mysqli_fetch_assoc($result1);
            $cartid=$row2['cart_id'];
            $original=$row2['weight'];
            $final=$original+$quantity;
            if ($itemtype==1) {
            $conversion=$final/250;
            $finalprice=$itemprice*$conversion;
            }
            else if ($itemtype==2) { 
            $finalprice=$itemprice*$final;
            }
            else if ($itemtype==3) {
            $conversion=$final/250;
            $finalprice=$itemprice*$conversion;
            }else if ($itemtype==4) { 
            $finalprice=$itemprice*$final;
            }
            $query= "UPDATE `cart` SET weight=$final,price=$finalprice WHERE cart_id=$cartid ";
            $result = mysqli_query($con, $query);
            if($query){
                echo "success";
            }else{
                echo "error";
            }
        }else {
            if ($itemtype==1) {
            $conversion=$quantity/250;
            $finalprice=$itemprice*$conversion;
            }
            else if ($itemtype==2) {
            $finalprice=$itemprice*$quantity;
            }
            else if ($itemtype==3) {
            $conversion=$quantity/250;
            $finalprice=$itemprice*$conversion;
            }else if ($itemtype==4) {
            $finalprice=$itemprice*$quantity;
            }
            $query= "INSERT INTO `cart`(`c_id`, `item_id`, `weight`, `price`) VALUES ($id,$itemid,$quantity,$finalprice)";
            $result = mysqli_query($con, $query);
                if($query){
                    echo "success";
                }else{
                    echo "error";
                }
            
        }

        }
        
    }else{
        echo "session_error";
    }
       