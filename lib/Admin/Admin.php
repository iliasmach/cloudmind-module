<?php
	/**
	 * Created by PhpStorm.
	 * User: ilasmahianov
	 * Date: 03.03.2018
	 * Time: 16:15
	 */
	
	namespace CloudMind\Admin;
	
	use \Bitrix\Main\Page\Asset;
	
	class Admin
	{
		public static function enableReact() {
			Asset::addJs();
		}
	}