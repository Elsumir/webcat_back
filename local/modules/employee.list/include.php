<?php

use Bitrix\Main\Loader;
use Bitrix\Main\EventManager;
use Bitrix\Main\Engine\Router;

Loader::includeModule('employee.list');


\Bitrix\Main\Loader::registerAutoLoadClasses(
    'employee.list',
    [
        'Employee\\List\\Employee' => 'lib/employee.php',
    ]
);

EventManager::getInstance()->addEventHandler(
	"rest",
	"OnRestServiceBuildDescription",
	['Employee\\List\\Controller\\Base', 'onRestServiceBuildDescription']
    );
?>
