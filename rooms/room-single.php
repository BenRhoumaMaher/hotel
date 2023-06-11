<?php

require("../include/header.php");
require("../app/app.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM hotel.rooms WHERE status = 1 and id= $id";
    $smt = $dba->prepare($sql);
    $smt->execute();
    $singleroom = $smt->fetch(PDO::FETCH_OBJ);

    $sql = "SELECT * FROM hotel.utilities WHERE room_id= $id";
    $smt = $dba->prepare($sql);
    $smt->execute();
    $utilities = $smt->fetchAll(PDO::FETCH_OBJ);



    $requestHandler = new RequestHandler();
    if($requestHandler->isPost()) {

        $stringDefender = new StringDefender();
        $email = $stringDefender->defend($_POST['email']);
        $name = $stringDefender->defend($_POST['name']);
        $phone = $stringDefender->defend($_POST['phone']);
        $in = date_create($stringDefender->defend($_POST['in']));
        $out = date_create($stringDefender->defend($_POST['out']));
        $hotel_name = $singleroom->hotel_name;
        $room_name = $singleroom->name;
        $user_id = $_SESSION['id'];
        $status = "Pending";
        $payment = $singleroom->price;
        $days = date_diff($in, $out);

        $_SESSION['price'] = $singleroom->price * intval($days->format('%R%a'));

        $errorChecker = new ErrorChecker();
        $erroremail = $errorChecker->checkError($email, "Email", "email");
        $errorname = $errorChecker->checkError($name, "Name", "string");
        $errorphone = $errorChecker->checkError($phone, "Phone", "integer");
        $errorin = $errorChecker->checkError($in, "Date in", "date");
        $errorout = $errorChecker->checkError($out, "Date out", "date");

        if(empty($errorin) || empty($errorout)) {
            $dateChecker = new DateChecker();
            $errorcheckdate = $dateChecker->errorCheckDate($in, $out);
        }

        $sql = "SELECT * FROM register WHERE email= :email";
        $smt = $dba->prepare($sql);
        $smt->bindParam('email', $email);
        $smt->execute();
        $fetch = $smt->fetch(PDO::FETCH_ASSOC);
        $row = $smt->rowCount();


        if(empty($erroremail) && empty($errorname) && empty($errorphone) && empty($errorin) && empty($errorout)
        && empty($errorcheckdate) && empty($errorcheckdatevalid)) {
            $sql = "INSERT INTO bookings(check_in,check_out,email,phone,name,hotel,room,status,payment,user_id) 
    VALUES(:check_in,:check_out,:email,:phone,:name,:hotel,:room,:status,:payment,:user_id)";
            $smt = $dba->prepare($sql);
            $smt->bindParam("check_in", $_POST['in']);
            $smt->bindParam("check_out", $_POST['out']);
            $smt->bindParam("email", $email);
            $smt->bindParam("phone", $phone);
            $smt->bindParam("name", $name);
            $smt->bindParam("hotel", $hotel_name);
            $smt->bindParam("room", $room_name);
            $smt->bindParam("status", $status);
            $smt->bindParam("payment", $_SESSION['price']);
            $smt->bindParam("user_id", $user_id);
            $smt->execute();
            if($smt) {
                echo"<script>window.location.href = 'pay.php'</script>";
            }
        }
    }
    $viewRenderer = new ViewRenderer();
    $viewRenderer->view('room-single');
} else {
    echo"<script>window.location.href = '".ROOT."/404.php'</script>";
}