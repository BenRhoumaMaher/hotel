<?php

require("include/header.php");
require("app/app.php");

$sql = "SELECT * FROM hotel.hotels WHERE status= 1";
$smt = $dba->prepare($sql);
$smt->execute();
$fetch = $smt->fetchAll(PDO::FETCH_OBJ);

$sql = "SELECT * FROM hotel.rooms WHERE status= 1";
$smt = $dba->prepare($sql);
$smt->execute();
$rooms = $smt->fetchAll(PDO::FETCH_OBJ);

$viewRenderer = new ViewRenderer();
$viewRenderer->view('index');
