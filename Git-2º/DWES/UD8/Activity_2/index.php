<?php

require 'db.php';
require 'persons_manager.php';
require 'course_manager.php';

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/api/person':
        (new PersonManager())->getAllPersons();
        break;

    // Use the array matches[] to store the id
    case (preg_match('/\/api\/person\/(\d+)/', $request, $matches) ? true : false):
        $person_id = $matches[1];
        (new PersonManager())->getPersonById($person_id);
        break;
    case '/api/course':
        (new CourseManager())->getAllCourses();
        break;
    // Use the array matches[] to store the id
    case (preg_match('/\/api\/course\/(\d+)/', $request, $matches) ? true : false):
        $course_id = $matches[1];
        (new CourseManager())->getStudentsByCourse($course_id);
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        echo json_encode(['error' => 'Endpoint not found']);
        break;
}