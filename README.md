<h1>Bitrix toolkit</h1>

<p>Это попытка сделать работу с Битриксом чуть менее болезненным, 
плюс собрать в одном модуле частоиспользуемые мной бибилиотеки и инструменты.<p>
 

```PHP
    global $CM_SITE;
	
	$config = [
		'events'    => [],
		'options'   => [],
		/**
		Массив для настроек редиректов.
		
		**enabledMappings** - Использовать ли отображения для переадресации, если true, 
            то в правила будет включен класс RedirectorRule_Mappings
            */
         
		'redirects' => [
			'enabledMappings' => true, 
			// Массив для правил переадресации
			'rules' => [
				['works', new RedirectorRule_IBlockElement()],
			],
		],
	];
	
	$CM_SITE = new \CloudMind\WebSite($config);
```

