<h1>Bitrix toolkit</h1>

<p>Это попытка сделать работу с Битриксом чуть менее болезненным, 
плюс собрать в одном модуле частоиспользуемые мной бибилиотеки и инструменты.<p>
 
<code php>

    global $CM_SITE;
	
	$config = [
		'events'    => [],
		'options'   => [],
		'redirects' => [
		    /**
		     Использовать ли отображения для переадресации, если true, 
		     то в правила будет включен класс RedirectorRule_Mappings
			*/
			'enabledMappings' => true, 
			// Массив для правил переадресации
			'rules' => [
				['works', new RedirectorRule_IBlockElement()],
			],
		],
	];
	
	$CM_SITE = new \CloudMind\WebSite($config);

</code>
