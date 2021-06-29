<?php


spl_autoload_register(function ($class) {
    require 'classes/' . $class . '.php';
});

$player1 = new Warrior('Cloud');
$player2 = new Archer('Legolas');
//$player2 = new Magician('Vivi');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baston</title>
</head>
<body>

    <?php while ($player1->isAlive() && $player2->isAlive()): ?>
        <div>
            <p><?= $player1->turn($player2);
            $result = "$player1->name a gagné !" ?></p>
            <?php if ($player2->isAlive()): ?>
                <p><?= $player2->turn($player1); 
                $result = "$player2->name a gagné !" ?>
            <?php endif ?>
        </div>
    <?php endwhile ?>
<p><?= $result ?></p>
    
</body>
</html>