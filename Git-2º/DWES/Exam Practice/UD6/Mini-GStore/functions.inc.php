<?php
    function encryptPassword(String $password): String {
        $targetTime = 0.05; // 50 milliseconds
        $cost = 8;
        do {
            $cost++;
            $startTime = microtime(true);
            $encryptedPassword = password_hash($password, PASSWORD_DEFAULT, ['cost' => $cost]);
            $endTime = microtime(true);
        } while (($endTime - $startTime) < $targetTime);
        return $encryptedPassword;
    }
