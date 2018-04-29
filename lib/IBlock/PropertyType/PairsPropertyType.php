<?php
	
	namespace CloudMind\IBlock\PropertyType;
	
	use CloudMind\IBlock\BasePropertyType;
	use \Bitrix\Main\Page\Asset;
	
	class PairsPropertyType extends BasePropertyType
	{
		public static $property_type = 'S';
		public static $user_type = 'CM_PAIRS';
		public static $description = '';
		
		
		public static function ConvertToDB($arProperty, $value) {
			return json_encode($value);
		}
		
		public static function GetPropertyFieldHtml($arProperty, $arValue, $strHTMLControlName) {
			$strResult = '';
			
			return $strResult;
		}
		
		public static function GetAdminListViewHTML() {
		
		}
		
		public static function GetPublicViewHTML() { }
		
		public static function GetPublicEditHTML() { }
		
		public static function GetPublicFilterHTML() { }
		
		public static function GetAdminFilterHTML() { }
		
		public static function GetSettingsHTML() { }
		
		public static function PrepareSettings() { }
	}