<?php

require "../layouts/header.php";
require "../../app/app.php";

if(!isset($_SESSION['name'])) {
    echo "<script>
window.location.href = '".ADMIN_PATH."/admins/login-admins.php'
</script>";
}

$sql = "SELECT * FROM rooms";
$smt = $dba->prepare($sql);
$smt->execute();
$show_rooms = $smt->fetchAll(PDO::FETCH_OBJ);




$view = new View();
$view->viewadmin('show-rooms');
