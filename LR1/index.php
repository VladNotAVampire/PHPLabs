<?php
    require_once(__DIR__ . "/../Data/HardcodedStudentsRepository.php");

    $studentsRepository = new HardcodedStudentsRepository();
    $students = $studentsRepository->GetStudents();

    for ($i = 0; $i < count($students);$i++) {
        echo $students[$i]->toString() . '<br/>';   
    }

    echo $studentsRepository->GetStudentByFio("Ivanov")->toString() . '<br/>' .'<br/>';

    echo "count of boys = "  . $studentsRepository->CountStudentsOfSex(Student::MALE_SEX) . '<br/>';
    echo "count of girls = "  . $studentsRepository->CountStudentsOfSex(Student::FEMALE_SEX) . '<br/>';
?>