<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Employee\List\Employee;

class EmployeeListComponent extends CBitrixComponent
{
    public function executeComponent()
    {
        if (!Loader::includeModule('employee.list')) {
            ShowError("Модуль сотрудник.список не установлен.");
            return;
        }

        $this->arResult = Employee::getEmployees(5);
        $this->includeComponentTemplate();
    }
}
?>