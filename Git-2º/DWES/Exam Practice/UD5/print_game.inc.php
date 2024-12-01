<?php
    $counter = 1; // Add game number at the beginning

    // ECHOES
    while ($game = $result->fetchObject()) {
        echo '<div class="game">';
            echo "<h3 class='game_title'>$counter. $game->game_name</h3>";
            echo "<p class='game_description'>
                Release year: $game->release_year // 
                Platform: $game->platform_name //
                Genre: $game->genre_name //
                Publisher: $game->publisher_name
            </p>";
        echo '</div>';
        $counter++;
    }
    echo '<button><a href="./index.php">Back</a></button>';