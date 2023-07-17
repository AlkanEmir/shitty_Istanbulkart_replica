<?php

session_start();

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM card";

$result = $mysqli->query($sql);

$card = $result->fetch_assoc();

$new_balance = $card["balance"] + $_POST["deposit_amount"];

$cardNew = "UPDATE card SET balance = $new_balance WHERE card_id = {$_POST["card_id"]}";

$stmt = $mysqli->prepare($cardNew);

$stmt->execute();

header("Location: cards.php");
exit;