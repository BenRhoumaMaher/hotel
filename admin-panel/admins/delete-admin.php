<?php

require "../layouts/header.php";
require "../../app/app.php";
error_reporting(0);

if(!isset($_SESSION['name'])) {
    echo "<script>window.location.href='".ADMIN_PATH."/admins/login-admins.php'</script>";
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM admins WHERE id = '$id'";

    $smt = $dba->prepare($sql);
    $smt->execute();

    if($smt) {
        $_SESSION["message"] = "Admin has been deleted !";
        echo"<script>window.location.href = '".ADMIN_PATH."/admins/admins.php'</script>";
    }
}