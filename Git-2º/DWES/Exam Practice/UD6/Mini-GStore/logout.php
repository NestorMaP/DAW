<?php
    session_start();

    // Delete token from DB
    include('db_vars_inc.php');
    
    try {
        $connection = new PDO($DSN,$USER,$PASS,$OPTIONS);        
        $result = $connection ->prepare($DELETE_TOKEN_QUERY);
        $result->bindParam(':user_id',$_SESSION['user']['id']);
        $result->execute();
    } catch (PDOException $e) {
        echo 'Connexion failure: '. $e->getMessage();
    }

    // Destroy the session
    session_unset();
    session_destroy();
    setcookie('token','',time() - 1,'/');

    // Redirect user
    header('Location: index.php');
    exit;