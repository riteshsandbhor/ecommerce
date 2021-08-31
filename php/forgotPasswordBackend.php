<?php
    include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'dbconn.php';
    session_start();

    $email = $_POST['email'];
    if(!empty($email)) {

        $sql = "SELECT * FROM customer WHERE c_email='$email'";
        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $name = $row['f_name']." ".$row['l_name'];
            $id = $row['c_id'];
            $token = md5($email).rand(10,9999);
            $link = "<a class='btn btn-primary' href='https://www.mahalaxmivegetables.com/php/createPassword.php"."?token=".$token."'><br>CLICK HERE</a>";
            $subject = "Forget Password";
            $body = "Hi, {$name},\nClick on the below link to verify your email\n".$link;

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";
            $headers .= 'From: test843333@gmail.com '. "\r\n";
            $sql2 = mysqli_query($con, "SELECT * FROM forgetpassword WHERE id = {$id}");
            if(!mysqli_num_rows($sql2) > 0){
                $sql3 = mysqli_query($con, "INSERT forgetpassword (id, token) VALUES({$id}, '{$token}')");
            }else{
                $sql3 = mysqli_query($con, "UPDATE forgetpassword SET token = '{$token}' WHERE id = {$id}");
            }
            if(mail($email, $subject, $body, $headers)){
                echo "success";
            }else{
                echo "something went wrong";
            }
        }
        else {
            echo "something went wrong";
        }
    }else{
        echo "Enter Email";
    }

?>