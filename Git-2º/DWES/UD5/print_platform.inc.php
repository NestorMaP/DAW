<?php
    $counter = 1; // Add game number at the beginning
    
    // ECHOES
    $game = $result->fetchObject();
        echo '<div class="game">';
            echo "<h3 class='game_title'>$game->platform_name</h3>";
            echo "<p class='game_description'>
                $game->platform_description // 
            </p>";
        echo '</div>';