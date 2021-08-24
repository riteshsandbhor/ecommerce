<?php 
   include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'dbconn.php';
   session_start();
   
   $receiver =  mysqli_real_escape_string($con, $_POST['email']);
   $id =  (int) mysqli_real_escape_string($con, $_POST['id']);

   if(!empty($receiver) && !empty($id)){
       $sql = mysqli_query($con, "SELECT * FROM customer WHERE c_id = {$id}");
       $fetch = mysqli_fetch_assoc($sql);
        $subject = "Email Test via PHP using Localhost";
        $body = "Hi, {$fetch['f_name']} {$fetch['l_name']}...This is a test email send from Localhost.";
        $sender = "From:test843333@gmail.com";
        if(mail($receiver, $subject, $body, $sender)){
            echo "Email sent successfully to $receiver";
        }else{
            echo "Sorry, failed while sending mail!";
        }
    //    $sql = mysqli_query($con, "UPDATE customer SET c_email = '{$email}' WHERE c_id = {$id}");

   }else{
    echo "error";
   }
?>