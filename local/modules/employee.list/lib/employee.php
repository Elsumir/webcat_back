<?php
namespace Employee\List;

use Bitrix\Main\Loader;
use Bitrix\Main\Application;

class Employee
{
    public static function getEmployees($limit = 5)
    {
        if (!Loader::includeModule('employee.list')) {
            throw new \Exception("Нет модуля employee.list");
        }

        $connection = Application::getConnection();
        $sqlHelper = $connection->getSqlHelper();

        $sql = 'SELECT * FROM custom_mytable LIMIT ' . $sqlHelper->forSql($limit);
        $recordset = $connection->query($sql);

        $employees = [];
        while ($record = $recordset->fetch()) {
            $employees[] = [
                'NAME' => $record['NAME'],
                'POSITION' => $record['POSITION'],
                'EXPERIENCE' => $record['EXPERIENCE']
            ];
        }

        return $employees;
    }
}
?>