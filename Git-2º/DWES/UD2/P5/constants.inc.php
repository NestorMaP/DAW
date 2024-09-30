<?php
    /**
     * This file includes all the ships and armys with their constant values
     */
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
?>