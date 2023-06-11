<?php

require("../include/header.php");
require("../app/app.php");

if(isset($_SESSION['username'])) {
    echo "<script>window.location.href='".ROOT."'</script>";
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
        $credentialErrorChecker = new CredentialErrorChecker();
        $errorcredentials = $credentialErrorChecker->checkErrorCredentials($email, $password);
        $accountStatusChecker = new AccountStatusChecker();
        $erroractive = $accountStatusChecker->checkAccountStatus($email);
    }

    $sql = "SELECT * FROM register WHERE email= :email";
    $smt = $dba->prepare($sql);
    $smt->bindParam('email', $email);
    $smt->execute();
    $fetch = $smt->fetch(PDO::FETCH_ASSOC);


    if(empty($erroremail) && empty($errorpassword) && empty($errorcredentials) && empty($erroractive)) {
        $_SESSION['username'] = $fetch['username'];
        $_SESSION['id'] = $fetch['id'];
        echo "<script>window.location.href='".ROOT."'</script>";
    }
}
$viewRenderer = new ViewRenderer();
$viewRenderer->view('login');
