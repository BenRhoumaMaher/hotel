<?php

require "../layouts/header.php";
require "../../app/app.php";

if(!isset($_SESSION['name'])) {
    echo "<script>window.location.href='".ADMIN_PATH."/admins/login-admins.php'</script>";
}
$requestHandler = new RequestHandler();
if($requestHandler->isPost()) {

    $stringDefender = new StringDefender();
    $email = $stringDefender->defend($_POST['email']);
    $name = $stringDefender->defend($_POST['name']);
    $password = $stringDefender->defend($_POST['password']);
    $hash = $stringDefender->defend($password);

    $errorChecker = new ErrorChecker();
    $error_name = $errorChecker->checkError($name, "USERNAME", "string");
    $error_email = $errorChecker->checkError($email, "EMAIL", "email");
    $error_password = $errorChecker->checkError($password, "PASSWORD", "password");
    $adminEmailExistChecker = new AdminEmailExistChecker();
    $error_exist = $adminEmailExistChecker->emailExistAdmin($email);


    if(empty($error_name) && empty($error_password) && empty($error_email) && empty($error_exist)) {
        $sql = "INSERT INTO admins(name,email,password) VALUES(:name,:email,:password)";
        $smt = $dba->prepare($sql);
        $smt->bindParam("name", $name);
        $smt->bindParam("email", $email);
        $smt->bindParam("password", $hash);
        $smt->execute();

        if($smt) {
            $_SESSION["message"] = "Admin has been added !";
            header("location: admins.php");
        }

    }
}
$view = new View();
$view->viewadmin('create-admin');
