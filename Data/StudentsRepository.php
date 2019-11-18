<?php
    require_once("Student.php");

    abstract class StudentsRepository {
        public abstract function GetStudents();
        public abstract function AddStudent(Student $student);

        public function CountStudentsOfSex(string $sex){
            $count = 0;
            $students = $this->GetStudents();

            foreach($students as $student)
                if ($student->sex == $sex)
                    $count++;
            
            return $count;
        }

        public function GetStudentByFio($fio) {
            $students = $this->GetStudents();

            for ($i = 0; count($students); $i++) {
                if ($students[$i]->fio == $fio) 
                    return $students[$i];
            }
        }

        public function GetByGroup($group){
            return array_filter(
                $this->GetStudents(), 
                function($v) use ($group) {return $v->group == $group;}
            );
        }
    }