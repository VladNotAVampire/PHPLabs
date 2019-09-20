<?php
    require(__DIR__."/../Data/Student.php");
    require(__DIR__."/../Data/HardcodedStudentsRepository.php");
    $repository = new HardcodedStudentsRepository();
    echo $repository->CountStudentsOfSex(Student::FEMALE_SEX) === 1;
    echo $repository->CountStudentsOfSex(Student::MALE_SEX) === 3;
?>