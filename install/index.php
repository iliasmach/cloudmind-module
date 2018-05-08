<?php
	IncludeModuleLangFile(__FILE__);
	use Bitrix\Main\IO;
	use Bitrix\Main\ModuleManager;
	use Bitrix\Main\UrlRewriter;
	use Bitrix\Main\Config\Option;
	
	if (class_exists("cloudmind_main"))
		return;
	
	class cloudmind_main extends CModule
	{
		public $MODULE_ID = "cloudmind.main";
		public $MODULE_VERSION;
		public $MODULE_VERSION_DATE;
		public $MODULE_NAME;
		public $MODULE_DESCRIPTION;
		public $MODULE_CSS;
		
		
		function __construct()
		{
			$arModuleVersion = [];
			$path = str_replace("\\", "/", __FILE__);
			$path = substr($path, 0, strlen($path) - strlen("/index.php"));
			require($path . "/version.php");
			
			$this->MODULE_VERSION = $arModuleVersion["VERSION"];
			$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
			
			$this->MODULE_NAME = GetMessage("CLOUD_MIND_MODULE_NAME");
			$this->MODULE_DESCRIPTION = GetMessage("CLOUD_MIND_MODULE_DESCRIPTION");
		}
		
		
		public function DoInstall()
		{
			global $DOCUMENT_ROOT, $APPLICATION, $DB;
			
			$this->initOptions();
			
			CopyDirFiles(dirname(__FILE__) . "/admin/", $_SERVER['DOCUMENT_ROOT'] . "/bitrix/admin/");
			
			RegisterModule($this->MODULE_ID);
			
			return true;
		}
		 
		protected function initOptions()
		{
			Option::set('cloudmind.main', 'site_phone', '8 (xxx) xxx xx xx');
			Option::set('cloudmind.main', 'site_address', 'г. Москва');
			Option::set('cloudmind.main', 'site_email', 'mail@domain.ru');
			Option::set('cloudmind.main', 'metrika_id', '');
			Option::set('cloudmind.main', 'google_analytics_id', '');
		}
		
		public function DoUninstall()
		{
			global $DOCUMENT_ROOT, $APPLICATION;
			
			DeleteDirFiles(dirname(__FILE__) . "/admin/", $_SERVER['DOCUMENT_ROOT'] . "/bitrix/admin/");
			
			$this->unsetOptions();
			
			UnRegisterModule($this->MODULE_ID);
			
			return true;
		}
		
		protected function unsetOptions()
		{
			Option::delete('cloudmind.main', 'site_phone');
			Option::delete('cloudmind.main', 'site_address');
			Option::delete('cloudmind.main', 'site_email');
			Option::delete('cloudmind.main', 'metrika_id');
			Option::delete('cloudmind.main', 'google_analytics_id');
		}
		
		protected function bindEvents()
		{
		
		}
		
		protected function unbindEvents()
		{
		
		}
	}