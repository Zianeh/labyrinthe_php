<?php include("php.php"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Labyrinthe</title>

    <link rel="stylesheet" href="assets/css/index.css">
    <style>
        body {
            background: rgb(87, 99, 89);
            background: linear-gradient(90deg, rgba(87, 99, 89, 0.9962578781512605) 0%, rgba(9, 55, 121, 1) 29%, rgba(196, 212, 24, 1) 100%);
            font-family: Arial, sans-serif;
        }

        .row {
            display: flex;
            justify-content: center;
            margin: auto;
        }


        .cell-wall,
        .cell-wall img {
            width: 40px;
            height: 40px;
            background-color: black;
            color: black;
        }

        .cell-black {
            width: 40px;
            height: 40px;
            filter: blur(1.5rem);
            background-color: green;


        }

        .cell-white {
            width: 40px;
            height: 40px;
            color: white;
            background-color: white;
        }

        .cell-red,
        .cell-red img {
            width: 40px;
            height: 40px;
            color: brown;
            background-color: brown;
            background-image: (url(/assets/image/chat.jpeg));
        }

        .cell-green {
            width: 40px;
            height: 40px;
            color: green;
            background-color: green;
        }

        img {
            width: 40px;
            height: 40px;
        }

        .up,
        .down {
            display: grid;
            justify-content: center;
            margin: auto;
        }

        .up,
        .down {
            display: flex;
            justify-content: center;
        }

        .up button,
        .down button {

            box-shadow: 0px 10px 14px -7px #3e7327;
            background: linear-gradient(to bottom, #77b55a 5%, #72b352 100%);
            background-color: #77b55a;
            border-radius: 4px;
            border: 1px solid #4b8f29;
            cursor: pointer;
            color: #ffffff;
            font-family: Arial;
            font-size: 13px;
            font-weight: bold;
            padding: 6px 12px;
            text-decoration: none;
            text-shadow: 0px 1px 0px #5b8a3c;
        }

        .leftright {
            display: flex;
            justify-content: center;
        }

        .leftright button {
            box-shadow: 0px 10px 14px -7px #3e7327;
            background: linear-gradient(to bottom, #77b55a 5%, #72b352 100%);
            background-color: #77b55a;
            border-radius: 4px;
            border: 1px solid #4b8f29;
            cursor: pointer;
            color: #ffffff;
            font-family: Arial;
            font-size: 13px;
            font-weight: bold;
            padding: 6px 12px;
            text-decoration: none;
            text-shadow: 0px 1px 0px #5b8a3c;
        }

        .divA{
       
            display: flex;
            justify-content: center;
            text-align: center;
        }

        a {
            border: 2px solid;
            background-color: green;
            padding: 5px;
            color: white;
            font-size: bold;
            width: 20%;
        }
    </style>
</head>

<body>

    <br><br>
    <br><br>
    <form method="POST">
        <div class="buttonSub">
            <div class="up">
                <button type="submit" name="direction" value="up">Haut</button>
            </div>
            <div class="leftright">
                <button type="submit" name="direction" value="left">Gauche</button>
                <button type="submit" name="direction" value="right">Droite</button>
            </div>
            <div class="down">
                <button type="submit" name="direction" value="down">Bas</button>
            </div>
        </div>

        <br><br>
    </form>

    <div class="divA" >
    <a href="./reset.php">Recommencer</a>
    </div>
</body>

</html>