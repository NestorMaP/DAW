<?php
    session_start();

    // Delete token from DB
    include('db_vars_inc.php');
    
    try {
        $connection = new PDO($DSN,$USER,$PASS,$OPTIONS);        
        $result = $connection ->prepare($DELETE_TOKEN_QUERY);
        $result->bindParam(':user_id',$_SESSION['id']);
        $result->execute();
    } catch (PDOException $e) {
        echo 'Connexion failure: '. $e->getMessage();
    }

    // Destroy the session
    session_unset();
    session_destroy();
    
    // Unset cookies
    setcookie('n_product_char','',time() - 1,'/');
    setcookie('token','',time() - 1,'/');

    // Redirect user
    header('Location: index.php');
    exit;