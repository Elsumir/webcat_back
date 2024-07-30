--- first commit
 .config.php --> deguder = true --- first commit

--- добавил rest api\ webhook
urlrewrite.php --> array(
	'CONDITION' => '#^/local/rest/#',
	'RULE' => '',
	'ID' => 'bitrix:rest.hook',
	'PATH' => '/local/rest/index.php',
 ),

bitirx\php_interface\dbconn.php --> define('REST_APAUTH_ALLOW_HTTP', true);


