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
                'getEmployees' => array(
                    'callback' => ['Employee\\List\\DevTalks', 'getEmployees'],
                    'options' => array()
                ),
                'getTest' => array(
                    'callback' => ['Employee\\List\\DevTalks', 'getTest'],
                    'options' => array()
                ),
            ),
            'employee.list' => array(
                'employee.list.getEmployees' => array(
                    'callback' => ['Employee\\List\\DevTalks', 'getEmployees'],
                    'options' => array()
                ),
                'employee.list.addEmployee' => array(
                    'callback' => ['Employee\\List\\DevTalks', 'addEmployee'],
                    'options' => array()
                ),
                'employee.list.updateEmployee' => array(
                    'callback' => ['Employee\\List\\DevTalks', 'updateEmployee'],
                    'options' => array()
                ),
                'employee.list.deleteEmployee' => array(
                    'callback' => ['Employee\\List\\DevTalks', 'deleteEmployee'],
                    'options' => array()
                ),
            ),
            
        );
    }
}