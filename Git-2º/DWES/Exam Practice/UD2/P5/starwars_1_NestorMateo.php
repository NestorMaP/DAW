<?php
/**
*@author NestorM
*@version 29/09/2024
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Wars Game</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
        // Adding constants and functions
        include_once ('constants.inc.php');
        include_once ('functions1.inc.php');

        // Declaring variables
        $rebel_army = [];
        $empire_army = [];
        $victory = 0;

        // MAIN //
        //////////

        creation($rebel_army, $empire_army, $REBEL_SHIPS, $EMPIRE_SHIPS);
    ?>
    <table id="table">
        <tr class="player" id="rebels">
            <?php
                for ($i=0; $i<5; $i++) {
                    echoInfo($rebel_army[$i]);
                }
            ?>
        </tr>
        <tr class="results">
            <?php
                for ($i=0; $i<5; $i++) {
                    echoWinner($rebel_army[$i], $empirearmy[$i]);
                }
            ?>
        </tr>
        <tr class="player" id="empire">
            <?php
                for ($i=0; $i<5; $i++) {
                    echoInfo($empire_army[$i]);
                }
            ?>
        </tr>
    </table>
    <h2>
        <?php
            $victory = war($rebel_army, $empire_army);

            if ($victory > 0){
                echo 'Rebels Won';
            } else if ($victory < 0) {
                echo 'Empire Won';
            } else {
                echo 'DRAW';
            }
        ?>
    </h2>
    
</body>
</html>