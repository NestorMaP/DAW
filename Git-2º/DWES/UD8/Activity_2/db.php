<?php

    class Database {
        private $DSN = 'mysql:host=localhost;dbname=hogwarts';
        private $USER = 'root';
        private $PASS = '';
        private $OPTIONS = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        private $conn;
    
        
        public function getConnection(){
            if ($this->conn === null) {
                try {
                    $this->conn = new PDO($this->DSN,$this->USER,$this->PASS,$this->OPTIONS);
                } catch (PDOException $e) {
                    die(json_encode(['error' => 'Connexion failure: '. $e->getMessage()]));
                }
            }
            return $this->conn;
        }
    }

    /* QUERIES 
    $ALL_PERSONS_QUERY = 
        'SELECT
            P.id,
            P.first_name,
            P.last_name,
            P.house_id
        FROM
            person P;';
                    
    $PERSON_COMPLETE_QUERY = 
        'SELECT
            P.id,
            P.first_name,
            P.last_name,
            H.name
        FROM
            person P INNER JOIN house H 
        ON 
            P.house_id = H.id
        ORDER BY 1;';
    
    $COURSE_QUERY = 
        'SELECT
            C.id,
            C.name,
            CONCAT(P.first_name," ",P.last_name) AS full_name
        FROM
            course C INNER JOIN person P 
        ON 
            C.teacher_id = P.id
        ORDER BY 1;';
                
    $STUDENT_COURSE_QUERY = 
        'SELECT
            CONCAT(P.first_name," ",P.last_name) AS full_name
        FROM
            enrollment E INNER JOIN person P 
        ON 
            E.person_enrollment = P.id
        WHERE
            E.course_enrollment = :course_id
        ORDER BY 1;';

        */