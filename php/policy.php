<?php
session_start();
include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'dbconn.php';
if (isset($_SESSION['Custid'])) {
  $id=$_SESSION['Custid'];
}
?>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/cards.css">
<link rel="icon" href="../images/circle.png">
<style>
  strong{
    font-size: 18px;
  }
</style>
<title>Policy</title>
</head>

<body>

  <?php
    include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'header.php';
    ?>

<br><br>
        <div class="card logcard animated zoomIn" id="info">
            <div class="container"pt-3>
                        <h3><strong>Policy, Terms and Conditions</strong></h3>
                        <br>

                    <p style="line-height: 2;text-align:center;";>
                    <strong>What is mahalaxmivegetables.com</strong><br>
                    mahalaxmivegetables.com is Thane largest online fresh Fruits and Vegetables Shop. We guarantee on
                    time delivery, and the best quality!<br><br>

                    <strong>Cancellation by Customer</strong><br>

                    You as a customer can cancel your order anytime up to the cut-off time of the slot for which you have
                    placed an order by calling our Helpline Number. In such a case we will refund any payments already
                    made by you for the order.<br><br>

                    <strong>Return &amp; Refunds</strong><br>

                    We have a &quot;no questions asked return and refund policy&quot; which entitles all our members to return the
                    product at the time of delivery if due to some reason they are not satisfied with the quality or freshness
                    of the product. We will take the returned product back with us and issue a credit note for the value of
                    the return products which will be credited to your account on the Site. This can be used to pay your
                    subsequent shopping bills.<br><br>

                    <strong>Delivery Time-Frame:</strong><br>

                    1) Currently delivery of farm fresh fruits &amp; vegetables will be restricted to within Thane city only.<br>

                    2) Delivery of orders will be done within atleast 12 hours from placing the order.<br>

                    3) In a very rare case, delivery are delayed due to various reasons unforeseen for example, natural
                    calamities, lockouts, bandhs, octroi and/or any other unforeseen problems. We would try through the
                    best of means available to ensure safe arrival of your products; we request your patience on the same.<br><br>

                    <strong>Governing Law and Jurisdiction</strong><br>

                    This website is created and controlled by AY IT Solution in Thane as per the laws of India shall apply. This
                    agreement is governed and construed in accordance with the Laws of India. You hereby irrevocably
                    consent to the exclusive jurisdiction and venue of courts in Thane, Maharashtra, India, in all disputes
                    arising out of or relating to the use of the mahalaxmivegetables.com Site. Use of the
                    mahalaxmivegetables.com is unauthorized in any jurisdiction that does not give effect to all provisions
                    of these terms and conditions, including without limitation this paragraph. You agree to indemnify and
                    hold mahalaxmivegetables.com, its subsidiaries, affiliates, directors, officers and employees, harmless
                    any claim, demand, or damage, including reasonable attorneys&#39; fees, asserted by any third party due to
                    or arising out of your use of or conduct on the mahalaxmivegetables.com.<br><br>

                    <strong>Product Pricing</strong><br>

                    Product prices listed on the website are current. While every care has been taken to label the products
                    accurately, errors in data entry and updation may occur. mahalaxmivegetables.com reserve the right to
                    cancel the order in case a transaction has been made where the price indicated was not the correct
                    price. In the rare event that happens, we will give a full refund of all money received from the customer.
                    Prices are subject to change without advance notice. All prices on this web site are given in Indian
                    Rupees.
</p><br>

</div></div>
<?php include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'footer.php';   ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
