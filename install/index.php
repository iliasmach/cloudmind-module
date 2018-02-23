<?php
	
	/**
	 * Class cloudmind_main
	 */
	class cloudmind_main extends CModule {
		var $MODULE_ID = "cloudmind_main";
		
		var $MODULE_VERSION;
		var $MODULE_VERSION_DATE;
		var $MODULE_NAME;
		var $MODULE_DESCRIPTION;
		var $MODULE_CSS;
		
		function cloudmind_main()
		{
			$arModuleVersion = array();
			$path = str_replace("\\", "/", __FILE__);
			$path = substr($path, 0, strlen($path) - strlen("/index.php"));
			include($path."/version.php");
			if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
			{
				$this->MODULE_VERSION = $arModuleVersion["VERSION"];
				$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
			}
			$this->MODULE_NAME = "Пустой модуль";
			$this->MODULE_DESCRIPTION = "Это пустышка модуля";
		}
		function DoInstall()
		{
			global $DOCUMENT_ROOT, $APPLICATION;
			
			RegisterModule($this->MODULE_ID);
			
			return true;
		}
		function DoUninstall()
		{
			global $DOCUMENT_ROOT, $APPLICATION;
			
			UnRegisterModule($this->MODULE_ID);
			
			return true;
		}
	}