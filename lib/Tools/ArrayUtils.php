<?php
	
	namespace CloudMind\Tools;
	
	/**
	 * Class ArrayUtils
	 * @package CloudMind\Tools
	 */
	class ArrayUtils
	{
		public static function CheckArray($array, $canBeEmpty = true) {
			if(!is_array($array)) {
				throw new \InvalidArgumentException("This is not array");
			}
			
			if(!$canBeEmpty && empty($array)) {
				throw new \InvalidArgumentException("Empty Array");
			}
			
			return true;
		}
		
		/**
		 * @param array $array
		 * @return mixed
		 */
		public static function getFirstElement(Array $array) {
			static::CheckArray($array);
			
			foreach ($array as $key => $value) {
				return $value;
			}
		}
		
		/**
		 * @param array $array
		 * @return int|string
		 */
		public static function getFirstKey(Array $array) {
			static::CheckArray($array);
			
			foreach ($array as $key => $value) {
				return $key;
			}
		}
	}