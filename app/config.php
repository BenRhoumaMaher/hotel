<?php


$localhost = "localhost";
$user = "root";
$db = "hotel";
$password = "";

$dbc = "mysql:host=$localhost;dbname=$db;charset:UTF8";

try {
    $dba = new PDO($dbc, $user, $password);
    $dba-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die($e->getMessage());
}
