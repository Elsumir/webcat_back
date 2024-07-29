<?php
use Bitrix\Main\Application;
use Bitrix\Main\ModuleManager;

class employee_list extends CModule
{
    public function DoUninstall()
    {
        ModuleManager::unRegisterModule($this->MODULE_ID);
    }
}
?>