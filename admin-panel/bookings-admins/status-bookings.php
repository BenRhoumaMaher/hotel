<?php

require "../layouts/header.php";
require "../../app/app.php";

if(!isset($_SESSION['name'])) {
    echo "<script>window.location.href='".ADMIN_PATH."/admins/login-admins.php'</script>";
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $requestHandler = new RequestHandler();
    if($requestHandler->isPost()) {

        $status = $_POST['status'];

        $sql = "UPDATE bookings set status = :status where id = $id";
        $smt = $dba->prepare($sql);
        $smt->bindParam("status", $status);
        $smt->execute();
        if($smt) {
            header("location: http://localhost/hotel/admin-panel/bookings-admins/show-bookings.php");
        }
    }
}



$view = new View();
$view->viewadmin('status_booking');
