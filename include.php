<?php
	CModule::IncludeModule("cloudmind.main");
	global $DBType;
	$arClasses=array(
		'\CloudMind\WebSite' => 'lib/WebSite.php',
		'\CloudMind\Redirector\Redirector' => 'lib/Redirector/Redirector.php',
		'\CloudMind\Redirector\RedirectorRule' => 'lib/Redirector/RedirectorRule.php',
		'\CloudMind\Redirector\RedirectorMapping' => 'lib/Redirector/RedirectorMapping.php',
		'\CloudMind\Redirector\RedirectorRule_Mappings' => 'lib/Redirector/RedirectorRule_Mappings.php',
	);

	CModule::AddAutoloadClasses("cloudmind.main",$arClasses);
	
	
	
	