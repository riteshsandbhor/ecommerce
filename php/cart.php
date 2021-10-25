<?php
include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'dbconn.php';
session_start();
if (isset($_SESSION['Custid'])) {
  $id=$_SESSION['Custid'];
  $sql = mysqli_query($con, "SELECT * FROM customer WHERE c_id = {$id}");
  $fetch = mysqli_fetch_assoc($sql);
  $flag = (int) $fetch['flag'];
  if($flag == 0){
    header("Location: ./verifyMail.php?id=$id");
  }else{
    if (isset($_POST['deleteitem'])) {
      $cartid=$_POST['cartid'];
      $query= "DELETE FROM `cart` WHERE cart_id=$cartid";
      $result = mysqli_query($con, $query);
      echo "<script type='text/javascript'>
      alert('Item Deleted');
        window.location='./cart.php';
          </script>";
    }
    
  }
}else {
  header("Location: ./home.php");
}
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cart</title>
    <link rel="icon" href="../images/circle.png">
  </head>
  <body>

    <?php
      include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'header.php';
     ?>
     <div class="pag">
     <p class="pagehead"><?php echo lang('your_cart')?></p>
     </div>
     <!-- <div class="card"> -->
<div class="mainbox1">

     <?php
     $query = "SELECT * FROM cart WHERE c_id=$id && o_id=0;";
     $result = mysqli_query($con, $query);



     $totalfinalprice=0;


   if (mysqli_num_rows($result) > 0)
   {
       while ($row1 = mysqli_fetch_assoc($result)) {
         $iid=$row1['item_id'];
         $price=$row1['price'];
         $query12 = "SELECT * FROM items WHERE item_id=$iid";
         $result12 = mysqli_query($con, $query12);
         $row12 = mysqli_fetch_assoc($result12);
         $basicprize=$row12['price'];
         $type=$row12['type'];
         $quantity=$row12['quantity'];
         $weight=$row1['weight'];
         if ($quantity >= $weight) {
           $ahekanahi=lang('available');
           $color="color:#32CD32;font-weight:700;";
         }else {
           $ahekanahi=lang('outofstock');
           $color="color:#FF0000;font-weight:700;";
         }
         if ($type==1) {
            $finalprice=$price;
           $totalfinalprice=$totalfinalprice+$finalprice;
           if ($weight < 1000) {
             $unit="g";
           }
           else {
              $unit="kg";
              $weight=$weight/1000;
           }
         }
         else if ($type==2) {
           $finalprice=$price;
           $totalfinalprice=$totalfinalprice+$finalprice;
           if ($weight == 1) {
             $unit="piece";
           }
           else {
            $unit="pieces";
           }
         }
         else if ($type==3) {
          $finalprice=$price;
          $totalfinalprice=$totalfinalprice+$finalprice;
          if ($weight < 1000) {
            $unit="ml";
          }
          else {
              $unit="litre";
              $weight=$weight/1000;
          }
        }else if ($type==4) {
          $finalprice=$price;
          $totalfinalprice=$totalfinalprice+$finalprice;
          if ($weight == 1) {
            $unit="packet";
          }
          else {
           $unit="packets";
          }
        }

         echo '
         <div class="subcontain1 box">
           <div class="box box1">
             <img src="../images/Veg/'.$row12['img'].'" alt=""style="width: 164px;padding: 8px;height: 164px;background-size: contain;">

             <div class="mainbox2">
             <h3>'.lang($row12['i_eng']).'</h3>

             <div class="mainbox3">
             <p>₹'.$finalprice.'</p>&nbsp;&nbsp;for&nbsp;&nbsp;
             <p>'.$weight.' '.$unit.'</p>
             </div>
             <p style="'.$color.'">'.$ahekanahi.'</p>
             <div class="mainbox3">
             <form class="" action="" method="post">
               <input type="hidden"  name="cartid" value="'.$row1['cart_id'].'">
               <input type="submit" class="btn btngreen addto" style="width:100px;background-color:#FF0000;" name="deleteitem" value="Delete">
             </form>
             </div>
             </div>
             </div>
             </div>
         ';

       }
       echo '</div>
       <div class="col" style="margin: auto;">
      <p class="languages"><a href="./home.php">'.lang('add_more_items').'</a></p>
    </div><br>
       <div class="card totalprice" >
       <h3 style="font-weight:700;">'.lang('total_price').' ₹'.$totalfinalprice.'</h3>
         <form action="#" id="paymentform"><br/>
             <input hidden type="number" name="c_id" id="c_id" value='.$id.' >
             <input hidden type="number" name="amount" id="amount" value='.$totalfinalprice.' >
             <button type = "submit" value="online" class="btn btnwhite" id="payBtn" style="width:140px;font-weight:800;">PAY NOW</button>
             <button type = "submit" value="cod" class="btn btnwhite" id="payBtnCod" style="width:auto;font-weight:800;">PAY ON DELIVERY</button>
         </form>
       </div>
       </div>';
     }else {
      echo "<i id='emptycart' class='fa fa-cart-arrow-down fa-4x' aria-hidden='true'></i>&nbsp;No Items in Cart<br><a style='color:#009975;' href='./home.php'>&nbsp;Click Here to continue Shopping</a>";
     }

      ?>
</div>
</div>

       <?php include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'footer.php';   ?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

      <script src="./payment.js">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  </body>
</html>
