<?php
/**
*@author NestorM
*@version 29/09/2024
*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http_equiv="expires" content="Sat, 07 feb 2016 00:00:00 GMT">
    <title>Star Wars Game</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
        // Adding constants && functions
        include_once ('constants.inc.php');
        include_once ('functions1.inc.php');
        
        // Declaring variables
        $rebel_army = [];
        $empire_army = [];
        $victory = 0;


        // MAIN //
        //////////

        creation($rebel_army, $empire_army, $REBEL_SHIPS, $EMPIRE_SHIPS);

        echo '<table id = "table">';
        echo '    <tr class = "player" id = "rebels">';
            for ($i = 0; $i < 5; $i++) {
                echoInfo($rebel_army[$i]);
            }
        echo '    </tr>';
        echo '    <tr class = "results">';
            for ($i = 0; $i < 5; $i++) {
                echoWinner($rebel_army[$i],$empire_army[$i]);
            }
        echo '    </tr>';
        echo '    <tr class = "player" id = "empire">';
            for ($i = 0; $i < 5; $i++) {
                echoInfo($empire_army[$i]);
            }
        echo '    </tr>';

        echo '<h2>';
            $victory = war($rebel_army, $empire_army);

            if ($victory > 0){
                echo 'Rebels Won';
            } else if ($victory < 0) {
                echo 'Empire Won';
            } else {
                echo 'DRAW';
            }
        echo '</h2>'
    ?>
</body>
</html>