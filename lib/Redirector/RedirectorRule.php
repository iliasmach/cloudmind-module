<?php
	/**
	 * Created by PhpStorm.
	 * User: ilasmahianov
	 * Date: 23.02.2018
	 * Time: 22:01
	 */
	
	namespace CloudMind\Redirector;
	
	/**
	 * Class RedirectorRule
	 * @package CloudMind\Redirector
	 */
	abstract class RedirectorRule
	{
		protected $arUrls = [];
		
		protected $sCurrentUrl = '';
		protected $arMatches = [];
		
		protected $redirector;
		
		public function CheckPath($path)
		{
			foreach ($this->arUrls as $url => $handler) {
				preg_match_all($url, $path, $arMatches);
				
				if (isset($arMatches[0]) && !empty($arMatches[0])) {
					$this->sCurrentUrl = $url;
					$this->arMatches = $arMatches;
					
					return true;
				}
			}
		}
		
		abstract public function GetRedirectUrl();
		
		public function setRedirector(Redirector $redirector)
		{
			$this->redirector = $redirector;
		}
		
		public function beforeAddToRedirector($redirector)
		{
			
		}
		
		public function afterAddToRedirector($redirector)
		{
		
		}
		
		public function getAdminMenu() {
			return [];
		}
	}
	
	