<?php
	
	namespace CloudMind\Redirector;
	
	use Bitrix\Main\Entity;
	
	/**
	 * Class RedirectorMapping
	 * @package CloudMind\Redirector
	 */
	class RedirectorMappingTable extends Entity\DataManager
	{
		/**
		 * @return string название таблицы в БД, с которой связана данная сущность
		 */
		public static function getTableName() {
			return 'RedirectorMappings';
		}
		
		/**
		 * @return array
		 */
		public static function getMap() {
			return [
				new Entity\IntegerField("ID", [
					'primary' => true,
					'autocomplete' => true
				]),
				new Entity\StringField("FROM", [
					"required" => true,
					'column_name' => 'FROM'
				]),
				new Entity\StringField("TO", [
					'required' => true,
					'column_name' => 'TO'
				]),
				new Entity\BooleanField("ACTIVE", [
					'values' => ['N', 'Y'],
				])
			];
		}
	}