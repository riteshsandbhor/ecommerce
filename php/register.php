<?php
session_start();
if (isset($_SESSION['Custid'])) {
  header("Location: ./home.php");
}
 ?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Sign up</title>
<link rel="icon" href="../images/circle.png">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/cards.css">
</head>

<body>
  <?php
    include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'header.php';
   ?><br><br>
   <p class="languages"><a href="?lang=english">English</a> | <a href="?lang=marathi">मराठी</a> | <a href="?lang=hindi">हिन्दी</a></p>
   <br><br>
<div class="card regcard">
  <h3 class="cardhead"><?php echo lang('sign_up') ;?></h3>
  <form action="./verify.php" method="post">
  <br>
  <div class="row">
      <div class="col-sm-6">
         <div class="form-group">
             <input type="text" class="form-control" name="fname" id="firstname" placeholder=<?php echo lang('fname') ;?> required>
             <span id="fnamemsg"></span>
         </div>
      </div>
      <div class="col-sm-6">
         <div class="form-group">
             <input type="text" class="form-control" name="lname" id="lastname" placeholder=<?php echo lang('lname') ;?> required>
             <span id="lnamemsg"></span>
         </div>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-6">
         <div class="form-group">
             <input type="email" class="form-control" name="email" id="email" placeholder=<?php echo lang('email') ;?> required>
              <span id="emmsg"></span>
         </div>
      </div>
      <div class="col-sm-6">
         <div class="form-group">
             <input type="text" class="form-control" name="pincode" id="pin" placeholder=<?php echo lang('pin') ;?> required>
             <span id="pinmsg"></span>
         </div>
      </div>
  </div>
  <div class="form-group">
    <textarea class="form-control" name="address" placeholder=<?php echo lang('delivery') ;?> id="add" rows="2" columns="10" required></textarea>
    <span id="addmsg"></span>
  </div>
  <div class="form-group">
             <input type="password" class="form-control" name="password" id="pass" placeholder=<?php echo lang('enter_password')?>  required>
             <span id="passMsg"></span>
  </div>
  <div class="form-group">
             <input type="password" class="form-control" name="repassword" id="pass1" placeholder=<?php echo lang('re_enter_pass')?> required>
             <span id="pass1Msg"></span>
  </div>
  <input type="button" style="width:210px;" class="btn btn3" onclick="getLocation()"value=<?php echo lang('get_location')?> />
  <br>
  <small>Allow Location Access On Your Device</small><br>
  <small>For each entry get new location.</small>
  <p id="demo" ></p>
  <input type="hidden" id="lat" name="lat" />
  <input type="hidden" id="long" name="long" />
  <span id="getloc" class="text-danger" style="font-weight: 700"></span>

  <button class="btn btngreen" type="submit"name="register" id="btn"><?php echo lang('REGISTER')?></button>
  </form>
</div>

<br><br>

<script>
   var x = document.getElementById("demo");

   function getLocation() {
     if (navigator.geolocation) {
       navigator.geolocation.getCurrentPosition(showPosition);
          document.getElementById('getloc').innerHTML ="";
     } else {
       x.innerHTML = "Geolocation is not supported by this browser.";
          document.getElementById('getloc').innerHTML ="";
     }
   }

   function showPosition(position) {
     x.innerHTML = "Latitude: " + position.coords.latitude +
     "<br>Longitude: " + position.coords.longitude;
     document.getElementById("lat").value =position.coords.latitude ;
       document.getElementById("long").value =position.coords.longitude ;
          document.getElementById('getloc').innerHTML ="";
   }
