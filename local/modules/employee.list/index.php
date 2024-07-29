<?php
use \Bitrix\Main\Loader;
use \Employee\List\Employee;

if (!Loader::includeModule('employee.list')) {
    return;
}

$employees = Employee::getEmployees();

foreach ($employees as $employee) {
    echo "<p>{$employee['NAME']} - {$employee['POSITION']}</p>";
}
?>