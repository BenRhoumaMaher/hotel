<?php

require("include/header.php");
require("app/app.php");


$requestHandler = new RequestHandler();
if($requestHandler->isPost()) {

    $stringDefender = new StringDefender();
    $name = $stringDefender->defend($_POST['name']);
    $email = $stringDefender->defend($_POST['email']);
    $subject = $stringDefender->defend($_POST['subject']);
    $message = $stringDefender->defend($_POST['message']);

    $errorChecker = new ErrorChecker();
    $errorname = $errorChecker->checkError($name, "NAME", "string");
    $error_email = $errorChecker->checkError($email, "EMAIL", "string");
    $error_subject = $errorChecker->checkError($subject, "subject", "string");
    $error_message = $errorChecker->checkError($message, "message", "string");


    if(empty($errorname) && empty($error_email) && empty($error_subject) && empty($error_message)) {
        $sql = "INSERT INTO contact(name,email,subject,message) VALUES(:name,:email,:subject,:message)";
        $smt = $dba->prepare($sql);
        $smt->bindParam("name", $name);
        $smt->bindParam("email", $email);
        $smt->bindParam("subject", $subject);
        $smt->bindParam("message", $message);
        $smt->execute();

        if($smt) {
            $body = $message;
            $email_to = "maherbenrhoumaaa@gmail.com";
            $email_from = $email;
            $sender_name = $name;
            require('../PHPMailer/PHPMailerAutoload.php');
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "maherbenrhoumaa@gmail.com";
            $mail->Password = "************";
            $mail->Port = 25;
            $mail->IsHTML(true);
            $mail->From = $email_from;
            $mail->FromName = $sender_name;
            $mail->Sender = $email_from; // indicates ReturnPath header
            $mail->AddReplyTo($email_from, "No Reply"); // indicates ReplyTo headers
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AddAddress($email_to);

            if($mail->send()) {
                $_SESSION["message"] = "Your message was sent, thank you!";
            }
        }

    }



}



$viewRenderer = new ViewRenderer();
$viewRenderer->view('contact');
