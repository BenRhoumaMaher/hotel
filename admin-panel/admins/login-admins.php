<?php

require "../layouts/header.php";
require "../../app/app.php";

if(isset($_SESSION['name'])) {
    echo "<script>window.location.href='".ADMIN_PATH."'</script>";
}

$requestHandler = new RequestHandler();
if($requestHandler->isPost()) {

    $stringDefender = new StringDefender();
    $email = $stringDefender->defend($_POST['email']);
    $password = $stringDefender->defend($_POST['password']);

    $errorChecker = new ErrorChecker();
    $erroremail = $errorChecker->checkError($email, "Email", "email");
    $errorpassword = $errorChecker->checkError($password, "Password", "password");

    if(empty($erroremail) && empty($errorpassword)) {
        $adminCredentialErrorChecker = new AdminCredentialErrorChecker();
        $errorcredentialsadmin = $adminCredentialErrorChecker->checkErrorAdminCredentials($email, $password);
    }

    $sql = "SELECT * FROM admins WHERE email= :email";
    $smt = $dba->prepare($sql);
    $smt->bindParam('email', $email);
    $smt->execute();
    $fetch = $smt->fetch(PDO::FETCH_ASSOC);
    $row = $smt->rowCount();


    if(empty($erroremail) && empty($errorpassword) && empty($errorcredentialsadmin)) {
        $_SESSION['name'] = $fetch['name'];
        echo "<script>window.location.href='".ADMIN_PATH."'</script>";
    }
}

$view = new View();
$view->viewadmin('login-admins');
