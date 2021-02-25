<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Guessing The Game</title>
    </head>
    <style>
    body {
    font-family: josefin sans;
    }
    </style>
    <body>
        <h1>
        Welcome to my Guessing Game
        </h1>
        <p>
            <?php
            if(! isset($_GET['guess'])) {
                echo "Missing Parameter ! ";
            } elseif (strlen($_GET['guess']) < 1) {
                echo "Guess is too short.";
            } elseif (! is_numeric($_GET['guess'])) {
                echo "Guess is not a number ! ";
            } elseif ($_GET['guess'] > 42) {
                echo "Guess is too high.";
            } elseif ($_GET['guess'] < 42) {
                echo "Guess is too low.";
            } else {
                echo "You're absolutely correct :) ";
            }
            ?>
        </p>
    </body>
</html>