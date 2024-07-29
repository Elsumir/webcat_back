<?php

use Bitrix\Main\Loader;
use Bitrix\Main\Engine\Router;

Loader::includeModule('employee.list');

class employee_list extends CModule
{
    public function DoInstall()
    {
        Router::addHandler('employee_list', new \Employee\List\ApiController());
    }

    public function DoUninstall()
    {
        Router::removeHandler('employee_list');
    }
}

\Bitrix\Main\Loader::registerAutoLoadClasses(
    'employee.list',
    [
        'Employee\\List\\Employee' => 'lib/employee.php',
    ]
);
?>
