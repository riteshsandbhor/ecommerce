<?php
  include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'dbconn.php';
  session_start();
  if (isset($_SESSION['Ownerid'])) {
    $oid=$_SESSION['Ownerid'];
  }else {
    header("Location: ./ownerlogin.php");
  }
  if (isset($_POST['invoice'])) {
    $id = $_POST['c_id'];
    $orderid = $_POST['orderid'];
    $ordertime = $_POST['ordertime'];
    $delivertime = $_POST['dispatchtime'];
    echo $id;
    $result13 = mysqli_query($con, "SELECT * FROM customer WHERE c_id=$id;");
    $row13 = mysqli_fetch_assoc($result13);

    $name = $row13['f_name']." ".$row13['l_name'];
    $phone = $row13['c_phone'];
    $email = $row13['c_email'];
    $address = $row13['c_address'];
    
    $result = mysqli_query($con, "SELECT * FROM cart WHERE o_id=$orderid;");
    if (mysqli_num_rows($result) > 0) {
      $finalprice=0;
      $htmlrows = '';
      while ($row12 = mysqli_fetch_assoc($result)) {
        $weight=$row12['weight'];
        $price=$row12['price'];
        $finalprice=$finalprice+$price;
        $itemid=$row12['item_id'];
        $query12 = "SELECT i_eng,type FROM items WHERE item_id=$itemid;";
        $result12 = mysqli_query($con, $query12);
        $row1 = mysqli_fetch_assoc($result12);

        $type=$row1['type'];
        if ($type==1) {
          $conversion=$weight/250;
          if ($weight < 1000) {
            $unit="g";
          }
          else {
              $unit="kg";
              $weight=$weight/1000;
          }
        }
        else if ($type==2) {
          $conversion=$weight;
          if ($weight == 1) {
            $unit="piece";
          }
          else {
            $unit="pieces";
          }
        }
        if ($type==3) {
          $conversion=$weight/250;
          if ($weight < 1000) {
            $unit="ml";
          }
          else {
              $unit="litre";
              $weight=$weight/1000;
          }
        }

          $htmlrows .= '
          <tr>
            <td>'.$row1['i_eng'].'</td>
            <td>'.$weight.' '.$unit.'</td>
            <td style="text-align: right;">₹'.$price.'</td>
          </tr>';
      }
    }
    require_once '../vendor/autoload.php';
    $html = "<!DOCTYPE html>
    <html>
    <!-- <html lang='ar'> for arabic only -->
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    
        <title>Mahalaxmi Vegetables Invoice</title>
        <style>
            @media print {
                @page {
                    margin: 0 auto; /* imprtant to logo margin */
                    sheet-size: 300px 250mm; /* imprtant to set paper size */
                }
                html {
                    direction: rtl;
                }
                html,body{margin:0;padding:0}
                #printContainer {
                    width: 250px;
                    margin: auto;
                    /*padding: 10px;*/
                    /*border: 2px dotted #000;*/
                    text-align: justify;
                }
    
               .text-center{text-align: center;}
               img{
                  height: 80px;
                  widht: 80px; 
               }
            }
        </style>
    </head>
    <body onload='window.print();'>
    <h1 id='logo' class='text-center'><img src='../images/Logo.png' alt='Logo'></h1>
    
    <div id='printContainer'>
        <h2 id='slogan' style='margin-top:0' class='text-center'>Mahalaxmi Vegetables</h2>
        <div style='border: 1px; border-style: dotted none none none;'><div>
        <table>
            <tr>
                <td>Order No.</td>
                <td>: $orderid</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>: $name</td>
            </tr>
    
            <tr>
                <td>Mobile No</td>
                <td>: $phone</td>
            </tr>
            <tr>
                <td>Ordered At</td>
                <td>: $ordertime</td>
            </tr>
            <tr>
                <td>Delivered At</td>
                <td>: $delivertime</td>
            </tr>
            <tr>
              <td>Address</td>
              <td>: $address</td>
            </tr>
        </table>
        <hr>
        <table>
            <tr>
                <td style='width:130px'><b>Product</b></td><br>
                <td style='width:60px'><b>Qty</b></td><br>
                <td><b>Amount</b></td>
            </tr>
            <tr><td colspan='3'><hr></td></tr>
            $htmlrows
        </table>
        <hr>
        <table>
          <tr style='text-align: center;'>
            <td><b>Total</b></td>
            <td><b>₹$finalprice</b></td>
          </tr>
        </table>
        <hr><br><br>
            <p style='font-size:12px;text-align:center;font-style:italic;font-weight:300;'><strong>Note :-</strong>  if you find any
            DISCRIMANCY in the QTY or MRP
            rates do let us know we shall reimburse
            for the same.<br><br>
            Sorry for Inconvenience items
            which are not in stock has been
            removed from list to expedite
            scheduled delivery
            <br>
            <br>
            Contact us on: +919819217208
            </p>
        
    </div>
    </body>
    </html>";

    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [57, 80]]);
    $mpdf->SetDisplayMode('fullpage');

    // $mpdf->SetWatermarkText('DRAFT');
    // $mpdf->showWatermarkText = true;

    $mpdf->SetWatermarkImage('../images/Logo.png');
    $mpdf->showWatermarkImage = true;
    $mpdf->WriteHTML($html);
    $mpdf->Output(); 
  }  
?>

