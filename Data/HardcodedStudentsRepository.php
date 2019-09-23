<?php
    require_once('Student.php');
    require_once('StudentsRepository.php');

    class HardcodedStudentsRepository extends StudentsRepository {
        function __construct(){
            $this->students = Array(
                new Student('Ivanov', 4.7, Student::MALE_SEX),
                new Student('Petrov', 4.3, Student::MALE_SEX),
                new Student('Sidorov', 4.2, Student::MALE_SEX),
                new Student('Sirova', 4.1, Student::FEMALE_SEX)
            );
        }

        private $students;

        public function GetStudents(){
            return $this->students;
        }

        public function GetStudentByFio($fio) {
            for ($i = 0; count($this->students); $i++) {
                if ($this->students[$i]->fio == $fio) 
                    return $this->students[$i];
            }
        }
    }