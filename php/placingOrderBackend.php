<?php
    include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'dbconn.php';
    session_start();

    $payment_id =  $_GET['payment_id'];
    $payment_method =  $_GET['payment_method'];
    $id = mysqli_escape_string($con, $_POST['c_id']);

    if($payment_method == "cod"){
        if (!empty($payment_id) && !empty($id)) {
            $result = mysqli_query($con, "SELECT * FROM cart WHERE o_id=0 && c_id=$id ");
            $goforload=1;
            if (mysqli_num_rows($result) > 0)
            {
                while ($row1 = mysqli_fetch_assoc($result)) {
                    $iid=$row1['item_id'];
                    $result12 = mysqli_query($con, "SELECT * FROM items WHERE item_id=$iid");
                    $row12 = mysqli_fetch_assoc($result12);
                    $type=$row12['type'];
                    $quantity=$row12['quantity'];
                    $weight=$row1['weight'];
                    if ($quantity < $weight) {
                        $goforload=0;
                    }
                }
                if ($goforload==0) {
                    echo "outofstock";
                }
                else {
                    $currenttime=time();
                    $result = mysqli_query($con, "INSERT INTO `finalorder`(`c_id`, `timeorder`, `payment_id`) VALUES ($id,$currenttime,'{$payment_id}')");
                    $result1 = mysqli_query($con, "SELECT * FROM finalorder WHERE c_id=$id && timeorder=$currenttime");
                    $row123 = mysqli_fetch_assoc($result1);
                    $oredrid=$row123['o_id'];
                    $result178 = mysqli_query($con, "SELECT * FROM cart WHERE o_id=0 && c_id=$id");
                    if (mysqli_num_rows($result178) > 0)
                    {
                        while ($row145 = mysqli_fetch_assoc($result178)) {
    
                            $result179 = mysqli_query($con, "SELECT quantity FROM items WHERE item_id=".$row145['item_id']);
                            $row179 = mysqli_fetch_assoc($result179);
                            $quantity=$row179['quantity'];
                            $weight=$row145['weight'];
                            $finalquantity=$quantity-$weight;
                            $result176 = mysqli_query($con, "UPDATE items SET quantity=$finalquantity WHERE item_id=".$row145['item_id']);
                            $result12 = mysqli_query($con, "UPDATE cart SET o_id=$oredrid WHERE cart_id=".$row145['cart_id']);
                        }
                        echo "success";
                    }else{
                        echo "Something went wrong";
                    }
                }
            }else{
                echo "Something went wrong";
            }
        }else{
            echo "Something went wrong";
        }
    }else{
        if (!empty($payment_id) && !empty($id)) {
            $result = mysqli_query($con, "SELECT * FROM cart WHERE o_id=0 && c_id=$id ");
            $goforload=1;
            if (mysqli_num_rows($result) > 0)
            {
                while ($row1 = mysqli_fetch_assoc($result)) {
                    $iid=$row1['item_id'];
                    $result12 = mysqli_query($con, "SELECT * FROM items WHERE item_id=$iid");
                    $row12 = mysqli_fetch_assoc($result12);
                    $type=$row12['type'];
                    $quantity=$row12['quantity'];
                    $weight=$row1['weight'];
                    if ($quantity < $weight) {
                        $goforload=0;
                    }
                }
                if ($goforload==0) {
                    echo "outofstock";
                }
                else {
                    $currenttime=time();
                    $result = mysqli_query($con, "INSERT INTO `finalorder`(`c_id`, `timeorder`, `payment_id`) VALUES ($id,$currenttime,'{$payment_id}')");
                    $result1 = mysqli_query($con, "SELECT * FROM finalorder WHERE c_id=$id && timeorder=$currenttime");
                    $row123 = mysqli_fetch_assoc($result1);
                    $oredrid=$row123['o_id'];
                    $result178 = mysqli_query($con, "SELECT * FROM cart WHERE o_id=0 && c_id=$id");
                    if (mysqli_num_rows($result178) > 0)
                    {
                        while ($row145 = mysqli_fetch_assoc($result178)) {
    
                            $result179 = mysqli_query($con, "SELECT quantity FROM items WHERE item_id=".$row145['item_id']);
                            $row179 = mysqli_fetch_assoc($result179);
                            $quantity=$row179['quantity'];
                            $weight=$row145['weight'];
                            $finalquantity=$quantity-$weight;
                            $result176 = mysqli_query($con, "UPDATE items SET quantity=$finalquantity WHERE item_id=".$row145['item_id']);
                            $result12 = mysqli_query($con, "UPDATE cart SET o_id=$oredrid WHERE cart_id=".$row145['cart_id']);
                        }
                        echo "success";
                    }else{
                        echo "Something went wrong";
                    }
                }
            }else{
                echo "Something went wrong";
            }
        }else{
            echo "Something went wrong";
        }
    }

    
?>