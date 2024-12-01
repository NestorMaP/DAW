<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Games DB</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <h1>Video Games DB</h1>
    <h2>Home Page</h2>
    <div id="addGameDiv">
        <a href="insert.php" id="addGame">Add Video Game</a>
    </div>

    <?php
        include ('db_vars.inc.php');

        //MAIN
        try {
            $connection = new PDO($DSN, $USER, $PASS, $OPTIONS);
            $result = $connection->query($MAIN_QUERY);

            // ECHOES
            while ($game = $result->fetchObject()) {
                echo '<div class="game">';
                    echo "<h3 class='game_title'><a href='game.php?id={$game->id}'>$game->id. $game->game_name</a></h3>";
                    echo "<p class='game_description'>
                        Release year: <a href='filter.php?release_year={$game->release_year}'>$game->release_year</a> // 
                        Platform: <a href='filter.php?platform_name={$game->platform_name}'>$game->platform_name</a> //
                        Genre: <a href='filter.php?genre_name={$game->genre_name}'>$game->genre_name</a> //
                        Publisher: <a href='filter.php?publisher_name={$game->publisher_name}'>$game->publisher_name</a>
                        </p>";
                    echo '<a href="delete.php?id='.$game->id.'"><img src="/assets/trash.png" alt="trash_icon">';
                echo '</div>';
            }
        } catch (PDOException $e) {
            print 'Connection failure: '.$e->getMessage();
        }
    ?>
</body>
</html>