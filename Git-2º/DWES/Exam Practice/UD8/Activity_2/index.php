<?php
header('Content-Type: application/json; charset=utf-8');

include 'db.php';
include 'persons_manager.php';
include 'course_manager.php';


// $request = explode('api/,$_SERVER['REQUEST_URI']);
// $request = '/api/'.$request[1]


//$request = '/api'.$_SERVER['REQUEST_URI'];
$request = '/api/course/6';

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