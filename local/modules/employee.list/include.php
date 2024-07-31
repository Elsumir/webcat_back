<?php

use Bitrix\Main\Loader;
use Bitrix\Main\EventManager;
use Bitrix\Main\Engine\Router;
use Bitrix\Main\Application;

Loader::includeModule('employee.list');


\Bitrix\Main\Loader::registerAutoLoadClasses(
    'employee.list',
    [
        'Employee\\List\\Employee' => 'lib/employee.php',
    ]
);

$module_id = 'employee.list';
$module_folder = Application::getDocumentRoot() . '/local/modules/employee.list';
Loader::registerNamespace('Employee\List\Controller', $module_folder . '/controller');


EventManager::getInstance()->addEventHandler(
	"rest",
	"OnRestServiceBuildDescription",
	['Employee\\List\\Controller\\Base', 'onRestServiceBuildDescription']
    );
?>
