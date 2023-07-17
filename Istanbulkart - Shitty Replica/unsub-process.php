<?php

$disable_sub = 0;

session_start();


$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

$result = $mysqli->query($sql);

$user = $result->fetch_assoc();


$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM card WHERE user_id = {$_SESSION["user_id"]}";

$result = $mysqli->query($sql);

$card = $result->fetch_assoc();


$check_sub = $card["is_subscription"];

if($check_sub == 0) {

    header("Location: already-unsub.html");
    exit;

}

if($check_sub == 1) {

    $cardNewSub = "UPDATE card SET is_subscription = $disable_sub WHERE user_id = {$_SESSION["user_id"]}";

    $stmt = $mysqli->prepare($cardNewSub);       

    $stmt->execute();

    header("Location: unsub-success.html");
    exit;

}


