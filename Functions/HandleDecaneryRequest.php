<?php
class DecaneryRequestHandler
{
    function __construct(StudentsRepository $repository)
    {
        $this->repository = $repository;
    }

    private $repository;
    private $method;
    private $actiontype;
    private $studentsToRender;

    function HandleDecaneryRequest()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->actiontype = array_key_exists('actiontype', $_REQUEST) ? $_REQUEST["actiontype"] : null;

        if ($this->method !== "GET") $this->executeCrudAction();

        $this->studentsToRender = $this->getStudentsToRender();
        $this->renderView();
    }

    private function executeCrudAction()
    {
        switch ($this->method)
        {
            case "POST":
                if ($this->actiontype === "add student") $this->addStudent();
                break;
            case "PUT":
                $this->updateStudent();
                break;
            case "DELETE":
                $this->deleteStudent();
                break;
            default:
                break;
            }
    }

    private function addStudent()
    {
        echo ("hey");
        $this
            ->repository
            ->addStudent(new Student($_POST["fio"], $_POST["rating"], $_POST["sex"], $_POST["group"]));
    }
    private function updateStudent()
    {
    }
    private function deleteStudent()
    {
        
        $this
        ->repository
        ->DeleteStudent($this->repository->GetStudentById($_REQUEST["id"]));
    }

    private function getStudentsToRender()
    {
        $result = null;

        if (array_key_exists("filterGroup", $_REQUEST)) $result = $this
            ->repository->GetByGroup($_REQUEST["filterGroup"]);
        elseif (array_key_exists('searchfio', $_REQUEST)) $result = 
            array($this
            ->repository
            ->GetStudentByFio($_REQUEST['searchfio']));
        else $result = $this
            ->repository->GetStudents();

        if (array_key_exists("sort", $_REQUEST))
        {
            $sort = $_REQUEST["sort"];
            usort($result, function ($a, $b) use ($sort)
            {
                return strcmp($a->$sort, $b->$sort);
            });
        }

        return $result;
    }

    private function renderView()
    {
        $students = $this->studentsToRender;
?>
            <h1>Decanery</h1>
            filters
            <div style="border-style:solid;border-width: 2px">
                <form method="GET">
                    <input type="text" name="filterGroup">
                    <input type="submit" value="search by group">
                </form>
                or
                <form>
                    <input type="text" name="searchfio">
                    <input type="submit" value="search by fio">
                </form>
            </div>
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
                    <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?=$student->fio?></td>
                        <td><?=$student->rating?></td>
                        <td><?=$student->sex?></td>
                        <td><?=$student->group?></td>
                        <td><form method="Delete"><input type="submit" name="id" value="<?=$student->id?>"></form></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br/>
            
            <p>New student</p>
            <form method="POST">
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

}

function handleDecaneryRequest(StudentsRepository $repository){
   $handler = new DecaneryRequestHandler($repository);
   $handler->HandleDecaneryRequest();
}