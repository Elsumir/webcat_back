<?php
namespace Employee\List;

use Bitrix\Main\Application;

class DevTalks
{

    public static function getTest(): array
    {
        $result = array(
            'status' => 'ok'
        );

        return $result;
    }

    public static function getEmployees(): array
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

    public static function addEmployee($params)
    {
        $connection = Application::getConnection();
        $sqlHelper = $connection->getSqlHelper();

        $data = $params['data'];
        $name = $sqlHelper->forSql($data['name']);
        $position = $sqlHelper->forSql($data['position']);
        $experience = $sqlHelper->forSql($data['experience']);
        $sql = "INSERT INTO custom_mytable (NAME, POSITION, EXPERIENCE) VALUES ('$name', '$position', $experience)";
        $connection->queryExecute($sql);

        return $sql;
    }

    public static function updateEmployee($params)
    {
        $connection = Application::getConnection();
        $sqlHelper = $connection->getSqlHelper();
        $data = $params['data'];

        $id = (int)$data['id'];
        $name = $sqlHelper->forSql($data['name']);
        $position = $sqlHelper->forSql($data['position']);
        $experience = (int)$data['experience'];

        $sql = "UPDATE custom_mytable SET NAME='$name', POSITION='$position', EXPERIENCE=$experience WHERE ID=$id";
        $connection->queryExecute($sql);

        return $sql;
    }

    public static function deleteEmployee($id)
    {
        $connection = Application::getConnection();
        $id = $id['id'];

        $sql = "DELETE FROM custom_mytable WHERE ID=$id";
        $connection->queryExecute($sql);

        return $sql;
    }

    
}