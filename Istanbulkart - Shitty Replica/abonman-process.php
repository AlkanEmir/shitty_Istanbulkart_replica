<?php

$enable_sub = 1;
$default_sub_balance = 200;


session_start();

session_regenerate_id();


$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

$result = $mysqli->query($sql);

$user = $result->fetch_assoc();


$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM card WHERE user_id = {$_SESSION["user_id"]}";

$result = $mysqli->query($sql);

$card = $result->fetch_assoc();




$check_sub = $card["is_subscription"];


if($check_sub == 1){

    header("Location: already-sub.html");
    exit;

}

if($check_sub == 0) {

    $cardNewSub = "UPDATE card SET is_subscription = $enable_sub WHERE user_id = {$_SESSION["user_id"]}";

    $stmt = $mysqli->prepare($cardNewSub);       

    $stmt->execute();

    $cardNewSub = "UPDATE card SET sub_balance = $default_sub_balance WHERE user_id = {$_SESSION["user_id"]}";

    $stmt = $mysqli->prepare($cardNewSub);       

    $stmt->execute();

    header("Location: sub-success.html");
    exit;

}


