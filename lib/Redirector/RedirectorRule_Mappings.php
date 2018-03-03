<?php
	/**
	 * Created by PhpStorm.
	 * User: ilasmahianov
	 * Date: 23.02.2018
	 * Time: 22:16
	 */
	
	namespace CloudMind\Redirector;
	use CloudMind\Admin\AdminMenu;
	
	/**
	 * Class RedirectorRule_Mappings
	 *
	 * Класс служит для
	 *
	 * @package CloudMind\Redirector
	 */
	class RedirectorRule_Mappings extends RedirectorRule
	{
		protected $redirectUrl = '';
		
		public function CheckPath($path)
		{
			$rsList = RedirectorMappingTable::getList();
			
			while($arItem = $rsList->Fetch()) {
				if(trim($arItem['FROM']) == trim($path)) {
					$this->redirectUrl = $arItem['TO'];
					
					return true;
				}
			}
 		
			return false;
		}
		
		public function GetRedirectUrl()
		{
			return $this->redirectUrl;
		}
		
		public function afterAddToRedirector()
		{
			AdminMenu::addMenuItem([
				'parent_menu' => 'global_menu_services',
				'sort' => 100,
				'url' => 'redirector_mappings.php',
				'text' => 'Переадресации',
			]);
		}
	}