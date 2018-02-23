<?php
	CModule::IncludeModule("cloudmind.main");
	global $DBType;
	$arClasses=array(
		'WebSite' => 'classes/WebSite.php',
	);

	CModule::AddAutoloadClasses("cloudmind.main",$arClasses);