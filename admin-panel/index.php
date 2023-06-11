<?php

require "layouts/header.php";
require "../app/app.php";

if (!isset($_SESSION['name'])) {
    echo "<script>window.location.href='".ADMIN_PATH."admins/login-admins.php'</script>";
}
$hotel = "SELECT COUNT(*) AS hotels FROM hotel.hotels";
$smt = $dba->prepare($hotel);
$smt->execute();
$hotels = $smt->fetch(PDO::FETCH_OBJ);

$sql = "SELECT COUNT(*) AS rooms FROM hotel.rooms";
$smt = $dba->prepare($sql);
$smt->execute();
$rooms = $smt->fetch(PDO::FETCH_OBJ);

$sql = "SELECT COUNT(*) AS admins FROM hotel.admins";
$smt = $dba->prepare($sql);
$smt->execute();
$admins_count = $smt->fetch(PDO::FETCH_OBJ);

$sql = "SELECT COUNT(*) AS bookings FROM hotel.bookings";
$smt = $dba->prepare($sql);
$smt->execute();
$booking_count = $smt->fetch(PDO::FETCH_OBJ);

$view = new View();
$view->viewadmin('index');
