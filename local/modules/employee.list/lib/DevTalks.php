<?php

use Bitrix\Main\Application;

class DevTalks
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
}