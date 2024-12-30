<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gameover</title>
    <style>
        body {
            background: rgb(87, 99, 89);
            background: linear-gradient(90deg, rgba(87, 99, 89, 0.9962578781512605) 0%, rgba(9, 55, 121, 1) 29%, rgba(196, 212, 24, 1) 100%);
        }

        h1 {
            font-size: 300%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }
        div a {
            border: 2px solid;
            background-color: brown;
            padding: 5px;
            color: white;
            font-size: bold;
            width: 40%;
        }

        div {
            margin-top: 400px;
            display: flex;
            justify-content: center;
            text-align: center;
        }
       
    </style>
</head>

<body>
    <h1> Partie terminée</h1>
    <div> <a href="./index.php"> Recommencer</a> </div>
</body>
</html>