<?php
	
	namespace CloudMind\IBlock;
	
	/**
	 * Класс для описания типа свойства инфоблока.
	 *
	 * Class BasePropertyType
	 * @package CloudMind\IBlock
	 */
	abstract class BasePropertyType
	{
		protected static $property_type = 'S';
		protected static $user_type = "";
		protected static $description = '';
		
		abstract public static function ConvertToDB($arProperty, $value);
		
		abstract public static function GetPropertyFieldHtml($arProperty, $arValue, $strHTMLControlName);
		
		abstract public static function GetAdminListViewHTML();
		
		abstract public static function GetPublicViewHTML();
		
		abstract public static function GetPublicEditHTML();
		
		abstract public static function GetPublicFilterHTML();
		
		abstract public static function GetAdminFilterHTML();
		
		abstract public static function GetSettingsHTML();
		
		abstract public static function PrepareSettings();
		
		public static function GetUserTypeDescription()
		{
			return [
				'PROPERTY_TYPE'        => static::$property_type,
				'USER_TYPE'            => static::$user_type,
				'DESCRIPTION'          => static::$description,
				'ConvertToDB'          => [__CLASS__, 'ConvertToDB'],
				'GetPropertyFieldHtml' => [__CLASS__, 'GetPropertyFieldHtml'],
				'GetAdminListViewHTML' => [__CLASS__, 'GetAdminListViewHTML'],
				'GetPublicViewHTML'    => [__CLASS__, 'GetPublicViewHTML'],
				'GetPublicEditHTML'    => [__CLASS__, 'GetPublicEditHTML'],
				'GetPublicFilterHTML'  => [__CLASS__, 'GetPublicFilterHTML'],
				'GetAdminFilterHTML'   => [__CLASS__, 'GetAdminFilterHTML'],
				'GetSettingsHTML'      => [__CLASS__, 'GetSettingsHTML'],
				'PrepareSettings'      => [__CLASS__, 'PrepareSettings'],
			];
		}
		
		public static function RegisterPropertyType()
		{
		
		}
	}