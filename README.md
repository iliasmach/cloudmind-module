<h1>Bitrix toolkit</h1>

<p>Это попытка сделать работу с Битриксом чуть менее болезненным, 
плюс собрать в одном модуле частоиспользуемые мной бибилиотеки и инструменты.<p>
 
<p>Для включения модуля необходимо подключить модуль <b>cloudmind.main</b> и создать глобальную переменную с классом WebSite или его потомком.</p>

<p>Пример кода, который необходиом поместить в папку /bitrix/php_interface/init.php</p>

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

