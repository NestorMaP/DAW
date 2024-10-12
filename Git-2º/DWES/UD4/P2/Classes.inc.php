<?php
    /**
     * Summary of Person
     * 
     */
    class Person {
        // VARIABLE DECLARATION
        protected string $name, $surname;

        // CONSTRUCTOR
        public function __construct($name, $surname) {
            $this->name = $name;
            $this->surname = $surname;
        }
        // GETTERS & SETTERS
        public function getName() {
            return $this->name;
        }
        public function setName($name) {
            $this->name = $name;
        }
        public function getSurname() {
            return $this->surname;
        }
        public function setSurname($surname) {
            $this->surname = $surname;
        }
        // METHODS
        public function toString() {
            return 'Name: '.$this->name.' '.$this->surname.'<br>';
        }
    }

    /**
     * Summary of Student
     */
    class Student extends Person {
        // VARIABLE DECLARATION
        private string $email;
        private ?Course $course;
        private $grades = [];

        // CONSTRUCTOR
        public function __construct($name, $surname, ) {
            parent::__construct($name, $surname);
            $this->email = strtolower($name.$name).'@howarts.com';
        }
        // GETTERS & SETTERS
        public function getEmail() {
            return $this->email;
        }
        public function setEmail($email) {
            $this->email = $email;
        }
        public function getCourse() {
            return $this->course;
        }
        public function setCourse(Course $course) {
            $this->course = $course;
        }
        
        // METHODS
        public function printInfo():string {
            $string_return = '';
            $string_return .= parent::toString().
                $this->email.'<br>'.
                'Grades: <br>';
            foreach ($this->grades as $subject_name => $grade) {
                $subject = $this->course->getSubjectByName($subject_name);
                $string_return .= '-'.$subject->getTeacher()->getName().' '.$subject->getTeacher()->getSurname().'=>'.$subject->getName().':'.$grade.'<br>';
            }
            return $string_return.'<br><br>';
        }
        public function setGrade(string $subject_name, int $grade) {
            $this->grades[$subject_name] = $grade;
        }
    }

    /**
     * Summary of Teacher
     */
    class Teacher extends Person {
        // VARIABLE DECLARATION
        private string $email;
        private $subjects = [];
        // CONSTRUCTOR
        public function __construct($name, $surname, $email= '') {
            parent::__construct($name, $surname);
            $this->email = strtolower($name.$name).'@howarts.com';
        }
        // GETTERS & SETTERS
        public function getEmail() {
            return $this->email;
        }
        public function setEmail($email) {
            $this->email = $email;
        }
        // METHODS
        public function printInfo():string {
            $string_return = '';
            $string_return .= parent::toString().
                $this->email.'<br>'.
                'Subjects: <br>';
            foreach ($this->subjects as $subject) {
                $string_return .= $subject->getName().'. Class: '.$subject->getClass().'<br>';
            }
            $string_return .= '<br><br>';
            return $string_return;
        }
        public function addSubject(Subject $subject) {
            $this->subjects[] = $subject;
            $subject->setTeacher($this);
        }
    }

    /**
     * Summary of Course
     */
    class Course {
        // VARIABLE DECLARATION
        private static $nextId = 1;
        private int $id, $year;
        private $subjects = [];
        private $students = [];

        // CONSTRUCTOR
        public function __construct($year) {
            $this->year = $year;
            $this->id = self::$nextId++;
        }
        // GETTERS & SETTERS
        public function getId() {
            return $this->id;
        }
        public function getYear() {
            return $this->year;
        }
        public function setYear($year) {
            $this->year = $year;
        }
        public function getSubjects() {
            return $this->subjects;
        }
        public function getStudents() {
            return $this->students;
        }
        // METHODS
        public function printInfo():string {
            $string_return = '';
            $string_return .= 'Course: '.$this->getId().'. Year: '.$this->getYear().'<br>'.
            $string_return .= 'Subjects: <br>';
            foreach ($this->subjects as $subject) {
                $string_return .= '-'.$subject->getName().'<br>';
            }
            $string_return .= 'Students: <br>';
            foreach ($this->students as $student) {
                $string_return .= '-'.$student->getName().' '.$student->getSurname().'<br>';
            }
            $string_return .= '<br><br>';
            return $string_return;
        }
        public function addSubject(Subject $subject) {
            $this->subjects[] = $subject;
            
        }
        public function addStudent(Student $student) {
            $this->students[] = $student;
            $student->setCourse($this);
        }
        public function takeExam(Subject $subject) {
            foreach ($this->students as $student) {
                $student->setGrade($subject->getName(), rand(0,10));
            }
        }
        // Used to retrieve the info for printing the teachers name in the Student's printInfo() method
        public function getSubjectByName ($name) {
            foreach ($this->subjects as $subject) {
                if($subject->getName() === $name) {
                    return $subject;
                } 
            }
            return null;
        }
    }

    class Subject {
        // VARIABLE DECLARATION
        private string $name, $class;
        private ?Teacher $teacher;
        // CONSTRUCTOR
        public function __construct ($name, $class, Teacher $teacher) {
            $this->name = $name;
            $this->class = $class;
            $this->teacher = $teacher;
            $teacher->addSubject($this);
        }
        // GETTERS & SETTERS
        public function getName() {
            return $this->name;
        }
        public function setName($name) {
            $this->name = $name;
        }
        public function getClass() {
            return $this->class;
        }
        public function setClass ($class) {
            $this->class = $class;
        }
        public function getTeacher () {
            return $this->teacher;
        }
        public function setTeacher ($teacher) {
            $this->teacher = $teacher;
        }
        // METHODS
        
        
    }