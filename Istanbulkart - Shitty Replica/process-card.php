<?php

$balance_deafult = 0;

$min = pow(10, 15);
$max = pow(10, 16) - 1;

$randomNumber = random_int($min, $max);

session_start();

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

$result = $mysqli->query($sql);

$user = $result->fetch_assoc();

$age = $user["age"];

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO card (card_id, is_student, is_elder, is_veteran, is_disabled, balance, user_id)
        VALUES (?,?,?,?,?,?,?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error" . $mysqli->error);
}

$stmt->bind_param("iiiiiii", $randomNumber, $_POST["is_student"], $age, $_POST["is_veteran"], $_POST["is_disabled"], $balance_deafult, $_SESSION["user_id"]);

if($stmt->execute()) {
        
    header("Location: cards.php");
    exit;

}   



