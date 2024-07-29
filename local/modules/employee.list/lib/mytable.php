<?php
namespace Employee\List;

use Bitrix\Main\Entity;

class MyTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'custom_mytable';
    }

    public static function getMap()
    {
        return [
            new Entity\IntegerField('ID', [
                'primary' => true,
                'autocomplete' => true
            ]),
            new Entity\StringField('NAME', [
                'required' => true
            ]),
            new Entity\StringField('POSITION', [
                'required' => true
            ]),
            new Entity\IntegerField('EXPERIENCE', [
                'required' => true
            ])
        ];
    }
}
?>