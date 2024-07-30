<?php
use Bitrix\Main\ModuleManager;

class employee_list_my extends CModule
{
    public function __construct()
    {
        $arModuleVersion = [];
        include __DIR__ . '/../.description.php';

        $this->MODULE_ID = 'employee.list';
        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        $this->MODULE_NAME = GetMessage('EMPLOYEE_LIST_MODULE_NAME');
        $this->MODULE_DESCRIPTION = GetMessage('EMPLOYEE_LIST_MODULE_DESCRIPTION');
        $this->PARTNER_NAME = GetMessage('EMPLOYEE_LIST_MODULE_PARTNER_NAME');
        $this->PARTNER_URI = GetMessage('EMPLOYEE_LIST_MODULE_PARTNER_URI');
    }

    public function DoInstall()
    {
        global $DB;
        ModuleManager::registerModule($this->MODULE_ID);

        $DB->Query("CREATE TABLE IF NOT EXISTS custom_mytable (
            ID INT(11) AUTO_INCREMENT PRIMARY KEY,
            NAME VARCHAR(255) NOT NULL,
            POSITION VARCHAR(255) NOT NULL,
            EXPERIENCE INT(11) NOT NULL
        )");
    }

    public function DoUninstall()
    {
        global $DB;
        ModuleManager::unRegisterModule($this->MODULE_ID);


        $DB->Query("DROP TABLE IF EXISTS custom_mytable");
    }
}
?>