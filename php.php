<?php
session_start();

if (!isset($_SESSION["labyrinthe"])) {
    $_SESSION["labyrinthe"] = generateRandomLabyrinth(11, 16);
    $_SESSION["player"] = [0, 0];
}
function generateRandomLabyrinth($rows, $cols)
{
    $labyrinth = array_fill(0, $rows, array_fill(0, $cols, "1"));

    // Générer un chemin garanti entre le début (0, 0) et une position aléatoire pour la souris
    $currentPosition = [0, 0];
    $labyrinth[0][0] = "C";
    $targetPosition = [rand(intval($rows / 2), $rows - 1), rand(intval($cols / 2), $cols - 1)];
    $labyrinth[$targetPosition[0]][$targetPosition[1]] = "S";

    // Utiliser une file pour créer un chemin garanti
    $queue = [[$currentPosition]];
    $visited = array_fill(0, $rows, array_fill(0, $cols, false));
    $visited[0][0] = true;
    $directions = [[0, 1], [1, 0], [0, -1], [-1, 0]];

    while (!empty($queue)) {
        $path = array_shift($queue);
        $currentPosition = end($path);
        if ($currentPosition == $targetPosition) {
            foreach ($path as $pos) {
                if ($labyrinth[$pos[0]][$pos[1]] !== "C" && $labyrinth[$pos[0]][$pos[1]] !== "S") {
                    $labyrinth[$pos[0]][$pos[1]] = "0";
                }
            }
            break;
        }
        shuffle($directions); // Mélanger les directions pour créer un chemin différent à chaque exécution
        foreach ($directions as $direction) {
            $newX = $currentPosition[0] + $direction[0];
            $newY = $currentPosition[1] + $direction[1];

            if ($newX >= 0 && $newX < $rows && $newY >= 0 && $newY < $cols && !$visited[$newX][$newY]) {
                $visited[$newX][$newY] = true;
                $newPath = $path;
                $newPath[] = [$newX, $newY];
                $queue[] = $newPath;
            }
        }
    }
    // Ajouter quelques murs aléatoires tout en gardant le chemin principal
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            if ($labyrinth[$i][$j] === "1" && rand(0, 1) === 0) {
                $labyrinth[$i][$j] = "0";
            }
        }
    }

    return $labyrinth;
}

function mooveCat($direction)
{
    $position = &$_SESSION["player"];
    $newPosition = $position;

    switch ($direction) {
        case 'up':
            $newPosition[0] = $position[0] - 1; 
            break;
        case 'down':
            $newPosition[0] = $position[0] + 1; 
            break;
        case 'left':
            $newPosition[1] = $position[1] - 1; 
            break;
        case 'right':
            $newPosition[1] = $position[1] + 1; 
            break;
    }

    $newX = $newPosition[0];
    $newY = $newPosition[1];
    if (isset($_SESSION["labyrinthe"][$newX][$newY]) && $_SESSION["labyrinthe"][$newX][$newY] !== "1") {
        if ($_SESSION["labyrinthe"][$newX][$newY] === "S") {
            header("location: gameover.php");
            exit();
        }

        $_SESSION["labyrinthe"][$position[0]][$position[1]] = "D"; 

        $_SESSION["labyrinthe"][$newX][$newY] = "C"; 
        $_SESSION["player"] = $newPosition; 
    } else {
        echo '<audio autoplay>
            <source src="collision.mp3" type="audio/mpeg">
          </audio>';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['direction'])) {
    mooveCat($_POST['direction']);
}

$grid = &$_SESSION["labyrinthe"];
$player = &$_SESSION["player"];

foreach ($grid as $x => $row) {
    echo "<div class='row'>";
    foreach ($row as $y => $cell) {
        $playerX = $player[0];
        $playerY = $player[1];

        $distanceManhattan = abs($x - $player[0]) + abs($y - $player[1]);
        $leJoueurEstProche = $distanceManhattan <= 1;
        
        if ($leJoueurEstProche || $cell === "D") {
            switch ($cell) {
                case "1":
                    echo "<div class='cell-wall'><img src='assets/image/brique2.jpg' alt='mur'></div>"; 
                    break;
                case "0":
                case "D":
                    echo "<div class='cell-white'></div>"; 
                    break;
                case "C":
                    echo "<div class='cell-red'><img src='assets/image/chat.jpeg' alt='Chat'></div>"; 
                    break;
                case "S":
                    echo "<div class='cell-green'><img src='assets/image/souris.jpg' alt='Souris'></div>"; 
                    break;
            }
        } else {
            echo "<div class='cell-black'></div>";
        }
    }
    echo "</div>";
}

?>


