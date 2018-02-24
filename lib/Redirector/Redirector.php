<?php
	
	
	namespace CloudMind\Redirector;
	/**
	 * Class Redirector служит для переадресации по заранее определенным правилам
	 * @package CloudMind\Redirector
	 */
	class Redirector
	{
		/**
		 * @var array Массив правил для переадресации
		 *
		 * Ключами являются названия, значениями - экзепляры класса RedirectRule
		 */
		protected $_arRules = [];
		
		/**
		 * Redirector constructor.
		 * @param array $config
		 */
		function __construct($config = []) {
			if(is_array($config) && !empty($config)) {
				foreach ($config as $configLine) {
					$this->AddRule($configLine[0], $configLine[1]);
				}
			}
		}
		
		/**
		 * Добавляет правило с именем $name
		 *
		 * @param $name string
		 * @param $rule RedirectorRule
		 */
		public function AddRule($name, $rule)
		{
			if ($rule !== null && !empty($name)) {
				$this->_arRules[$name] = $rule;
			}
		}
		
		/**
		 * Убирает правило с уменем $name
		 *
		 * @param $name string
		 */
		public function RemoveRule($name)
		{
			if (!empty($name) && isset($this->_arRules[$name])) {
				unset($this->_arRules[$name]);
			}
		}
		
		/**
		 * Проверяет все правила на соответствие и, если надо, делает переадресацию
		 */
		public function Redirect() {
			if(empty($this->_arRules)) {
				return;
			}
			
			foreach ($this->_arRules as $regExp => $rule) {
				$uri = $_SERVER['REQUEST_URI'];
				
				if($rule->CheckPath($uri)) {
					LocalRedirect($rule->GetRedirectUrl($uri));
				}
			}
		}
	}
	
	
	