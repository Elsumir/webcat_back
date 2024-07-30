<?php
namespace Employee\List\Controller;

use Bitrix\Main\Engine\Controller;
use \Bitrix\Main\Error;

class Base extends Controller
{
    public static function onRestServiceBuildDescription()
    {
        return array(
            '_global' => array(
                'getEmployeesAction' => array(
                    'callback' => ['Employee\\List\\DevTalks', 'getEmployeesAction'],
                    'options' => array()
                ),
            ),
            'employee.list' => array(
                'employee.list.getEmployeesAction' => array(
                    'callback' => ['Employee\\List\\DevTalks', 'getEmployeesAction'],
                    'options' => array()
                ),
            ),
            
        );
    }
}