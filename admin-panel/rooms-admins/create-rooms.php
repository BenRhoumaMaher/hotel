<?php

require "../layouts/header.php";
require "../../app/app.php";
error_reporting(0);

$sql = "SELECT * FROM hotels";
$smt = $dba->prepare($sql);
$smt->execute();
$show_hotels = $smt->fetchAll(PDO::FETCH_OBJ);

if(!isset($_SESSION['name'])) {
    echo "<script>
  window.location.href = '".ADMIN_PATH."/admins/login-admins.php'
  </script>";
}

$requestHandler = new RequestHandler();
if($requestHandler->isPost()) {

    $stringDefender = new StringDefender();
    $name = $stringDefender->defend($_POST['name']);
    $price = $stringDefender->defend($_POST['price']);
    $num_persons = $stringDefender->defend($_POST['num_persons']);
    $num_beds = $stringDefender->defend($_POST['num_beds']);
    $size = $stringDefender->defend($_POST['size']);
    $view = $stringDefender->defend($_POST['view']);
    $hotel = $stringDefender->defend($_POST['hotel']);
    $hotel_id = $stringDefender->defend($_POST['hotel_id']);
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    $dir = "images/" . basename($image);

    $errorChecker = new ErrorChecker();
    $error_name = $errorChecker->checkError($name, "ROOM_NAME", "string");
    $error_price = $errorChecker->checkError($price, "Price", "integer");
    $error_persons = $errorChecker->checkError($num_persons, "Num_PERSONS", "integer");
    $error_beds = $errorChecker->checkError($num_beds, "Num_beds", "integer");
    $error_size = $errorChecker->checkError($size, "size", "integer");
    $error_view = $errorChecker->checkError($view, "View", "string");


    if(empty($error_name) && empty($error_price) && empty($error_persons) && empty($error_beds)
    && empty($error_size) && empty($error_view)) {
        $sql = "INSERT INTO rooms(name,image,price,num_persons,size,view,num_beds,hotel_id,hotel_name) VALUES(:name,:image,:price,:num_persons,:size,:view,:num_beds,:hotel_id,:hotel_name)";
        $smt = $dba->prepare($sql);
        $smt->bindParam("name", $name);
        $smt->bindParam("image", $image);
        $smt->bindParam("price", $price);
        $smt->bindParam("num_persons", $num_persons);
        $smt->bindParam("size", $size);
        $smt->bindParam("view", $view);
        $smt->bindParam("num_beds", $num_beds);
        $smt->bindParam("hotel_id", $hotel_id);
        $smt->bindParam("hotel_name", $hotel);
        $smt->execute();

        if(move_uploaded_file($tmp, $dir)) {
            $_SESSION["message"] = "Room has been added !";
            header("location: show-rooms.php");
        }

    }
}

$view = new View();
$view->viewadmin('create-room');