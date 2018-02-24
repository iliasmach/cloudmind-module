<h1>Bitrix toolkit</h1>

<p>Это попытка сделать работу с Битриксом чуть менее болезненным, 
плюс собрать в одном модуле частоиспользуемые мной бибилиотеки и инструменты.<p>
 
<p>Для включения модуля необходимо подключить модуль **cloudmind.main**</p>

```PHP
global $CM_SITE;

CModule::IncludeModule('cloudmind.main');    	
/*
Массив для конфигурации
*/
$config = [
    'events' => [],
    'options' => [],
    'redirects' => [
    	 'enabledMappings' => true,
    	 'rules' => [
    	    ['works', new RedirectorRule_IBlockElement()],
    	],
    ],
];
    	
$CM_SITE = new \CloudMind\WebSite($config);
   ```

