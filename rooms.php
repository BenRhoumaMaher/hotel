<?php

require("include/header.php");
require("app/app.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM hotel.rooms WHERE hotel_id= $id";
    $smt = $dba->prepare($sql);
    $smt->execute();
    $room = $smt->fetchAll(PDO::FETCH_OBJ);


} else {
    echo"<script>window.location.href = '".ROOT."/404.php'</script>";
}

$viewRenderer = new ViewRenderer();
$viewRenderer->view('rooms');
