<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

}

?>


<!DOCTYPE html>
<html>

    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            *{
                
                margin: 0;
                padding: 0;
                box-sizing: border-box;

            }

            body{

                min-height: 90vh;
                display: flex;
                font-family: sans-serif;

            }

            .container{

                margin: auto;
                width: 500px;
                max-width: 90%;
                width: 30%;
                height: 350px;
                max-height: 90%;
                padding: 50px;
                background: white;
                border-radius: 16px;
                box-shadow: 0 8px 16px rgba(0,0,0,.3);
                
            }

            .container form{

                width: 100%;
                height: 35%;
                padding: 50px;
                background: white;
                border-radius: 16px;
                box-shadow: 0 8px 16px rgba(0,0,0,.3);

            }

            .container h1{

                text-align: center;
                margin-bottom: 70px;
                width: 100%;
                padding: 7px;
                background: lightblue;
                border-radius: 16px;
                box-shadow: 0 8px 16px rgba(0,0,0,.3);

            }

            .container .form-control{

                width: 100%;
                height: 70px;
                background: lightgrey;
                text-align: center;
                margin: 10px 0 18px 0;

            }

            .container .form-group{

                width: 100%;
                height: 10  0px;
                background: lightblue;
                margin: 10px 0 18px 0;
                padding: 0 10px;
                text-align: center;
                border-radius: 16px;
                box-shadow: 0 8px 16px rgba(0,0,0,.3);

            }

            .logsign{

                position: absolute;
                text-align: center;
                margin-top: 20px;
                margin-bottom: 20px;
                width: 10%;
                top: 45%;
                left: 45%;
                padding: 7px;
                background: lightblue;
                border-radius: 16px;
                box-shadow: 0 8px 16px rgba(0,0,0,.3);

            }

            .mycards{

                position: absolute;
                text-align: center;
                margin-top: 20px;
                margin-bottom: 20px;
                width: 10%;
                top: 53%;
                left: 39%;
                padding: 7px;
                background: lightgrey;
                border-radius: 16px;
                box-shadow: 0 8px 16px rgba(0,0,0,.3);

            }

            .logout {

                position: absolute;
                text-align: center;
                margin-top: 20px;
                margin-bottom: 20px;
                width: 10%;
                top: 53%;
                left: 51%;
                padding: 7px;
                background: lightgrey;
                border-radius: 16px;
                box-shadow: 0 8px 16px rgba(0,0,0,.3);

            }

            .welcome {

                position: absolute;
                text-align: center;
                margin-top: 20px;
                margin-bottom: 40px;
                width: 24.8%;
                top: 37%;
                padding: 8px;
                background: lightblue;
                border-radius: 16px;
                box-shadow: 0 8px 16px rgba(0,0,0,.3);

            }

        </style>
    </head>

    <body style="background: url(background1.jpeg);
                 background-size: cover;
                 background-repeat: no-repeat;">

    <div class="container">

        <h1>IstanbulKart</h1>        

        <?php if (isset($user)): ?>

            <div class="welcome">

            <p1> Welcome <?= htmlspecialchars($user["name"]) ?>. </p>

            </div>

        <?php else: ?>

                <p class="logsign"><a style="text-decoration: none" href="login.html" > Log in</a> or <a style="text-decoration: none" href="signup.html">Sign up</a></p>

        <?php endif; ?>

        <?php if (isset($user)): ?>

            <div class="form-group">

            <h2>Information</h2>

                <p> ID: <?= htmlspecialchars($user["id"]) ?> </p>
                <p> Name: <?= htmlspecialchars($user["name"]) ?> </p>
                <p> Age: <?= htmlspecialchars($user["age"]) ?> </p>

            </div>

        <?php endif; ?>    

        <?php if (isset($user)): ?>


            <h2 class="mycards"><a style="text-decoration: none" href="cards.php" >My Cards</a></h2>

            <h2 class="logout"><a style="text-decoration: none" href= "logout.php">Log Out</a></h2>


        <?php endif; ?>    

    </div>

    </body>

</html>