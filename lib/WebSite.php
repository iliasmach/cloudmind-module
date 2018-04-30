<?php
	namespace CloudMind;
	
	use Bitrix\Main\Config\Option;
	use CloudMind\Admin\AdminMenu;
	use \CloudMind\Redirector\Redirector;
	use CloudMind\Redirector\RedirectorRule_Mappings;
	
	
	/**
	 * Class WebSite
	 * @package CloudMind
	 */
	class WebSite
	{
		private $_config = [];
		
		protected $clientName;
		
		
		protected $sitePhone;
		protected $siteAddress;
		protected $siteEmail;
		
		protected $metrikaID;
		protected $googleAnalyticsID;
		
		protected $googleTag;
		
		protected $vkRetarget;
		protected $facebookRetarget;
		protected $yandexRetarget;
		protected $targetMyComRetarget;
		
		protected $_redirector;
		protected $_eventManager;
		protected $_adminMenu;
		
		protected $_services = [];
		
		function __construct($config) {
			$this->_config = $config;
			
			// Создаем редиректы
			if( (isset($config['redirects']['rules']) && !empty($config['redirects']['rules']))
			|| $config['redirects']['enabledMappings']) {
				$this->_redirector = new Redirector($config['redirects']);
			}
			
			// Поставить отображения для редиректов
			if($config['redirects']['enabledMappings']) {
				$this->_redirector->AddRule('mappings', new RedirectorRule_Mappings());
			}
			
			$this->_redirector->Redirect();
		}
		
		public function initServices() {
		
		}
		
		/**
		 * Возвращает экземпляр класса для переадресации
		 *
		 * @return Redirector
		 */
		public function getRedirector() {
			if(!$this->_redirector) {
				$this->_redirector = new Redirector();
			}
			
			return $this->_redirector;
		}
		
		/**
		 * Функция проверяет, находимся ли мы в админке
		 *
		 * @return bool
		 */
		public static function IsInAdmin() {
			global $APPLICATION;
			
			return strpos($APPLICATION->GetCurUri(), "/bitrix/admin") === 0;
		}
		
	}