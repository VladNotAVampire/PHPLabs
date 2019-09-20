<?php
    require_once("Student.php");

    abstract class StudentsRepository {
        public abstract function GetStudents();

        public function CountStudentsOfSex(string $sex){
            $count = 0;
            $students = $this->GetStudents();

            foreach($students as $student)
                if ($student->sex == $sex)
                    $count++;
            
            return $count;
        }
    }