<?php
    //// FUNCTIONS ////
    ///////////////////

   /**
    * Calculates damage
    * @return int Damage
    */
    function damage($spaceship) {
        return min($spaceship['crew'], ($spaceship['cannons'])*$spaceship['speed']);
    }

    /**
     * Handles the assignation of speed and crews to each created spaceship
     * @param mixed $spaceship
     * @return void
     */
    function assignCrewSpeed (&$spaceship) {
        $spaceship['crew'] = rand($spaceship('crew_min'),$spaceship['crew_max']);
        $spaceship['speed'] = rand($spaceship['speed_min'],$spaceship['speed_max']);
    }

    /**
     * Creates 5 random spaceships for each band
     * @param mixed $rebel_army
     * @param mixed $empire_army
     * @param mixed $REBEL_SHIPS
     * @param mixed $EMPIRE_SHIPS
     * @return void
     */
    function creation (&$rebel_army, &$empire_army, $REBEL_SHIPS, $EMPIRE_SHIPS): void {
        for ($i=0; $i<5; $i++) {
            $rebel_army[$i] = $REBEL_SHIPS[rand(0,count($REBEL_SHIPS)-1)];
            assignCrewSpeed($rebel_army[$i]);
            $empire_army[$i] = $EMPIRE_SHIPS[rand(0,count($EMPIRE_SHIPS)-1)];
            assignCrewSpeed($empire_army[$i]);
        }
    }

    /**
     * Handles each individual combat
     * @param mixed $rebel_spaceship
     * @param mixed $empire_spaceship
     * @return int Result of combat (1=Rebels won // -1=Empire won // 0=Draw)
     */
    function combat($rebel_spaceship,$empire_spaceship): int {
        if ((damage($rebel_spaceship)) > damage($empire_spaceship)) {
            return 1;
        } else if ((damage($rebel_spaceship))< damage($empire_spaceship)) {
            return -1;
        } else {
            return 0;
        }
    }

    /**
     * Handles the results of the different combats
     * @param mixed $rebel_army
     * @param mixed $empire_army
     * @return int Result of war (>0 = Rebels won // <0 = Empire won // 0 Draw)
     */

     function war($rebel_army, $empire_army):int{
        $rebel_victory_count = 0;
        for ($i=0; $i<5; $i++) {
            $rebel_victory_count += combat($rebel_army[$i],$empire_army[$i]);
        }
        return $rebel_victory_count;
     }


         // PRINT FUNCTIONS

    /**
     * Prints Spaceship info on Screen
     * 
     */ 
    function echoInfo($spaceship): void {
        echo '<td>';
        echo 'Cannons: '.$spaceship['cannons'].'<br>';
        echo 'Crew: '.$spaceship['crew'].'<br>';
        echo 'Speed: '.$spaceship['speed'].'<br>';
        echo 'Damage: '.damage($spaceship).'<br>';
        echo '<img src = "'.$spaceship['image'].'" alt="Image of '.$spaceship['name'].'">';
        echo '</td>';
    }

    function echoWinner($rebel_spaceship, $empire_spaceship): void {
        echo '<td>';
        $text = "";
        if (combat($rebel_spaceship, $empire_spaceship) == 1) {
            $text = 'Rebels Victory';
        } else if (combat($rebel_spaceship, $empire_spaceship) == -1) {
            $text = 'Empire Victory';
        } else {
            $text = "It's a Draw";
        }
        echo $text;
    }
?>