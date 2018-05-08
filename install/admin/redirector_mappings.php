<?php
	require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_before.php");
	require_once($_SERVER["DOCUMENT_ROOT"] . BX_ROOT . "/modules/main/include/prolog_admin.php");
	
	CModule::IncludeModule("cloudmind.main");
	
	include CM_PATH."/admin/redirect_mappings.php";