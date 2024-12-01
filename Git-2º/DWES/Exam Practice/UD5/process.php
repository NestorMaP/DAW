<?php
    include('db_vars.inc.php');

    $errors = [];
    $currentYear = date('Y');
    //1958 -> First Videogame
    $release_year_regexp = '/^(195[8-9]|19[6-9][0-9]|20[0-2][0-9]|202[0-'.$currentYear.'])$/';
    $game_name_regexp = '/^.{1,200}$/';
    $publisher_name_regexp = '/^.{1,100}$/';

    // MAIN
    // Check if the form has been sent
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $connection = new PDO($DSN,$USER,$PASS,$OPTIONS);

            // Transaction beginning
            $connection->beginTransaction();
            
            // VALIDATE FORM DATA
                // Validate Release year
                $release_year = clean_input($_POST['release_year']);
                if (!preg_match($release_year_regexp,$release_year)) {
                    $errors['release_year'] = 'From 1952 to '.$currentYear;
                }

                // Assign platform
                $platform_name = clean_input($_POST['platform_name']);
                // Get auto-generated ID from platform
                $result = $connection->prepare($PLATFORM_LIST_ID);
                $result->bindParam(':platform_name', $platform_name);
                $result->execute();
                $platform_id = $result->fetchObject()->id;

                // Validate Name
                $game_name = clean_input($_POST['game_name']);
                if (!preg_match($game_name_regexp,$game_name)) {
                    $errors['game_name'] = 'Less than 200 characters.';
                }

                // Assign genre (NAME & ID)
                $genre_name = clean_input($_POST['genre_name']);
                // Get auto-generated ID from genre
                $result = $connection->prepare($GENRE_LIST_ID);
                $result->bindParam(':genre_name', $genre_name);
                $result->execute();
                $genre_id = $result->fetchObject()->id;

                // Validate Publisher
                $publisher_name = clean_input($_POST['publisher_name']);
                if (!preg_match($publisher_name_regexp,$publisher_name)) {
                    $errors['publisher_name'] = 'Less than 100 characters.';
                }
                echo (empty($errors));
            
            if (empty($errors)) {
                // QUERY 1: Insert into table publisher:
                    // Check if the publisher already exists
                    $query_publisher_existance = $connection->prepare($PUBLISHER_ID_QUERY);
                    $query_publisher_existance->bindParam(':publisher_name',$publisher_name);
                    $query_publisher_existance->execute();
                    if($query_publisher_existance->rowCount() == 0) {
                        $query_publisher = $connection->prepare($INSERT_PUBLISHER_QUERY);
                        $query_publisher->bindParam(':publisher_name',$publisher_name);
                        if ($query_publisher->execute() == 0) {
                            throw new Exception ('Error during the query execution.');
                        }
                        // Get auto-generated ID from publisher
                        $publisher_id = $connection->lastInsertId();
                    } else {
                        $existing_publisher = $query_publisher_existance->fetchObject();
                        $publisher_id = $existing_publisher->id;
                    }
                
                // QUERY 2: Insert into table game:
                    // Check if the game already exists
                    $query_game_existance = $connection->prepare($GAME_ID_QUERY);
                    $query_game_existance->bindParam(':game_name',$game_name);
                    $query_game_existance->execute();
                    if ($query_game_existance->rowCount() == 0) {
                        $query_game = $connection->prepare($INSERT_GAME_NAME_QUERY);
                        $query_game->bindParam(':genre_id', $genre_id);
                        $query_game->bindParam(':game_name', $game_name);
                        if ($query_game->execute()==0) {
                            throw new Exception('Error during the query execution.');
                        }
                        // Get auto-generated ID from game if does not exist
                        $game_id = $connection->lastInsertId();
                    } else {
                        $existing_game = $query_game_existance->fetchObject();
                        $game_id = $existing_game->id;
                    }
                
                // QUERY 3: Insert into table game_publisher:
                $query_game_publisher = $connection->prepare($INSERT_GAME_PUBLISHER_QUERY);
                $query_game_publisher->bindParam(':game_id', $game_id);
                $query_game_publisher->bindParam(':publisher_id', $publisher_id);
                if ($query_game_publisher->execute()==0) {
                    throw new Exception('Error during the query execution.');
                }
                // Get auto-generated ID from game_publisher
                $game_publisher_id = $connection->lastInsertId();

                // QUERY 4: Insert into table game_platform:
                $query_game_platform = $connection->prepare($INSERT_GAME_PLATFORM_QUERY);
                $query_game_platform->bindParam(':game_publisher_id', $game_publisher_id);
                $query_game_platform->bindParam(':platform_id', $platform_id);
                $query_game_platform->bindParam(':release_year', $release_year);
                if ($query_game_platform->execute()==0) {
                    throw new Exception('Error during the query execution.');
                }
                // EVERYTHING WORKED
                $connection->commit();

                // Redirect to inserted_game page
                header("Location: inserted_game.php?id={$game_id}");
                exit();
            
            } else {
                foreach ($errors as $field => $error) {
                    echo "<p class='error'>Error in $field: $error</p>";
                }
            } 
        } catch (PDOException $e) {
            // If there is any error, roll back
            echo $e->getMessage();
            if($connection->inTransaction()) {
                $connection->rollBack();
            }
        } finally {
            // Close connection
            if (isset($connectijon)) {
                $connection = null;
            }
        }
    }
    function clean_input($input):string {
        return htmlspecialchars(stripslashes(trim($input)));
    }