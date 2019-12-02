<?php
require_once('StudentsRepository.php');

class MysqlStudentsRepository extends StudentsRepository
{
    private $connection;

    public function __construct() {
        $this->connection = new mysqli('localhost', 'phplabs', 'N0_password', 'phpdecanery');
        $this->EnsureConnected();
        $this->EnsureDbCreated();
    }

    private function EnsureConnected()
    {
        if($this->connection->connect_errno)
        {
            echo "Failed connecting to MySQL:". $this->connection->connect_err;
            throw new Exceprion($this->connection->connect_err);
        }
    }

    private function EnsureDbCreated(){
        $this->connection->query("CREATE TABLE IF NOT EXISTS students(
            id int NOT NULL auto_increment,
            fio nvarchar(50) NOT NULL,
            rating real NOT NULL,
            sex tinyint NOT NULL,
            `group` nvarchar(10) NOT NULL,
            PRIMARY KEY (id)
            );");
    }

    public function GetStudents(){
        $result = array();
        $responseFromDb = $this->SendGetAllStudentsQuery();
        $students = $this->ResponseToArray($responseFromDb);
        return $students;
    }

    private function SendGetAllStudentsQuery(){
        $response = $this->connection->query("SELECT * FROM students;");
        return $response;
    }

    private function ResponseToArray($response){
        $result = array();
        $response->data_seek(0);
        while ($row = $response->fetch_assoc())
            $result[] = $this->RowToStudent($row);
        return $result;
    }

    private function RowToStudent($row){
        $sexAsStr = $row['sex'] == 0 ? Student::MALE_SEX : Student::FEMALE_SEX;
        return new Student($row['fio'], $row['rating'], $sexAsStr, $row['group'], $row['id']);
    }

    public function AddStudent($student){
        $sexAsInt = $student->getSexAsInt();
        $sql = "INSERT INTO students(fio, rating, sex, `group`) VALUES 
        ('$student->fio', $student->rating, $sexAsInt, '$student->group');";
        $response = $this->connection->query($sql);
    }

    public function UpdateStudent($student){
        $sexAsInt = $student->getSexAsInt();
        $sql = "UPDATE students SET 
                fio = '$student->fio',
                rating = $student->rating,
                sex = $sexAsInt,
                `group` = `$student->group`
                WHERE id = $student->id;";
        $response = $this->connection->query($sql);
    }

    public function DeleteStudent($student){
        $sql = "DELETE FROM students WHERE id = $student->id;";
        $response = $this->connection->query($sql);
    }
}