<?php
    session_start();

    include('db_vars_inc.php');

    try {
        // 1. CREATE THE TOKEN
        $token = bin2hex(random_bytes(90));

        // 2. STORE THE TOKEN IN A SESSION VARIABLE AND A COOKIE
        $_SESSION['token'] = $token;
        setcookie('token',$token,time()+86400,'/');


        // 3. STORE THE TOKEN IN THE DB
        $connection = new PDO($DSN,$USER,$PASS,$OPTIONS);
                    
        $result = $connection ->prepare($UPDATE_TOKEN_QUERY);
        $result->bindParam(':token',$token);
        $result->bindParam(':user_id',$_SESSION['user']['id']);
        $result->execute();
    } catch (PDOException $e) {
        echo 'Connexion failure: '. $e->getMessage();
    }