<?php
	/**
	 * Created by PhpStorm.
	 * User: ilasmahianov
	 * Date: 03.03.2018
	 * Time: 12:06
	 */
	
	namespace CloudMind\Tools;
	
	
	abstract class Singleton
	{
		/**
		 * @return Singleton
		 */
		
		final public static function getInstance()
		{
			static $instance = null;
			
			if (null === $instance)
			{
				$instance = new static();
			}
			
			return $instance;
		}
		
		final protected function __clone() {}
		
		protected function __construct() {}
	}