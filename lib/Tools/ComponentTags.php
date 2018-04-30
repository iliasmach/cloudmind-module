<?php
	/**
	 * Created by PhpStorm.
	 * User: ilasmahianov
	 * Date: 29.04.2018
	 * Time: 18:32
	 */
	
	namespace CloudMind\Tools;
	
	//TODO Добавить наборы настроек для компонентов
	//TODO Добавить обработку тэгов для включаемых областей
	//TODO Доавбить обработку тэгов для настроек
	
	/**
	 * Class ComponentTags
	 * @package CloudMind\Tools
	 */
	class ComponentTags implements IBaseService
	{
		protected static $cache = [];
	
		public function init($config) {
		
		}
		
		public static function OnEndBuffer(&$content) {
			global $APPLICATION;
			
			if(strpos($APPLICATION->GetCurUri(), "/bitrix/admin") === 0) {
				return;
			}
			
			self::execute($content);
		}
		
		public static function execute(&$content, $openingTag = '\[\[', $closingTag = '\]\]')
		{
			global $APPLICATION;
			
			$content = trim($content);
			$openingTag = trim($openingTag);
			$closingTag = trim($closingTag);
			if ($content != "" && $openingTag != "" && $closingTag != "") {
				$firstChar = substr($closingTag, 0, 1);
				if ($firstChar == "\\") {
					$firstChar = substr($closingTag, 1, 1);
				}
				
				$regExp = "/" . $openingTag . '([^' . $firstChar . ']+)' . $closingTag . "/";
				
				preg_match_all($regExp, $content, $out);
				
				if (isset($out[1]) && !empty($out[1]) && is_array($out[1])) {
					foreach ($out[1] as $index => $tag) {
						//echo $tag;
						$componentName = "";
						$params = [];
						$template = "";
						if (strpos($tag, '?') !== false) {
							$parts = explode("?", $tag);
							$componentName = $parts[0];
							parse_str($parts[1], $params);
						} else {
							$componentName = $tag;
						}
						
						if(isset($params['COMPONENT_TEMPLATE'])) {
							$template = $params['COMPONENT_TEMPLATE'];
						}
						
						ob_start();
						$APPLICATION->IncludeComponent($componentName, $template, $params);
						$componentResult = ob_get_clean();
						
						
						self::$cache[$out[0][$index]] = $componentResult;
					}
					
					$content = str_replace(array_keys(self::$cache), array_values(self::$cache), $content);
				}
				
				//	print_r($out);
			}
			
			return $content;
		}
	}