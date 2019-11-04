<?php
function handleDecaneryRequest(StudentsRepository $repository)
{
    function executeCrudAction($method){
        switch ($method){
            case "POST":
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

    function addStudent() {}
    function updateStudent() {}
    function deleteStudent() {}

    function getStudentsToRender($repository){
        if ($_GET["filterGroup"])
            return $repository->GetByGroup($_GET["filterGroup"]);

        return $repository->GetStudents();
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
                    <th>fio</th>
                    <th>rating</th>
                    <th>sex</th>
                    <th>group</th>
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
        <form method="POST">
            <input type="text" name="fio" placeholder="fio">
            <input type="number" name="rating" placeholder="rating">
            <select name="sex" value=<?=Student::MALE_SEX?>>
                <option><?=Student::MALE_SEX?></option>
                <option><?=Student::FEMALE_SEX?></option>
            </select>
            <input type="text" name="group" placeholder="group">
            <input type="submit" value="add student">
        </form>
        <?php
    }

    $method = $_SERVER['REQUEST_METHOD'];
    
    if ($method !== "GET")
        executeCrudAction($method);
    $studentsToRender = getStudentsToRender($repository);
    renderView($studentsToRender);
}