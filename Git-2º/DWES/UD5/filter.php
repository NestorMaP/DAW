<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtered Info</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
    <h1>Video Games DB</h1>
    <?php
        include('./db_vars.inc.php');
        if(
            !isset($_GET['release_year']) && 
            !isset($_GET['platform_name']) &&
            !isset($_GET['genre_name']) &&
            !isset($_GET['publisher_name'])
        ) {
            echo 'There is no data specified.';
            exit;
        }

        try {
            
            $connection = new PDO($DSN, $USER, $PASS, $OPTIONS);

            //Changing the result according on what the user clicked
            if (isset($_GET['release_year'])) {
                $release_year = $_GET['release_year'];
                $result = $connection->prepare($YEAR_QUERY);
                $result->bindParam(':release_year', $release_year, PDO::PARAM_INT);
                $result->execute();
                // ECHOES
                echo "<h2>Year: $release_year</h2>";
                include ('print_game.inc.php');
            }
            if (isset($_GET['platform_name'])) {
                // Connection for the description
                $platform_name = $_GET['platform_name'];
                $result = $connection->prepare($PLATFORM_QUERY);
                $result->bindParam(':platform_name', $platform_name, PDO::PARAM_STR);
                $result->execute();
                // ECHOES
                echo "<h2>Platform: $platform_name</h2>";
                include ('print_platform.inc.php');

                // Connection for the games
                $result = $connection->prepare($PLATFORM_QUERY);
                $result->bindParam(':platform_name', $platform_name, PDO::PARAM_STR);
                $result->execute();
                // ECHOES
                include ('print_game.inc.php');
            }
            if (isset($_GET['genre_name'])) {
                $genre_name = $_GET['genre_name'];
                $result = $connection->prepare($GENRE_QUERY);
                $result->bindParam(':genre_name', $genre_name, PDO::PARAM_STR);
                $result->execute();
                // ECHOES
                echo "<h2>Genre: $genre_name</h2>";
                include ('print_game.inc.php');
            }
            if (isset($_GET['publisher_name'])) {
                $publisher_name = $_GET['publisher_name'];
                $result = $connection->prepare($PUBLISHER_QUERY);
                $result->bindParam(':publisher_name', $publisher_name, PDO::PARAM_STR);
                $result->execute();
                // ECHOES
                echo "<h2>Publisher: $publisher_name</h2>";
                include ('print_game.inc.php');
            }

        } catch (PDOException $e) {
            echo 'Connection failure: '. $e->getMessage();
        } finally {
            if ($connection !== null) {
                $connection = null;
            }
        }

    ?>
</body>
</html>