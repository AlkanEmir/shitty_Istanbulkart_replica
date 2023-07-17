<?php

if (empty($_POST["name"])) {
    die("Name is required.");
}

if (empty($_POST["id_number"])) {
    die("ID number is required.");
}

if (empty($_POST["age"])) {
    die("Age is required.");
}

if (empty($_POST["password"])) {
    die("Password is required.");
}

if (empty($_POST["password_confirm"])) {
    die("Password Rep is required.");
}

if ($_POST["password"] !== $_POST["password_confirm"]) {
    die("Passwords must match.");
}

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, age, id, password)
        VALUES (?,?,?,?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error" . $mysqli->error);
}

$stmt->bind_param("siis", $_POST["name"], $_POST["age"], $_POST["id_number"], $_POST["password"]);

if($stmt->execute()) {
    
    header("Location: signup_true.html");
    exit;

}    

