<!DOCTYPE html>
<html>
    <head>
        <title>Add Card</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    </head>
    <body>

        <h1>Add Card</h1>

        <form action="process-card.php" method="post">

            <div>
                <label for="is_student">Are you a Student? if yes 1</label>
                <input type="tel" id="is_student" name="is_student">
            </div>

            <div>
                <label for="is_elder">Age</label>
                <input type="tel" id="is_elder" name="is_elder">
            </div>

            <div>
                <label for="is_veteran">Are you a Veteran? if yes 1 no 5</label>
                <input type="tel" id="is_veteran" name="is_veteran">
            </div>

            <div>
                <label for="card_id">test card id</label>
                <input type="tel" id="card_id" name="card_id">
            </div>

            <div>
                <label for="balance">test balance</label>
                <input type="tel" id="balance" name="balance">
            </div>

            <button>Add Card</button>

        </form>

    </body>
</html>