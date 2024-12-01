<?php
        //CONNECTION VARIABLES
        $DSN = 'mysql:host=localhost;dbname=video_games';
        $USER = 'root';
        $PASS = '';
        $OPTIONS = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        
        //FORM QUERIES

        // Drop down form
        $PLATFORM_LIST = 'SELECT P.platform_name FROM platform P ORDER BY 1;';
        $GENRE_LIST = 'SELECT GE.genre_name FROM genre GE ORDER BY 1;';
        
        // Assign ID in process.php
        $PLATFORM_LIST_ID = 'SELECT P.platform_name, P.id FROM platform P WHERE P.platform_name = :platform_name;';
        $GENRE_LIST_ID = 'SELECT GE.genre_name, GE.id FROM genre GE WHERE GE.genre_name = :genre_name;';
    
        // Check if already exists:
        $GAME_ID_QUERY = 'SELECT GA.id, GA.game_name FROM game GA WHERE GA.game_name = :game_name;';
        $PUBLISHER_ID_QUERY = 'SELECT PU.id, PU.publisher_name FROM publisher PU WHERE PU.publisher_name = :publisher_name;';
            
        // Insert Queries
        $INSERT_PUBLISHER_QUERY = 'INSERT INTO video_games.publisher (publisher_name) 
                                    VALUES (:publisher_name);';
        $INSERT_GAME_NAME_QUERY = 'INSERT INTO video_games.game (genre_id, game_name) 
                                    VALUES (:genre_id, :game_name);';
        $INSERT_GAME_PUBLISHER_QUERY = 'INSERT INTO video_games.game_publisher (game_id, publisher_id) 
                                    VALUES (:game_id, :publisher_id);';
        $INSERT_GAME_PLATFORM_QUERY = 'INSERT INTO video_games.game_platform (game_publisher_id, platform_id, release_year) 
                                    VALUES (:game_publisher_id, :platform_id, :release_year);';


        //QUERIES
        $MAIN_QUERY = 'SELECT
                            GA.id,
                            GA.game_name,
                            GPL.release_year,
                            P.platform_name,
                            GE.genre_name,
                            PU.publisher_name
                        FROM
                            game GA
                            INNER JOIN genre GE ON GA.genre_id = GE.id
                            INNER JOIN game_publisher GP ON GA.id = GP.game_id
                            INNER JOIN publisher PU ON PU.id = GP.publisher_id
                            INNER JOIN game_platform GPL ON GPL.game_publisher_id = GP.id
                            INNER JOIN platform P ON P.id = GPL.platform_id
                        ORDER BY 1;';
        
        $GAME_QUERY = 'SELECT
                            GA.id,
                            GA.game_name,
                            GPL.release_year,
                            P.platform_name,
                            GE.genre_name,
                            PU.publisher_name,
                            RS.num_sales,
                            R.region_name
                        FROM
                            game GA
                            INNER JOIN genre GE ON GA.genre_id = GE.id
                            INNER JOIN game_publisher GP ON GA.id = GP.game_id
                            INNER JOIN publisher PU ON PU.id = GP.publisher_id
                            INNER JOIN game_platform GPL ON GPL.game_publisher_id = GP.id
                            INNER JOIN platform P ON P.id = GPL.platform_id
                            LEFT JOIN region_sales RS ON RS.game_platform_id = GPL.id
                            LEFT JOIN region R ON R.id = RS.region_id
                        WHERE GA.id = :id
                        ORDER BY 1;';

        $SELECT_DELETE_QUERY = 'SELECT
                            GA.id,
                            GA.game_name,
                            GPL.id AS game_platform_id,
                            GPL.game_publisher_id,
                            GP.publisher_id,
                            GP.id AS game_publisher_id
                            FROM
                            game GA
                            INNER JOIN game_publisher GP ON GA.id = GP.game_id
                            INNER JOIN game_platform GPL ON GPL.game_publisher_id = GP.id
                        WHERE GA.id = :id;';


        $DELETE_GAME_PLATFORM_QUERY = 'DELETE FROM game_platform WHERE id = :game_platform_id;';
        $DELETE_GAME_PUBLISHER_QUERY = 'DELETE FROM game_publisher WHERE id = :game_publisher_id;';
        $DELETE_REGION_SALES_QUERY = 'DELETE FROM region_sales WHERE game_platform_id = :game_platform_id;';
        
        $YEAR_QUERY = 'SELECT
                            GA.game_name,
                            GPL.release_year,
                            P.platform_name,
                            GE.genre_name,
                            PU.publisher_name
                        FROM
                            game GA
                            INNER JOIN genre GE ON GA.genre_id = GE.id
                            INNER JOIN game_publisher GP ON GA.id = GP.game_id
                            INNER JOIN publisher PU ON PU.id = GP.publisher_id
                            INNER JOIN game_platform GPL ON GPL.game_publisher_id = GP.id
                            INNER JOIN platform P ON P.id = GPL.platform_id
                        WHERE GPL.release_year = :release_year
                        ORDER BY 1;';

        $GENRE_QUERY = 'SELECT
                            GA.game_name,
                            GPL.release_year,
                            P.platform_name,
                            GE.id,
                            GE.genre_name,
                            PU.publisher_name
                        FROM
                            game GA
                            INNER JOIN genre GE ON GA.genre_id = GE.id
                            INNER JOIN game_publisher GP ON GA.id = GP.game_id
                            INNER JOIN publisher PU ON PU.id = GP.publisher_id
                            INNER JOIN game_platform GPL ON GPL.game_publisher_id = GP.id
                            INNER JOIN platform P ON P.id = GPL.platform_id
                        WHERE GE.genre_name = :genre_name
                        ORDER BY 1;';

        $PUBLISHER_QUERY = 'SELECT
                            GA.game_name,
                            GPL.release_year,
                            P.platform_name,
                            GE.genre_name,
                            PU.id,
                            PU.publisher_name
                        FROM
                            game GA
                            INNER JOIN genre GE ON GA.genre_id = GE.id
                            INNER JOIN game_publisher GP ON GA.id = GP.game_id
                            INNER JOIN publisher PU ON PU.id = GP.publisher_id
                            INNER JOIN game_platform GPL ON GPL.game_publisher_id = GP.id
                            INNER JOIN platform P ON P.id = GPL.platform_id
                        WHERE PU.publisher_name = :publisher_name
                        ORDER BY 1;';

        $PLATFORM_QUERY = 'SELECT
                            GA.game_name,
                            GPL.release_year,
                            P.id,
                            P.platform_name,
                            P.platform_description,
                            GE.genre_name,
                            PU.publisher_name
                        FROM
                            game GA
                            INNER JOIN genre GE ON GA.genre_id = GE.id
                            INNER JOIN game_publisher GP ON GA.id = GP.game_id
                            INNER JOIN publisher PU ON PU.id = GP.publisher_id
                            INNER JOIN game_platform GPL ON GPL.game_publisher_id = GP.id
                            INNER JOIN platform P ON P.id = GPL.platform_id
                        WHERE P.platform_name = :platform_name
                        ORDER BY 1;';