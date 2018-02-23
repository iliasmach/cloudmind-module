<?php
	use Bitrix\Main\ModuleManager;
	use Bitrix\Main\UrlRewriter;
	use Bitrix\Main\IO;
	
	if (class_exists("cloudmind_main"))
		return;
	/**
	 * Class cloudmind_main
	 */
	class cloudmind_main extends CModule {
		public $MODULE_ID = "cloudmind.main";
		public $MODULE_VERSION;
		public $MODULE_VERSION_DATE;
		public $MODULE_NAME;
		public $MODULE_DESCRIPTION;
		public $MODULE_CSS;
		
		
		function __construct()
		{
			$arModuleVersion = array();
			$path = str_replace("\\", "/", __FILE__);
			$path = substr($path, 0, strlen($path) - strlen("/index.php"));
			require($path."/version.php");
			
				$this->MODULE_VERSION = $arModuleVersion["VERSION"];
				$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
			
			$this->MODULE_NAME = "Пустой модуль";
			$this->MODULE_DESCRIPTION = "Это пустышка модуля";
		}
		public function DoInstall()
		{
			global $DOCUMENT_ROOT, $APPLICATION;
			
			RegisterModule($this->MODULE_ID);
			
			return true;
		}
		public function DoUninstall()
		{
			global $DOCUMENT_ROOT, $APPLICATION;
			
			UnRegisterModule($this->MODULE_ID);
			
			return true;
		}
	}