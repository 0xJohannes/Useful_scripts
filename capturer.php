<?php
require './PHPMailer/PHPMailerAutoload.php';
    if ($_SERVER['REQUEST_METHOD']==="POST"){
        if(isset($_POST["alarm"])){
            file_put_contents("yourlink",$_POST["alarm"]." -- POST --"."\n",FILE_APPEND);
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'smtp.provider.com';
            $mail->Port = 587; 
            $mail->SMTPSecure = 'tls'; 
            $mail->SMTPAuth = true; 
            $mail->Username = "youremail"; 
            $mail->Password = "yourpass"; 
            $mail->setFrom('mail', 'ALARM'); 
            $mail->addAddress('mail', 'AlARM'); 
            $mail->Subject = 'ALARM'; 
            $mail->Body = $_POST["alarm"];
            if ($mail->send()) {
                exit(0);
            }
        }
?>
