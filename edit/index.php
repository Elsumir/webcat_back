<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>

<?php
\Bitrix\Main\UI\Extension::load("ui.vue3");
?>

<?
\Bitrix\Main\UI\Extension::load("local.newtest");
?>

<div id="application"></div>
<script type="text/javascript">
	
	const application = new BX.Local.Newtest('#application');
	application.start();

        
</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>