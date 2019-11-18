<?php
    require_once('Student.php');
    require_once('StudentsRepository.php');

    class HardcodedStudentsRepository extends StudentsRepository {
        public static $instance;
        public static function getInstance() : HardcodedStudentsRepository{
            if (static::$instance === null)
            {
                static::$instance = new static();
            }
            return static::$instance;
        }

        private function __construct(){
            $this->students = Array(
                new Student('Ivanov', 4.7, Student::MALE_SEX, 1),
                new Student('Petrov', 4.3, Student::MALE_SEX, 1),
                new Student('Sidorov', 4.2, Student::MALE_SEX, 2),
                new Student('Sirova', 4.1, Student::FEMALE_SEX, 2)
            );
        }

        private $students;

        public function GetStudents(){
            return $this->students;
        }

        public function AddStudent(Student $student)
        {
            array_push($this->students, $student);
        }
    }