<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Game</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
    <h1>Video Games DB</h1>
    <?php
        include('./db_vars.inc.php');

        if(!isset($_GET['id'])) {
            echo 'There is no Game ID specified.';
            exit;
        }

        $game_id = $_GET['id'];

        try {
            $connection = new PDO($DSN, $USER, $PASS, $OPTIONS);
            
            $result = $connection->prepare($GAME_QUERY);
            $result->bindParam(':id', $game_id, PDO::PARAM_INT);
            $result->execute();
            $game = $result->fetchObject();
            if($game_id == $game->id) {
                // ECHOES
                echo "<h2>Inserted Game: $game->game_name</h2>";
                echo '<div class="game">';
                echo "<h3>$game->id. $game->game_name</h3>";
                echo "<p>Release year: $game->release_year.</p>";
                echo "<p>Platform: $game->platform_name.</p>";
                echo "<p>Genre: $game->genre_name.</p>";
                echo "<p>Publisher: $game->publisher_name.</p>";
                echo "<p>Sales: Not specified.</p>";
                echo "<p>Region: Not specified.</p>";
                echo '</div>';
                }
                echo '<button><a href="./index.php">Back</a></button>';
        } catch (PDOException $e) {
            echo 'Connection failure: '. $e->getMessage();
        } finally {
            if ($connection !== null) {
                $connection = null;
            }
        }

    ?>