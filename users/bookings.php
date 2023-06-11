<?php

require "../include/header.php";
require("../app/app.php");

if(!isset($_SESSION['username'])) {
    echo "<script>window.location.href = '".ROOT."'</script>";
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    if($_SESSION['id'] != $id) {
        echo "<script>window.location.href = '".ROOT."'</script>";
    }

    $sql = "SELECT * FROM hotel.bookings WHERE user_id= $id";
    $smt = $dba->prepare($sql);
    $smt->execute();
    $bookings = $smt->fetchAll(PDO::FETCH_OBJ);
} else {
    echo"<script>window.location.href = '".ROOT."/404.php'</script>";
}

$viewRenderer = new ViewRenderer();
$viewRenderer->view('bookings');
