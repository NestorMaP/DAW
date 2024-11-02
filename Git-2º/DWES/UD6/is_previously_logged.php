<?php
if (!isset($_SESSION['user']) && isset($_COOKIE['user'])) {

    $token = $_COOKIE['token'];

    try {
        $connection = new PDO($DSN,$USER,$PASS,$OPTIONS);
                    
        $result = $connection ->prepare($GET_USER_FROM_TOKEN_QUERY);
        $result->bindParam(':token',$token);
        $result->execute();

        $user = $result->fetchObject();

        if ($user) {
            $_SESSION['user'] = 
                [
                    'id' => $user_id,
                    'email' => $user_email,
                    'name' => $user_name,
                    'surname' => $user_surname,
                    'rol' => $user_rol,
                    'phone' => $user_phone
                ];
        } else {
            setcookie('token','',time()-1,'/');
        }
    } catch (PDOException $e) {
        echo 'Connexion failure: '. $e->getMessage();
    }
}