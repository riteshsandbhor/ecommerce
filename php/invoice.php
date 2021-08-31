<?php
  include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'dbconn.php';
  session_start();
  if (isset($_SESSION['Custid']) && isset($_POST['invoice'])) {
    $id=$_SESSION['Custid'];
    $orderid=$_POST['orderid'];
    $delivertime=$_POST['delivertime'];
    $ordertime=$_POST['ordertime'];
  }else {
    header("Location: ./home.php");
  }
  if (isset($_POST['invoice'])) {
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
            <td style="width:300px">'.$row1['i_eng'].'</td>
            <td style="width:200px">'.$weight.' '.$unit.'</td>
            <td style="width:200px">₹'.$price.'</td>
          </tr>';
      }
    }
    require_once '../vendor/autoload.php';
    $html = "<h3 style='text-align:center;font-size:27px'>Mahalaxmi Vegetables</h3>\n
            <h3 style='text-align:center'>Order No.$orderid</h3>\n
            <hr>
            <h4>Name: $name</h4>\n
            <h4>Mobile No.: $phone</h4>\n
            <h4>Email ID: $email</h4>\n
            <h4>Address: $address</h2>\n
            <h4>Ordered At : $ordertime</h4>\n
            <h4>Delivered At: $delivertime</h4><br>
            <hr>\n
            <table>
                <tbody>
                    <tr>
                        <td style='width:300px'><strong>Product</strong></td>
                        <td style='width:200px'><strong>Qty</strong></td>
                        <td style='width:200px'><strong>Amount</strong></td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <table>
                <tbody>
                    $htmlrows
                </tbody>
            </table>
            <hr>
            <table>
                <tbody>
                    <tr>
                        <td style='width:300px'>&nbsp;</td>
                        <td style='width:200px'><strong>Total</strong></td>
                        <td style='width:200px'><strong>₹$finalprice</strong></td>
                    </tr>
                </tbody>
            </table>
            <hr><br><br>
            <p style='font-size:12px;text-align:center;font-style:italic;font-weight:300;'><strong>Note :-</strong>  if you find any
            DISCRIMANCY in the QTY or MRP
            rates do let us know we shall reimburse
            for the same.<br><br>
            Sorry for Inconvenience items
            which are not in stock has been
            removed from list to expedite
            scheduled delivery</p>";

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->SetDisplayMode('fullpage');

    // $mpdf->SetWatermarkText('DRAFT');
    // $mpdf->showWatermarkText = true;

    $mpdf->SetWatermarkImage('../images/Logo.png');
    $mpdf->showWatermarkImage = true;
    $mpdf->WriteHTML($html);
    $mpdf->Output(); 
  }  
?>

