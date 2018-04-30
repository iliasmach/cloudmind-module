<?php
	namespace CloudMind\SEO;
	
	use CloudMind\Tools\IBaseService;
	
	class RichPreview implements IBaseService
	{
		protected $imageProperty = "PAGE_IMAGE";
		protected $titleProperty = "TITLE";
		protected $descriptionProperty = "DESCRIPTION";
		
		public function init($config) {
		
		}
	}