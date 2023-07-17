<?php

$is_logged = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM user
                    WHERE id = '%s'" ,
                    $_POST["id_number"]);

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if($user) {

        if($_POST["password_login"] === $user["password"]) {

            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];

            header("Location: indexMine.php");
            exit;

        }

        else {

            header("Location: indexMine.php");
            exit;

        }

    }

    $is_logged = true;

}

?>