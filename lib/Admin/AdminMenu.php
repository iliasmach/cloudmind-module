<?php
	
	namespace CloudMind\Admin;

	class AdminMenuItem {
		protected $parentMenu = '';
	}
	
	class AdminMenu
	{
		protected static $_arMenu = [];
		
		public static function getMenu()
		{
			return self::$_arMenu;
		}
		
		/**
		 * @param $arMenuItem
		 */
		public static function addMenuItem($arMenuItem)
		{
			self::$_arMenu[] = $arMenuItem;
		}
		
		/**
		 * @param $parent
		 * @param $name
		 * @param $url
		 */
		public static function addMenuItemEx($parent, $name, $url) {
			$arNewItem = [
			
			];
			
			self::$_arMenu = $arNewItem;
		}
	}