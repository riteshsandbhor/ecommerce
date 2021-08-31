<?php 
    include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'dbconn.php';
    session_start();

    if(isset($_POST['btn'])){
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $repassword = mysqli_real_escape_string($con, $_POST['repassword']);
        $token = $_GET['token'];

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);


        if($uppercase  && $lowercase  && $number && strlen($password) > 6) {
            if($password == $repassword){
                $sql = mysqli_query($con, "SELECT * FROM forgetpassword WHERE token = '{$token}'");
                if(mysqli_num_rows($sql) > 0){
                    $fetch = mysqli_fetch_assoc($sql);
                    $id = $fetch['id'];
                    $sql2 = mysqli_query($con, "SELECT * FROM customer WHERE c_id = {$id}");
                    if(mysqli_num_rows($sql2) > 0){
                        $pass = password_hash($password,PASSWORD_DEFAULT);
                        $sql3 = mysqli_query($con, "UPDATE customer SET `c_password` = '{$pass}' WHERE c_id = {$id}");
                        if($sql3){
                            echo "<script type='text/javascript'>alert('password changed');
                                    window.location = 'home.php'</script>";
                        }else{
                            $_SESSION['status'] = "Something went wrong!!!";
                        }
                    }else{
                        $_SESSION['status'] = "Something went wrong!!";
                    }
                }else{
                    $_SESSION['status'] = "Something went wrong!";
                }
            }else{
                $_SESSION['status'] = "password doesn't match!";
            }
        }else{
            $_SESSION['status'] = "password should contain atleat one uppercase, one lowercase, one number and length should be greater than 6";
        }
        
    }
    if(isset($_GET['token'])){
        $token = $_GET['token'];
        $sql = mysqli_query($con, "SELECT * FROM forgetpassword WHERE token = '{$token}'");
        if(!mysqli_num_rows($sql) > 0){
            $_SESSION['status'] = "Something went wrong!";
            header("Location: home.php");
        }
    }else{
        $_SESSION['status'] = "Something went wrong!";
        header("Location: home.php");
    }  
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
      <?php
        if(isset($_SESSION['status'])) {
            ?>   
                <div class="row">
                    <div class="col">
                        <div class="error-text" style="display:block !important"><?php echo $_SESSION['status']; ?></div>
                    </div>
                </div>

            <?php
            unset($_SESSION['status']);
        }
    ?>
        <div class="form-group">
          <label for="password" style="float:left;"><strong><?php echo lang('new_pass'); ?></strong></label>
          <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo lang('enter_password'); ?>" required>
          <span id="emailmsg"></span>
        </div>
        <br/>
        <div class="form-group">
          <label for="repassword" style="float:left;"><strong><?php echo lang('re_enter_new_pass'); ?></strong></label>
          <input type="password" class="form-control" id="repassword" name="repassword" placeholder="<?php echo lang('re_enter_pass'); ?>" required>
          <span id="emailmsg"></span>
        </div>
        <br/>
        <input type="submit" id='btn' class="btn btngreen" name="btn" value=<?php echo lang('send')?>>
      </form><br/>
    </div>
  </div>
  <?php include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'footer.php';   ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</body>
</html>
