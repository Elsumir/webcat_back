<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription = array(
    "NAME" => "Список сотрудников",
    "DESCRIPTION" => "Отображает список сотрудников",
    "ICON" => "/images/icon.gif",
    "CACHE_PATH" => "Y",
    "PATH" => array(
        "ID" => "custom_components",
        "CHILD" => array(
            "ID" => "employee_list",
            "NAME" => "Список сотрудников"
        )
    ),
);
?>

