<?php


require("../include/header.php");
require("../app/app.php");

if(isset($_SESSION['username'])) {
    echo "<script>window.location.href='".ROOT."'</script>";
}

$requestHandler = new RequestHandler();
if($requestHandler->isPost()) {

    $stringDefender = new StringDefender();
    $username = $stringDefender->defend($_POST['username']);
    $email = $stringDefender->defend($_POST['email']);
    $password = $stringDefender->defend($_POST['password']);
    $passwordEncrypter = new PasswordEncrypter();
    $hash = $passwordEncrypter->encrypt($password);
    $token = bin2hex(openssl_random_pseudo_bytes(30));

    $errorChecker = new ErrorChecker();
    $error_username = $errorChecker->checkError($username, "USERNAME", "string");
    $error_email = $errorChecker->checkError($email, "EMAIL", "email");
    $error_password = $errorChecker->checkError($password, "PASSWORD", "password");
    if(empty($error_email)) {
        $emailExistChecker = new EmailExistChecker();
        $error_exist = $emailExistChecker->emailExist($email);
    }


    if(empty($error_username) && empty($error_password) && empty($error_email) && empty($error_exist)) {
        $sql = "INSERT INTO register(username,email,password,token, status) VALUES(:username,:email,:password, :token, 'OFF')";
        $smt = $dba->prepare($sql);
        $smt->bindParam("username", $username);
        $smt->bindParam("email", $email);
        $smt->bindParam("password", $hash);
        $smt->bindParam("token", $token);
        $smt->execute();

        if($smt) {
            $subject = "Registration for ".$email;
            $body = "Thank you for your registration " .$username . "<br>" ." Here's your link of activation : http://localhost/hotel/auth/activation.php?token=" .$token;
            $email_to = $email;
            $email_from = "maherbenrhoumaa@gmail.com";
            $sender_name = "Maher's Hotel";
            require('../PHPMailer/PHPMailerAutoload.php');
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "maherbenrhoumaa@gmail.com";
            $mail->Password = "***************";
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
                $_SESSION["message"] = "Check your email for activation link";
                header("location: ../index.php");
            }
        }

    }



}
$viewRenderer = new ViewRenderer();
$viewRenderer->view('register');
