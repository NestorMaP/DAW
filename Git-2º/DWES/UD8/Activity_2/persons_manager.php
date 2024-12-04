<?php

class PersonManager {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->getConnection();
    }

    public function getAllPersons(){
        $query = 
            'SELECT
                P.id,
                P.first_name,
                P.last_name
            FROM
                person P;';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        $persons = [];
        $counter = 0;

        // Get object for each person
        while ($row = $stmt->fetchObject()) {
            $persons[$counter] = $row;
            $counter++;
        }
        
        echo json_encode((object)$persons, JSON_PRETTY_PRINT);
    }

    public function getPersonById($person_id) {
        $query = 
        'SELECT
            P.id,
            P.first_name,
            P.last_name,
            H.name AS house
        FROM
            person P 
        INNER JOIN house H ON P.house_id = H.id
        
        WHERE P.id = :person_id;';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':person_id', $person_id);
        $stmt->execute();

        $persons = [];
        $counter = 0;

        // Get object for each person (should be only 1)
        $row = $stmt->fetchObject();
        $persons[$counter] = $row;
        $counter++;
        

        if ($persons) {
            echo json_encode((object)$persons, JSON_PRETTY_PRINT);
        } else {
            header('HTTP/1.0 404 Not Found');
            echo json_encode(['error' => 'Person not found']);
        }
    }
}