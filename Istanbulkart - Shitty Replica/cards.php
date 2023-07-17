<?php

session_start();
session_regenerate_id();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM card WHERE user_id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $card = $result->fetch_assoc();

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cards</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
            *{
                
                margin: 0;
                padding: 0;
                box-sizing: border-box;

            }

            body{

                min-height: 80vh;
                display: flex;
                font-family: sans-serif;

            }

            .container{

                margin: auto;
                width: 500px;
                height: 500px;
                max-height: 90%;
                max-width: 90%;
                width: 40%;
                height: 40%;
                padding: 40px;
                background: white;
                border-radius: 16px;
                box-shadow: 0 8px 16px rgba(0,0,0,.3);
                
            }

            .container h1{

                text-align: center;
                margin-bottom: 20px;
                width: 100%;
                padding: 7px;
                background: lightblue;
                border-radius: 16px;
                box-shadow: 0 8px 16px rgba(0,0,0,.3);

            }

            .subclass{

                position: relative;
                text-align: center;
                margin-top: 20px;
                margin-bottom: 30px;
                width: 40%;
                left: 30%;
                padding: 7px;
                background: lightblue;
                border-radius: 16px;
                box-shadow: 0 8px 16px rgba(0,0,0,.3);

            }

            .addcard{

                position: absolute;
                text-align: center;
                margin-top: 20px;
                margin-bottom: 20px;
                width: 10%;
                top: 58%;
                left: 39%;
                padding: 7px;
                background: lightgrey;
                border-radius: 16px;
                box-shadow: 0 8px 16px rgba(0,0,0,.3);

            }

            .deposit{

                position: absolute;
                text-align: center;
                margin-top: 20px;
                margin-bottom: 20px;
                width: 10%;
                top: 58%;
                left: 50%;
                padding: 7px;
                background: lightgrey;
                border-radius: 16px;
                box-shadow: 0 8px 16px rgba(0,0,0,.3);

            }

            .sub {

                position: absolute;
                text-align: center;
                margin-bottom: 20px;
                width: 40%;
                left: 30%;
                top: 68%;
                padding: 7px;
                background: white;
                border-radius: 16px;
                box-shadow: 0 8px 16px rgba(0,0,0,.3);

            }

            .back {

                position: absolute;
                text-align: center;
                margin-top: 20px;
                margin-bottom: 20px;
                width: 10%;
                top: 90%;
                left: 44%;
                padding: 7px;
                background: lightgrey;
                border-radius: 16px;
                box-shadow: 0 8px 16px rgba(0,0,0,.3);

            }

        </style>

    </head>
    <body style="background: url(background1.jpeg);
                 background-size: cover;
                 background-repeat: no-repeat;">


        <div class="container">

        <h1>Cards</h1>

        <?php if (isset($card)): ?>

            

            <?php if ($card["is_student"] == 1 && $card["is_subscription"] != 1): ?>

                <div class="subclass">

                <h2>Information</h2>
                <p> Student Card </p>
                <p> Card ID: <?= htmlspecialchars($card["card_id"]) ?> </p>
                <p> Balance: <?= htmlspecialchars($card["balance"]) ?>₺ </p>

                </div>


            
            <?php elseif ($card["is_elder"] <= 25 && $card["is_subscription"] != 1): ?>

                <div class="subclass">

                <h2>Information</h2>
                <p> Student Card </p>
                <p> Card ID: <?= htmlspecialchars($card["card_id"]) ?> </p>
                <p> Balance: <?= htmlspecialchars($card["balance"]) ?>₺ </p>

                </div>

   

            <?php elseif ($card["is_elder"] >= 65): ?>

                <div class="subclass"> 
                
                <h2>Information</h2>
                <p> Elderly Card </p>
                <p> Card ID: <?= htmlspecialchars($card["card_id"]) ?> </p>

                </div>    



            <?php elseif ($card["is_veteran"] == 1): ?>

                <div class="subclass">

                <h2>Information</h2>
                <p> Veteran Card </p>
                <p> Card ID: <?= htmlspecialchars($card["card_id"]) ?> </p>

                </div>                    



            <?php elseif ($card["is_disabled"] == 1): ?>

                <div class="subclass">

                <h2>Information</h2>
                <p> Disability Card </p>
                <p> Card ID: <?= htmlspecialchars($card["card_id"]) ?> </p> 

                </div>

                
   

            <?php elseif ($card["is_subscription"] == 1 && ($card["is_student"] != 1 && $card["is_elder"] > 25)): ?>

                <div class="subclass"> 
            
                <h2>Information</h2>
                <p> Standard Abonman Card </p>
                <p> Card ID: <?= htmlspecialchars($card["card_id"]) ?> </p> 
                <p> Abonman Balance: <?= htmlspecialchars($card["sub_balance"]) ?> </p> 

                </div>



            <?php elseif ($card["is_subscription"] == 1 && ($card["is_student"] == 1 || $card["is_elder"] <= 25)): ?>

                <div class="subclass">
            
                <h2>Information</h2>
                <p> Student Abonman Card </p>
                <p> Card ID: <?= htmlspecialchars($card["card_id"]) ?> </p> 
                <p> Abonman Balance: <?= htmlspecialchars($card["sub_balance"]) ?> </p>   

                </div>



            <?php else: ?>

                <div class="subclass">
            
                <h2>Information</h2>
                <p> Standard Card </p>
                <p> Card ID: <?= htmlspecialchars($card["card_id"]) ?> </p>
                <p> Balance: <?= htmlspecialchars($card["balance"]) ?>₺</p>
                
                </div>

            <?php endif; ?> 

        <?php endif; ?>  

        <p class="addcard"><a style="text-decoration: none" href="card-form.html"> Add Card </a></p>

        <p class="deposit"><a style="text-decoration: none" href="deposit.html"> Deposit </a></p>

        <div class="sub">

        <h1>Subscription</h1>
        <p>You can create an <a style="text-decoration: none" href="abonman-info.html"> Abonman</a> by clicking <a style="text-decoration: none" href="abonman-process.php"> here</a>.</p>
        <p>You can un-subscribe by clicking <a style="text-decoration: none" href="unsub-process.php"> here</a>.</p>

        </div>

        <p class="back"><a style="text-decoration: none" href="indexMine.php"> Home Page</a></p>

        </div>

    </body>

</head>
