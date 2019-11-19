<?php

function HandleDecaneryRequest()
{
    $repository = HardcodedStudentsRepository::getInstance();

    function executeCrudAction($method, $actiontype){
        switch ($method){
            case "POST":
                if ($actiontype === "add student")
                    addStudent();
                break;
            case "PUT":
                updateStudent();
                break;
            case "DELETE":
                deleteStudent();
                break;
            default:
                break;
        }
    }

    function addStudent() {
        echo("hey");
        $repository->addStudent(new Student($_POST["fio"], $_POST["rating"], $_POST["sex"], $_POST["group"])); 
    }

    function updateStudent() {}
    function deleteStudent() {}

    function getStudentsToRender($repository){
        $result = null;

        if ($_REQUEST->key_exists("filterGroup"))
            $result = $repository->GetByGroup($_REQUEST["filterGroup"]);
        else 
            $result = $repository->GetStudents();

        if ($_REQUEST->key_exists("sort")){
            $sort = $_REQUEST["sort"];
            uksort($result, function($a, $b) { return strcmp($a->$sort, $b->$sort);});
        }

        return $result;
    }
    function renderView($students){
        ?>
        <h1>Decanery</h1>

        <form method="GET">
            <input type="text" name="filterGroup">
            <input type="submit" value="search by group">
        </form>

        <table>
            <thead>
                <tr>
                    <th>
                        <form><input type="submit" name="sort" value="fio"></form>
                    </th>
                    <th><form><input type="submit" name="sort" value="rating"></form></th>
                    <th><form><input type="submit" name="sort" value="sex"></form></th>
                    <th><form><input type="submit" name="sort" value="group"></form></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($students as $student):?>
                <tr>
                    <td><?=$student->fio?></td>
                    <td><?=$student->rating?></td>
                    <td><?=$student->sex?></td>
                    <td><?=$student->group?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <br/>
        <p>New student</p>
        <form action="HandleDecaneryRequest.php" method="POST">
            <input type="text" name="fio" placeholder="fio">
            <input type="number" name="rating" placeholder="rating">
            <select name="sex" placeholder="sex" value=<?=Student::MALE_SEX?>>
                <option><?=Student::MALE_SEX?></option>
                <option><?=Student::FEMALE_SEX?></option>
            </select>
            <input type="text" name="group" placeholder="group">
            <input type="submit" value="add student" name="actiontype">
        </form>
        <?php
    }

    $method = $_SERVER['REQUEST_METHOD'];
    $actiontype = $_REQUEST["actiontype"];

    if ($method !== "GET")
        executeCrudAction($method, $actiontype);
    
    $studentsToRender = getStudentsToRender($repository);
    
    renderView($studentsToRender);
}