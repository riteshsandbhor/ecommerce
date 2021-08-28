<?php
    include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'dbconn.php';
    session_start();

    $id = mysqli_escape_string($con, $_POST['c_id']);

    if (!empty($id)) {
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
            }else{
                echo "success";
            }
        }else{
            echo "Something Went Wrong";
        }
    }else{
        echo "Something Went Wrong";
    }
?>