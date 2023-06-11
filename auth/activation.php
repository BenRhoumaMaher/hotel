<?php

require("../app/app.php");
session_start();
$token = $_GET["token"];
if(isset($token)) {
    $sql = "UPDATE hotel.register SET status  = 'ON' WHERE token = ?";
    $smt = $dba->prepare($sql);
    $smt->bindParam("token", $token);
    $smt->execute([$token]);
    if($smt) {
        $_SESSION["message"] = "your account is activated";
        header("location: login.php");
    }
}
