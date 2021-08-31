<?php
    include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'dbconn.php';
    session_start();

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $number = mysqli_real_escape_string($con, $_POST['number']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $msg = mysqli_real_escape_string($con, $_POST['info']);
    
    
    if(!empty($name) && !empty($id) && !empty($email) && !empty($number) && !empty($subject) && !empty($msg)){
        $sql = mysqli_query($con, "INSERT INTO contact (`id`, `name`, `email`, `number`, `subject`, `message`) VALUES({$id}, '{$name}', '{$email}', '{$number}', '{$subject}', '{$msg}')");
        if($sql){
            echo "success";
        }else{
            echo "Something went wrong";
        }
    }else{
        echo "Something went wrong!";
    }
?>