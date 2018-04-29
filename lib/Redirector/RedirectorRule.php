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
		
		
		public function CheckPath($path)
		{
			
			foreach ($this->arUrls as $url => $handler) {
				
				preg_match_all($url, $path, $arMatches);
				AddMessage2Log($url);
				AddMessage2Log($path);
				if (isset($arMatches[0]) && !empty($arMatches[0])) {
					$this->sCurrentUrl = $url;
					$this->arMatches = $arMatches;
					
					return true;
				}
			}
		}
		
		abstract public function GetRedirectUrl();
		
		public function beforeAddToRedirector($redirector)
		{
			return true;
		}
		
		public function afterAddToRedirector($redirector)
		{
			return true;
		}
		
		public function getAdminMenu() {
			return [];
		}
	}
	
	