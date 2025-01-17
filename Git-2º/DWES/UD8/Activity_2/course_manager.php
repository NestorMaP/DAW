<?php

class CourseManager {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->getConnection();
    }

    public function getAllCourses() {
        $query = 
        'SELECT
            C.id,
            C.name,
            CONCAT(P.first_name," ",P.last_name) AS teacher
        FROM
            course C INNER JOIN person P 
        ON 
            C.teacher_id = P.id
        ORDER BY 1;';

        $stmt = $this->conn->query($query);
        $courses = [];
        $counter = 0;

        // Get object for each course
        while($row = $stmt->fetchObject()) {
            $courses[$counter] = $row;
            $counter++;
        }
        
        echo json_encode((object)$courses,JSON_PRETTY_PRINT);
        
    }

    public function getStudentsByCourse($course_id) {
        $query = 
        'SELECT
            CONCAT(P.first_name," ",P.last_name) AS student
        FROM
            enrollment E INNER JOIN person P 
        ON 
            E.person_enrollment = P.id
        WHERE
            E.course_enrollment = :course_id
        ORDER BY 1;';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':course_id', $course_id);
        $stmt->execute();

        $students = [];
        $counter = 0;

        // Get object for each course
        while($row = $stmt->fetchObject()) {
            $students[$counter] = $row;
            $counter++;
        }

        if ($students) {
            echo json_encode((object)$students, JSON_PRETTY_PRINT);
        } else {
            header('HTTP/1.0 404 Not Found');
            echo json_encode(['error' => 'No students found in this course']);
        }
    }
}