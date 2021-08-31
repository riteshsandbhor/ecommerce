<?php
include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'dbconn.php';
session_start();
 ?>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="icon" href="../images/circle.png">
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/cards.css">
</head>
<body>
  <?php
    include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'header.php';
  ?>
  <br><br>
  <p class="languages"><a href="?lang=english">English</a> | <a href="?lang=marathi">मराठी</a> | <a href="?lang=hindi">हिन्दी</a></p>
  <br/><br/>
  <div class="card logcard">
    <div id="forget_pass">
      <h3 class="cardhead"><?php echo lang('forgot_pass')?></h3><br>

      <form action="" id="form" method="post">
      <div class="row">
        <div class="col">
          <div class="error-text">This is an error message!!</div>
        </div>
      </div>
        <div class="form-group">
          <label for="email" style="float:left;"><strong><?php echo lang('email'); ?></strong></label>
          <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" type="email" class="form-control" id="email" name="email" placeholder="<?php echo lang('email'); ?>" required>
          <span id="emailmsg"></span>
        </div>
        <br/>
        <input type="button" id='btn' class="btn btngreen" name="btn" value=<?php echo lang('send')?>>
      </form><br/>
    </div>
  </div>
<script src="./forgot.js"></script>


  <?php include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'footer.php';   ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</body>
</html>
