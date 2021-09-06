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
    font-size: 16px;
  }

  h3{
    font-size: 24px !important;
    font-weight: bolder !important;
  }
</style>
<title>Policy</title>
</head>

<body>

  <?php
    include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'header.php';
    ?>

<br><br>
        <section id="aboutus">
          <div class="card logcard animated zoomIn" id="info">
            <div class="container"pt-3>
              <h3>ABOUT US</h3><br>
              <br>
              <p style="line-height: 2;text-align:justify;";>
              <strong>What is mahalaxmivegetables.com?</strong><br>
                Shree Mahalaxmi Vegetables (Shetkari To Grahak) belongs to the group of farmers from Pune District offering a wide range of fresh and 100% natural vegetables and fruits directly from farm. We are starting this journey by working in the perishables of Vegetables and Fruits. Due to considering COVID'19 Security Paramenters, We offers a simplest way of shopping for fresh and sanitized veggies and fruits with a minimal human touch and maintian beeter hygiene. Our responsibility is to assure our clients and strengthen good relations with them by providing the superior quality fresh products at the best rates. In coming days, We also going to provide provide kitchen essentials, dairy products which important related to food and kitchen.
                <br><br>
                <strong>Vision</strong><br>
                Shree Mahalaxmi Vegetables want to feel gape between farmers to customers and would like to build a good and long-lasting relationship with our consumers. 
                <br><br>
                <strong>Mission</strong><br>
                Our main mission is to provide fresh quality vegetables and fruits at low rates. 
                <br><br>
                <strong>Our Salient Features :</strong><br>
                1. Provide Good Quality fresh Vegetables, Fruits and others product directly from farmers to customers.<br>
                2. Vast range and Best offers on product.<br>
                3. We don’t compromise with quality.<br>
                4. Hygenic and environment-friendly packing.<br>
                5. Faster delivery.<br><br>
              </p><br>
            </div>
          </div>
        </section>
          <br><br>
          <section id="TC">
            <div class="card logcard animated zoomIn" id="info">
              <div class="container"pt-3>
                <h3>Terms & Conditions</h3><br>
                <p style="line-height: 2;text-align:justify;";>
                Mahalaxmi Vegetables may at any time modify the Terms & Conditions of Use of the Website without any prior notification to you. You can access the latest version of these Terms & Conditions at any given time on the Site. You should regularly review the Terms & Conditions on the Site. In the event the modified Terms & Conditions is not acceptable to you, you should discontinue using the Service. However, if you continue to use the Service you shall be deemed to have agreed to accept and abide by the modified Terms & Conditions of Use of this Site.
                <br><br>
                
                <strong>Personal Information</strong><br>

                As part of the registration process on the portal, We may collect the following personally identifiable information about you: Name including first and last name, email address, mobile phone number and contact details, Postal code.
                <br><br>
                <strong>Eligibility</strong><br>

                Services of the portal would be available to only select in Thane, Maharashtra Area. Persons who are "incompetent to contract" within the meaning of the Indian Contract Act, 1872 including un-discharged insolvents etc. are not eligible to use the Site. If you are a minor i.e. under the age of 18 years but at least 13 years of age you may use the Site only under the supervision of a parent or legal guardian who agrees to be bound by these Terms of Use. If your age is below 18 years your parents or legal guardians can transact on behalf of you if they are registered users. You are prohibited from purchasing any material which is for adult consumption and the sale of which to minors is prohibited.
                <br><br>
                <strong>License & Site access</strong><br>

                This license does not include any resale or commercial use of this site or its contents; any collection and use of any product listings, descriptions, or prices; any derivative use of this site or its contents; any downloading or copying of account information for the benefit of another merchant; or any use of data mining, robots, or similar data gathering and extraction tools. This site or any portion of this site may not be reproduced, duplicated, copied, sold, resold, visited, or otherwise exploited for any commercial purpose without express written consent of with us.
                <br><br>
                <strong>Account & Registration Obligations</strong><br>

                All shoppers have to register and login for placing orders on the Site. You have to keep your account and registration details current and correct for communications related to your purchases from the site. By agreeing to the terms and conditions, the shopper agrees to receive promotional communication and newsletters upon registration. The customer can opt out either by unsubscribing in "My Account" or by contacting the customer service.
                <br><br>
                <strong>Pricing</strong><br>

                All the products listed on the Site will be sold at MRP unless otherwise specified. The prices mentioned at the time of ordering will be the prices charged on the date of the delivery. Although prices of most of the products do not fluctuate on a daily basis but some of the commodities and fresh food prices do change on a daily basis. In case the prices are higher or lower on the date of delivery not additional charges will be collected or refunded as the case may be at the time of the delivery of the order.
                <br><br>
                <strong>Governing Law and Jurisdiction</strong><br>

                This User Agreement shall be construed in accordance with the applicable laws of India. The Courts at Thane shall have exclusive jurisdiction in any proceedings arising out of this agreement.
                Any dispute or difference either in interpretation or otherwise, of any terms of this User Agreement between the parties hereto, the same shall be referred to an independent arbitrator who will be appointed by IRCPL and his decision shall be final and binding on the parties hereto. The above arbitration shall be in accordance with the Arbitration and Conciliation Act, 1996 as amended from time to time. The arbitration shall be held in Bangalore. The High Court of judicature at Bangalore alone shall have the jurisdiction and the Laws of India shall apply.
                <br><br>
                <strong>Objectionable Material</strong><br>

                You understand that by using this Site or any services provided on the Site, you may encounter Content that may be deemed by some to be offensive, indecent, or objectionable, which Content may or may not be identified as such. You agree to use the Site and any service at your sole risk and that to the fullest extent permitted under applicable law, mahalaxmivegetables.com and its affiliates shall have no liability to you for Content that may be deemed offensive, indecent, or objectionable to you.
                <br><br>
                <strong>Indemnity</strong><br>

                You agree to defend, indemnify and hold harmless mahalaxmivegetables.com, its employees, directors, officers, agents and their successors and assigns from and against any and all claims, liabilities, damages, losses, costs and expenses, including attorney's fees, caused by or arising out of claims based upon your actions or inactions, which may result in any loss or liability to mahalaxmivegetables.com or any third party including but not limited to breach of any warranties, representations or undertakings or in relation to the non-fulfilment of any of your obligations under this User Agreement or arising out of the your violation of any applicable laws, regulations including but not limited to Intellectual Property Rights, payment of statutory dues and taxes, claim of libel, defamation, violation of rights of privacy or publicity, loss of service by other subscribers and infringement of intellectual property or other rights. This clause shall survive the expiry or termination of this User Agreement.
                <br><br>
                <strong>Termination</strong><br>

                This User Agreement is effective unless and until terminated by either you or mahalaxmivegetables.com You may terminate this User Agreement at any time, provided that you discontinue any further use of this Site. We may terminate this User Agreement at any time and may do so immediately without notice, and accordingly deny you access to the Site, Such termination will be without any liability to mahalaxmivegetables.com. Upon any termination of the User Agreement by either you or mahalaxmivegetables.com, you must promptly destroy all materials downloaded or otherwise obtained from this Site, as well as all copies of such materials, whether made under the User Agreement or otherwise. mahalaxmivegetables.com's right to any Comments shall survive any termination of this User Agreement. Any such termination of the User Agreement shall not cancel your obligation to pay for the product already ordered from the Website or affect any liability that may have arisen under the User Agreement.

                <br><br>
                <strong>You Agree and Confirm</strong><br>

                That in the event that a non-delivery occurs on account of a mistake by you (i.e. wrong name or address or any other wrong information) any extra cost incurred by mahalaxmivegetables.com for redelivery shall be claimed from you.<br>
                That you will use the services provided by the Site, its affiliates, consultants and contracted companies, for lawful purposes only and comply with all applicable laws and regulations while using and transacting on the Site.<br>
                You will provide authentic and true information in all instances where such information is requested of you. Mahalaxmi Vegetables reserves the right to confirm and validate the information and other details provided by you at any point of time. If upon confirmation your details are found not to be true (wholly or partly), it has the right in its sole discretion to reject the registration and debar you from using the Services and / or other affiliated websites without prior intimation whatsoever.<br>
                You authorise to contact you for any transactional purposes related to your order/account.
                That you are accessing the services available on this Site and transacting at your sole risk and are using your best and prudent judgment before entering into any transaction through this Site.<br>
                That the address at which delivery of the product ordered by you is to be made will be correct and proper in all respects.<br>
                That before placing an order you will check the product description carefully. By placing an order for a product you agree to be bound by the conditions of sale included in the item's description.<br>

                <br><br>
                <strong>You may not use the Site for any of the following purposes:</strong><br>

                Disseminating any unlawful, harassing, libellous, abusive, threatening, harmful, vulgar, obscene, or otherwise objectionable material.
                Transmitting material that encourages conduct that constitutes a criminal offence or results in civil liability or otherwise breaches any relevant laws, regulations or code of practice.
                Gaining unauthorized access to other computer systems.
                Interfering with any other person's use or enjoyment of the Site.
                Breaching any applicable laws;
                Interfering or disrupting networks or web sites connected to the Site.
                Making, transmitting or storing electronic copies of materials protected by copyright without the permission of the owner.
                </p><br>
              </div>
            </div>
          </section>
          <br><br>
          <section id="refund">
            <div class="card logcard animated zoomIn" id="info">
              <div class="container"pt-3>
                <h3>REFUNDS/CANCELLATION</h3><br>
                <p style="line-height: 2;text-align:justify;";>
                <strong>Cancellation by Site / Customer</strong><br>

                You as a customer can cancel your order anytime up to the cut-off time of the slot for which you have placed an order by calling our customer service. In such a case we will refund any payments already made by you for the order. If we suspect any fraudulent transaction by any customer or any transaction which defies the terms & conditions of using the website, we at our sole discretion could cancel such orders. We will maintain a negative list of all fraudulent transactions and customers and would deny access to them or cancel any orders placed by them.

                <br><br>
                <strong>Return & Refunds</strong><br>

                We have a "no questions asked return and refund policy" which entitles all our members to return the product at the time of delivery if due to some reason they are not satisfied with the quality or freshness of the product. We will take the returned product back with us and issue a credit note for the value of the return products which will be credited to your account on the Site. This can be used to pay your subsequent shopping bills.

                </p><br>
              </div>
            </div>
          </section>

<?php include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'footer.php';   ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
