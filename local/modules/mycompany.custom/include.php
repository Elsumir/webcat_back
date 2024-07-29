<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CModule::AddAutoloadClasses('mycompany.custom', array(
    'Table' => '/local/module/mycompany.custom/install/index.php',
));

require_once __DIR__ . "/functions.php";
require_once __DIR__ . "/constants.php";
