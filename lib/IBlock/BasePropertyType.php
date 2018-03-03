<?php
	/**
	 * Created by PhpStorm.
	 * User: ilasmahianov
	 * Date: 02.03.2018
	 * Time: 17:38
	 */
	
	namespace CloudMind\IBlock;
	
	/**
	 * Класс для описания типа свойства инфоблока.
	 *
	 * Class BasePropertyType
	 * @package CloudMind\IBlock
	 */
	abstract class BasePropertyType
	{
		public static $arProperties  = [
		
				'PROPERTY_TYPE'        => 'S',
				'USER_TYPE'            => 'CM_TREE_EDITOR',
				'DESCRIPTION'          => "Редактор дерева",
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
		
		abstract public static function ConvertToDB();
		abstract public static function GetPropertyFieldHtml();
		abstract public static function GetAdminListViewHTML();
		abstract public static function GetPublicViewHTML();
		abstract public static function GetPublicEditHTML();
		abstract public static function GetPublicFilterHTML();
		abstract public static function GetAdminFilterHTML();
		abstract public static function GetSettingsHTML();
		abstract public static function PrepareSettings();
		
		public static function GetUserTypeDescription() {
			return static::$arProperties;
		}
		
		public static function RegisterPropertyType() {
		
		}
	}