</script>
<script type="text/javascript">

  $(document).ready(function(){

    $("#btn").prop('disabled', true);

    $("#pass").keyup(function(){

      if(validatePassword()){

        $("#pass").css("border","2px solid #009975");

        $("#passMsg").html("<p class='text-success'>Password validated</p>");
      }else{

        $("#pass").css("border","2px solid red");

        $("#passMsg").html("<p class='text-danger'>Minimum 8 characters<br>One Number <br> One Uppercase letter<br> One Lowercase letter mandatory</p>");
      }
      buttonState();
    });
      $("#pass1").keyup(function(){
      // check
      if(validatePassword1()){

        $("#pass1").css("border","2px solid #009975");

        $("#pass1Msg").html("<p class='text-success'>Password matched</p>");
      }else{

        $("#pass1").css("border","2px solid red");

        $("#pass1Msg").html("<p class='text-danger'>Password not matched</p>");
      }
      buttonState();
    });
      $("#firstname").keyup(function(){
      // check
      if(valFirstname()){

        $("#fname").css("border","2px solid #009975");

        $("#fnamemsg").html("<p class='text-success'>Good to Go</p>");
      }else{

        $("#fname").css("border","2px solid red");

        $("#fnamemsg").html("<p class='text-danger'>Name required</p>");
      }
      buttonState();
    });
       $("#lastname").keyup(function(){
      // check
      if(valLastname()){

        $("#lname").css("border","2px solid #009975");

        $("#lnamemsg").html("<p class='text-success'>Good to Go</p>");
      }else{

        $("#lname").css("border","2px solid red");

        $("#lnamemsg").html("<p class='text-danger'>Name required</p>");
      }
      buttonState();
    });
    //     $("#mobile").keyup(function(){
    //   // check
    //   if(valMobile()){
    //
    //     $("#mobile").css("border","2px solid #009975");
    //
    //     $("#mobmsg").html("<p class='text-success'>Validated</p>");
    //   }else{
    //
    //     $("#mobile").css("border","2px solid red");
    //
    //     $("#mobmsg").html("<p class='text-danger'>Must be 10 digits</p>");
    //   }
    //   buttonState();
    // });
          $("#pin").keyup(function(){
      // check
      if(valPincode()){

        $("#pin").css("border","2px solid #009975");

        $("#pinmsg").html("<p class='text-success'>Pincode Validated</p>");
      }else{

        $("#pin").css("border","2px solid red");

        $("#pinmsg").html("<p class='text-danger'>Enter pincode</p>");
      }
      buttonState();
    });
          $("#email").keyup(function(){
      // check
      if(valEmail()){

        $("#email").css("border","2px solid #009975");

        $("#emmsg").html("<p class='text-success'>Email Validated</p>");
      }else{

        $("#email").css("border","2px solid red");

        $("#emmsg").html("<p class='text-danger'>Not in email format</p>");
      }
      buttonState();
    });
           $("#add").keyup(function(){
      // check
      if(valAddress()){

        $("#add").css("border","2px solid #009975");

        $("#addmsg").html("<p class='text-success'>Address validated</p>");
      }else{

        $("#add").css("border","2px solid red");

        $("#addmsg").html("<p class='text-danger'>Enter Address</p>");
      }
      buttonState();
    });
  });

  function buttonState(){
    if(validatePassword() && validatePassword1() && valFirstname() && valLastname() &&  valPincode() &&  valEmail() && valAddress()){

      $("#btn").prop('disabled', false);
    }else{

      $("#btn").prop('disabled', true);
    }
  }

  function validatePassword(){

    var pass=$("#pass").val();
    var upper_text= new RegExp('[A-Z]');
    var lower_text= new RegExp('[a-z]');
    var number_check=new RegExp('[0-9]');


    if(pass.length > 7 && pass.match(upper_text) && pass.match(lower_text) && pass.match(number_check)){
      return true;
    }else{
      return false;
    }

  }
  function validatePassword1(){

    var pass=$("#pass").val();
    var conpass=$("#pass1").val();

    if(conpass == pass){
      return true;
    }else{
      return false;
    }

  }
  function valFirstname(){

    var fname=$("#firstname").val();
    var number_check=new RegExp('[0-9]');
    var lower_text= new RegExp('[a-z]');
    var upper_text= new RegExp('[A-Z]');

    if(fname.match(lower_text) || fname.match(upper_text)){
      return true;
    }else{
      return false;
    }

  }
   function valLastname(){

    var lname=$("#lastname").val();
    var number_check=new RegExp('[0-9]');
    var lower_text= new RegExp('[a-z]');
    var upper_text= new RegExp('[A-Z]');

    if(lname.match(lower_text) || lname.match(upper_text)){
      return true;
    }else{
      return false;
    }
}

  /*function valMobile(){
    var number_check=new RegExp('[0-9]');
    var mob=$("#mobile").val();
    if(mob.match(number_check) && mob.length==10){
      return true;
    }  else{
      return false;
    }
  }*/

   function valPincode(){
    var number_check=new RegExp('[0-9]');
    var pin=$("#pin").val();
    if(pin.match(number_check)){
      return true;
    }  else{
      return false;
    }
  }
  function valEmail(){
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    var em=$("#email").val();
    if(em.match(regex)){
      return true;
    }  else{
      return false;
    }
  }
   function valAddress(){
    var number_check=new RegExp('[0-9]');
    var add=$("#add").val();
    var lower_text= new RegExp('[a-z]');
    var upper_text= new RegExp('[A-Z]');
    if(add.match(number_check) || add.match(lower_text) || add.match(upper_text)){
      return true;
    }  else{
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
