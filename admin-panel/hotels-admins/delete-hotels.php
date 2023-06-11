<?php

require "../layouts/header.php";
require "../../app/app.php";
error_reporting(0);

if(!isset($_SESSION['name'])) {
    echo "<script>window.location.href='".ADMIN_PATH."/admins/login-admins.php'</script>";
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $getImage = "SELECT * from hotels where id = $id";
    $smtimage = $dba->prepare($getImage);
    $smtimage->execute();
    $fetch = $smtimage->fetch(PDO::FETCH_OBJ);

    unlink("images/" . $fetch->image);

    $sql = "DELETE FROM hotels WHERE id = '$id'";

    $smt = $dba->prepare($sql);
    $smt->execute();

    if($smt) {
        $_SESSION["message"] = "Hotel has been deleted !";
        echo"<script>window.location.href = '".ADMIN_PATH."/hotels-admins/show-hotels.php'</script>";
    }
}
