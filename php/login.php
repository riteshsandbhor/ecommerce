<?php
include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'dbconn.php';
session_start();
if(isset($_COOKIE['user'])){
  $cookie = $_COOKIE['user'];
  $sqln = mysqli_query($con, "SELECT * FROM customer WHERE cookie = '{$cookie}'");
  if(mysqli_num_rows($sqln) > 0){
    $rown = mysqli_fetch_assoc($sqln);
    $id = $rown['c_id'];
    $_SESSION['Custid'] = $id;
    $_SESSION['logintype'] = "1";
    header("Location: ./home.php");
  }
}
if (isset($_SESSION['Custid'])) {
  header("Location: ./home.php");
}
if (isset($_POST['logincustomer'])) {
  $mail = mysqli_real_escape_string($con,$_POST['c_email']);
  $query = "SELECT * FROM customer WHERE c_email='$mail'";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($result);
  $id = $row['c_id'];
  $pass = $row['c_password'];
  $password = mysqli_real_escape_string($con,$_POST['c_password']);
  if (password_verify($password, $pass)) {
    $random = rand(10001, 99999);
    $hashvalue = md5($mail);
    $cookie_value = $hashvalue.$random;
    $sql = mysqli_query($con, "UPDATE customer SET cookie = '{$cookie_value}' WHERE c_id = {$id}");
    if($sql){
      setcookie("user", $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    }
    $_SESSION['Custid'] = $id;
    $_SESSION['logintype'] = "1";
    // echo "Session set";
    header("Location: ./home.php");
  } else {
    // echo "Session not set";
    header("Location: ./login.php");
  }
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
<title>Login</title>
</head>

<body>

  <?php
    include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'header.php';
    ?>
<br><br>
<p class="languages"><a href="?lang=english">English</a> | <a href="?lang=marathi">मराठी</a> | <a href="?lang=hindi">हिन्दी</a></p>
<br><br>
<div class="card logcard">
  <h3 class="cardhead"><?php echo lang('login')?></h3>
  <form method="post">
  <br>
  <div class="form-group" style="text-align: left;">
    <label for lognum><b><?php echo lang('email')?></b> </label>
    <input type="email" name="c_email" class="form-control category customselect classic" id="logemail" placeholder=<?php echo lang('email'); ?>>
    <span id="logemailmsg">
  </div>
  <div class="form-group" style="text-align: left;">
    <label for logpassword><b><?php echo lang('password')?></b> </label>
    <input type="password"name="c_password" class="form-control category customselect classic" name="logpass" id="logpassword" placeholder=<?php echo lang('password')?>>
     <span id="pomsg">
  </div>
  <a style="color: #009975;" href="./forgotpassword.php"><?php echo lang('forgot_pass')?></a>
  <br><br>
  <button class="btn btngreen" name="logincustomer" id="btn"><?php echo lang('login_btn')?></button>
  </form>
  </div>
<br><br>



<script type="text/javascript">
  $(document).ready(function(){

     $("#btn").prop('disabled', true);

    $("#logemail").keyup(function(){

      if(valEmail()){

        $("#logemail").css("border","2px solid #009975");

        $("#logemailmsg").html("<p class='text-success'>Email validated</p>");
      }else{

        $("#logemail").css("border","2px solid red");

        $("#logemailmsg").html("<p class='text-danger'>Email is not validated</p>");
      }
      buttonState();
    });
      $("#logpassword").keyup(function(){
      // check
      if(validatePass()){

        $("#logpassword").css("border","2px solid #009975");

        $("#pomsg").html("<p class='text-success'>Validated</p>");
      }else{

        $("#logpassword").css("border","2px solid red");

        $("#pomsg").html("<p class='text-danger'>Password not valid</p>");
      }
      buttonState();
    });
  });

  function buttonState(){
    if(validatePass() && valEmail()){

       $("#btn").prop('disabled', false);
    }else{

      $("#btn").prop('disabled', true);
    }
  }


  function valEmail(){
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    var em = $("#logemail").val();
    if (em.match(regex)) {
      return true;
    } else {
      return false;
    }
  }
  function validatePass(){
    var passw=$("#logpassword").val();

    if(passw.length > 7){
      return true;
    }else{
      return false;
    }

  }

</script>
       <?php include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'footer.php';   ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
