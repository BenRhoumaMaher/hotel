<?php

require "../layouts/header.php";
require "../../app/app.php";

if(!isset($_SESSION['name'])) {
    echo "<script>window.location.href='".ADMIN_PATH."/admins/login-admins.php'</script>";
}

$requestHandler = new RequestHandler();
if($requestHandler->isPost()) {

    $stringDefender = new StringDefender();
    $name = $stringDefender->defend($_POST['name']);
    $description = $stringDefender->defend($_POST['description']);
    $location = $stringDefender->defend($_POST['location']);
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    $dir = "images/" . basename($image);

    $errorChecker = new ErrorChecker();
    $error_name = $errorChecker->checkError($name, "HOTEL_NAME", "string");
    $error_description = $errorChecker->checkError($description, "Description", "string");
    $error_location = $errorChecker->checkError($location, "Location", "string");


    if(empty($error_name) && empty($error_description) && empty($error_location)) {
        $sql = "INSERT INTO hotels(name,image,description,location) VALUES(:name,:image,:description,:location)";
        $smt = $dba->prepare($sql);
        $smt->bindParam("name", $name);
        $smt->bindParam("image", $image);
        $smt->bindParam("description", $description);
        $smt->bindParam("location", $location);
        $smt->execute();

        if(move_uploaded_file($tmp, $dir)) {
            $_SESSION["message"] = "Hotel has been added !";
            header("location: show-hotels.php");
        }

    }
}



$view = new View();
$view->viewadmin('create-hotels');
