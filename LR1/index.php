<?php
    require_once(__DIR__ . "/../Data/HardcodedStudentsRepository.php");

    $students = new HardcodedStudentsRepository();

    for ($i = 0; $i < count($students->GetStudents());$i++) {
        echo $students->GetStudents()[$i]->toString() . '<br/>';   
    }

    echo $students->GetStudentByFio("Ivanov")->toString() . '<br/>';
?>