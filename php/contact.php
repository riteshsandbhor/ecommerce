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
  <title>Contact us</title>
</head>
<body>

  <?php include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'header.php'; ?>  
  <br><br><br>
  <div class="card logcard animated zoomIn" id="info">
    <div class="container"pt-3>
      <h3 style="text-align: center;color:#009975;"><strong>CONTACT US</strong></h3><br>
      <p style="line-height: 1;text-align:center;";><strong>Contact No. : +919819217208</strong></p>
      <!-- <p style="line-height: 1;text-align:center;";><strong>Email-ID : farmfresh@gmail.com</strong></p><br> -->
      <form class="contactform" id="form">
      <div class="row">
        <div class="col">
          <div class="error-text">This is an error message!!</div>
        </div>
      </div>
        <div class="row">
          <div class="col-md-8 offset-md-2 text-left">
            <label for="info">Name</label>
            <input type="text" name="name" class="form-control category customselect classic" id="info" placeholder="Enter Name" required>
            <input type="hidden" name="id" value="<?php echo $id;?>" class="form-control" >
            <span id="info_err" class="text-danger" style="font-weight: bold"></span>
          </div><br><br><br/><br/>

          <div class="col-md-8 offset-md-2 text-left">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control category customselect classic" id="email" placeholder="Enter Email" required>
            <span id="info_err" class="text-danger" style="font-weight: bold"></span>
          </div><br><br><br/><br/>

          <div class="col-md-8 offset-md-2 text-left">
            <label for="number">Number</label>
            <input type="number" name="number" class="form-control category customselect classic" id="number" placeholder="Enter Number" required>
            <span id="info_err" class="text-danger" style="font-weight: bold"></span>
          </div><br><br><br/><br/>

          <div class="col-md-8 offset-md-2 text-left">
            <label for="subject">Subject</label>
            <input type="text" name="subject" class="form-control category customselect classic" id="subject" placeholder="Enter Subject" required>
            <span id="info_err" class="text-danger" style="font-weight: bold"></span>
          </div><br><br><br/><br/>
          
          <div class="col-md-8 offset-md-2 text-left">
            <label for="info">Message</label>
            <input type="text" name="info" class="form-control category customselect classic" id="info" placeholder="Description" required>
            <span id="info_err" class="text-danger" style="font-weight: bold"></span>
          </div>
        </div>
        <div class="row text-center">
          <div class="col"><br/><br/>
            <div class="text-center">
              <input type="button" class="btn btngreen" name="submit" value="submit" id="btn">
            </div>
          </div>
        </div><br>
      </form>
    </div>
  </div>
  <?php include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'footer.php';   ?>

  <script src="./contact.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
