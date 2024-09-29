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
        
        $SS_X_WING = ['name' => 'X-Wing', 
            'cannons' => 2, 
            'crew_min' => 1,
            'crew_max' => 2, 
            'speed_min' => 1,
            'speed_max' => 10,
            'image' => 'assets/X-Wing.png'];

        $SS_BTL_WING_BOMBER = ['name' => 'BTL-Wing-Bomber', 
            'cannons' => 3, 
           'crew_min' => 1,
            'crew_max' => 4, 
            'speed_min' => 1,
            'speed_max' => 6,
            'image' => 'assets/BTL-Wing-Bomber.png'];

        $SS_YT_SPACECRAFT = ['name' => 'YT-Spacecraft', 
            'cannons' => 5, 
            'crew_min' => 1,
            'crew_max' => 10, 
            'speed_min' => 1,
            'speed_max' => 4,
            'image' => 'assets/YT-Spacecraft.png'];

        $SS_MILLENIUM_FALCON = ['name' => 'Millenium-Falcon', 
            'cannons' => 5, 
            'crew_min' => 1,
            'crew_max' => 6, 
            'speed_min' => 1,
            'speed_max' => 10,
            'image' => 'assets/Millenium-Falcon.png'];
        
        $REBEL_SHIPS = [$SS_X_WING,$SS_BTL_WING_BOMBER,$SS_YT_SPACECRAFT,$SS_MILLENIUM_FALCON];

        
        $SS_TIE_FIGHTER = ['name' => 'TIE-Fighter', 
            'cannons' => 2, 
            'crew_min' => 1,
            'crew_max' => 2, 
            'speed_min' => 1,
            'speed_max' => 8,
            'image' => 'assets/TIE-Fighter.png'];

        $SS_BFF_BULK_FREIGHTER = ['name' => 'BFF-Bulk-Freighter', 
            'cannons' => 3, 
            'crew_min' => 1,
            'crew_max' => 4, 
            'speed_min' => 1,
            'speed_max' => 6,
            'image' => 'assets/BFF-Bulk-Freighter.png'];

        $SS_ASSAULT_SHIP = ['name' => 'Assault-Ship', 
            'cannons' => 3, 
            'crew_min' => 1,
            'crew_max' => 20, 
            'speed_min' => 1,
            'speed_max' => 2,
            'image' => 'assets/Assault-Ship.png'];

        $EMPIRE_SHIPS = [$SS_TIE_FIGHTER, $SS_BFF_BULK_FREIGHTER, $SS_ASSAULT_SHIP];
            
            $rebel_army = [];
            $empire_army = [];
            $victory = 0;

            /**
             * Calculate damage
             * @return int Indicates the damage;
             */
            function damage($spaceship) {
                return min($spaceship['crew'],($spaceship['cannons'])*$spaceship['speed']);
            }

            function assignCrewSpeed (&$spaceship) {
                $spaceship['crew'] = rand($spaceship['crew_min'],$spaceship['crew_max']);
                $spaceship['speed'] = rand($spaceship['speed_min'],$spaceship['speed_max']);
            }
            function creation(&$rebel_army, &$empire_army, $REBEL_SHIPS, $EMPIRE_SHIPS): void {
                for ($i=0; $i<5; $i++){
                    $rebel_army[$i] = $REBEL_SHIPS[rand(0,count($REBEL_SHIPS)-1)];
                    assignCrewSpeed($rebel_army[$i]);
                    $empire_army[$i] = $EMPIRE_SHIPS[rand(0,count($EMPIRE_SHIPS)-1)];
                    assignCrewSpeed($empire_army[$i]);
                }
            }

            /**
             * This handles the combat
             * @param mixed $rebel_army
             * @param mixed $empire_army
             * @return int Result of war (>0 = Rebels won / <0 Empire won / 0 Draw)
             */
            function war($rebel_army, $empire_army): int {
                $victory_count = 0;

                    for ($i= 0; $i< 5; $i++) {
                        $victory_count += combat($rebel_army[$i],$empire_army[$i]);
                    }
                    
                return $victory_count;
            }
            
            function combat($rebel_spaceship, $empire_spaceship):int {

                if ((damage($rebel_spaceship)) > damage($empire_spaceship)) {
                    $result = 1;
                } else if ((damage($rebel_spaceship)) < damage($empire_spaceship)) {
                    $result = -1;
                } else {
                    $result = 0;
                }

                return $result;
            }

            /**
             * Prints Spaceship info on Screen
             * 
             */ 
            function echoInfo($spaceship): void {
                echo 'Cannons: '.$spaceship['cannons'].'<br>';
                echo 'Crew: '.$spaceship['crew'].'<br>';
                echo 'Speed: '.$spaceship['speed'].'<br>';
                echo 'Damage: '.damage($spaceship).'<br>';
                echo '<img src = "'.$spaceship['image'].'" alt="Image of '.$spaceship['name'].'">';
            }

            function echoWinner($rebel_spaceship, $empire_spaceship): string {
                $text = "";
                if (combat($rebel_spaceship, $empire_spaceship) == 1) {
                    $text = 'Rebels Victory';
                } else if (combat($rebel_spaceship, $empire_spaceship) == -1) {
                    $text = 'Empire Victory';
                } else {
                    $text = "It's a Draw";
                }
                return $text;
            }

            // MAIN
            creation($rebel_army, $empire_army, $REBEL_SHIPS, $EMPIRE_SHIPS);

    ?>

    <table id = "table">
        <tr class = "player" id ="rebels">
            <td>
                <?php
                echoInfo($rebel_army[0]);
                ?>
            </td>

            <td>
                <?php
                echoInfo($rebel_army[1]);
                ?>
            </td>
           
            <td>
                <?php
                echoInfo($rebel_army[2]);
                ?>
            </td>

            <td>
                <?php
                echoInfo($rebel_army[3]);
                ?>
            </td>

            <td>
                <?php
                echoInfo($rebel_army[4]);
                ?>
            </td>
        </tr>
        <tr class = "results">
            <td>
                <?php
                    echo echoWinner($rebel_army[0],$empire_army[0]);
                ?>
            </td>

            <td>
                <?php
                    echo echoWinner($rebel_army[1],$empire_army[1]);
                ?>
            </td>

            <td>
                <?php
                    echo echoWinner($rebel_army[2],$empire_army[2]);
                ?>
            </td>

            <td>
                <?php
                    echo echoWinner($rebel_army[3],$empire_army[3]);
                ?>
            </td>

            <td>
                <?php
                    echo echoWinner($rebel_army[4],$empire_army[4]);
                ?>
            </td>
        </tr>
        <tr class = "player" id = "empire">
            <td>
                <?php
                echoInfo($empire_army[0]);
                ?>
            </td>

            <td>
                <?php
                echoInfo($empire_army[1]);
                ?>
            </td>

            <td>
                <?php
                echoInfo($empire_army[2]);
                ?>
            </td>

            <td>
                <?php
                echoInfo($empire_army[3]);
                ?>
            </td>

            <td>
                <?php
                echoInfo($empire_army[4]);
                ?>
            </td>
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