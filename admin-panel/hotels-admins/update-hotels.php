<?php

require "../layouts/header.php";
require "../../app/app.php";


if(!isset($_SESSION['name'])) {
    echo "<script>window.location.href='".ADMIN_PATH."/admins/login-admins.php'</script>";
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM hotels WHERE id = '$id'";
    $smt = $dba->prepare($sql);
    $smt->execute();
    $up_hotels = $smt->fetch(PDO::FETCH_OBJ);

    $requestHandler = new RequestHandler();
    if($requestHandler->isPost()) {

        $stringDefender = new StringDefender();
        $name = $stringDefender->defend($_POST['name']);
        $description = $stringDefender->defend($_POST['description']);
        $location = $stringDefender->defend($_POST['location']);

        $errorChecker = new ErrorChecker();
        $error_name = $errorChecker->checkError($name, "HOTEL_NAME", "string");
        $error_description = $errorChecker->checkError($description, "Description", "string");
        $error_location = $errorChecker->checkError($location, "Location", "string");


        if(empty($error_name) && empty($error_description) && empty($error_location)) {
            $sql = "UPDATE hotels set 
  name = :name, description = :description, location = :location where id =$id";
            $smt = $dba->prepare($sql);
            $smt->bindParam("name", $name);
            $smt->bindParam("description", $description);
            $smt->bindParam("location", $location);
            $smt->execute();

            if($smt) {
                $_SESSION["message"] = "Hotel has been updated !";
                header('Location: http://localhost/hotel/admin-panel/hotels-admins/show-hotels.php');
            }
        }
    }
}


$view = new View();
$view->viewadmin('update-hotel');
