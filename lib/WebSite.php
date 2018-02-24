<?php
	namespace CloudMind;
	
	use Bitrix\Main\Config\Option;
	use \CloudMind\Redirector\Redirector;
	
	
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
		
		function __construct($config) {
			$this->_config = $config;
			
			// Создаем редиректы
			if(isset($config['redirects']) && !empty($config['redirects'])) {
				$this->_redirector = new Redirector($config['redirects']);
			}
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
		
		
	}