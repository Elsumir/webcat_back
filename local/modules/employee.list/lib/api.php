<?php
namespace Employee\List;

use Bitrix\Main\Engine\Controller;
use Bitrix\Main\Application;

class ApiController extends Controller
{
    public function getEmployeesAction()
    {
        $connection = Application::getConnection();

        $sql = 'SELECT * FROM custom_mytable';
        $recordset = $connection->query($sql);

        $employees = [];
        while ($record = $recordset->fetch()) {
            $employees[] = [
                'ID' => $record['ID'],
                'NAME' => $record['NAME'],
                'POSITION' => $record['POSITION'],
                'EXPERIENCE' => $record['EXPERIENCE']
            ];
        }

        return $employees;
    }

    public function addEmployeeAction($name, $position, $experience)
    {
        $connection = Application::getConnection();
        $sqlHelper = $connection->getSqlHelper();

        $name = $sqlHelper->forSql($name);
        $position = $sqlHelper->forSql($position);
        $experience = (int)$experience;

        $sql = "INSERT INTO custom_mytable (NAME, POSITION, EXPERIENCE) VALUES ('$name', '$position', $experience)";
        $connection->queryExecute($sql);

        return ['status' => 'success'];
    }

    public function updateEmployeeAction($id, $name, $position, $experience)
    {
        $connection = Application::getConnection();
        $sqlHelper = $connection->getSqlHelper();

        $id = (int)$id;
        $name = $sqlHelper->forSql($name);
        $position = $sqlHelper->forSql($position);
        $experience = (int)$experience;

        $sql = "UPDATE custom_mytable SET NAME='$name', POSITION='$position', EXPERIENCE=$experience WHERE ID=$id";
        $connection->queryExecute($sql);

        return ['status' => 'success'];
    }

    public function deleteEmployeeAction($id)
    {
        $connection = Application::getConnection();
        $id = (int)$id;

        $sql = "DELETE FROM custom_mytable WHERE ID=$id";
        $connection->queryExecute($sql);

        return ['status' => 'success'];
    }
}
?>
