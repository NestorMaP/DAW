<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Game</title>
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
            
            $query_select_delete = $connection->prepare($SELECT_DELETE_QUERY);
            $query_select_delete->bindParam(':id', $game_id, PDO::PARAM_INT);
            
            if ($query_select_delete->execute() == 0) {
                throw new Exception('Error during the query execution.');
            }
            
            // Assign binding params
            $game_deleted = $query_select_delete->fetchObject();
            $game_platform_id = $game_deleted->game_platform_id;
            $game_publisher_id = $game_deleted->game_publisher_id;

            // Delete from region_sales
            // It's mandatory to delete from here as there is a fk in this table of game_platform
            $delete_query_region_sales = $connection->prepare($DELETE_REGION_SALES_QUERY);
            $delete_query_region_sales->bindParam(':game_platform_id',$game_platform_id);
            if($delete_query_region_sales->execute() == 0) {
                throw new Exception('Error during the query execution. (region_sales)');
            }

            // Delete from game_platform
            $delete_query_platform = $connection->prepare($DELETE_GAME_PLATFORM_QUERY);
            $delete_query_platform->bindParam(':game_platform_id',$game_platform_id);
            if ($delete_query_platform->execute() == 0) {
                throw new Exception('Error during the query execution. (game_platform)');
            }
            // Delete from game_publisher
            $delete_query_publisher = $connection->prepare($DELETE_GAME_PUBLISHER_QUERY);
            $delete_query_publisher->bindParam(':game_publisher_id',$game_publisher_id);
            if ($delete_query_publisher->execute()== 0) {
                throw new Exception('Error during the query execution. (game_publisher)');
            }
            echo "<h3>Game deleted: $game_deleted->game_name</h3>";

            echo '<button><a href="./index.php"><--Back</a></button>';
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