<?php
	require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_before.php");
	require_once($_SERVER["DOCUMENT_ROOT"] . BX_ROOT . "/modules/main/include/prolog_admin.php");
	
	global $APPLICATION;
	
	$APPLICATION->SetTitle("Переадресации");
	
	use CloudMind\Redirector\RedirectorMappingTable;
	
	$rsList = RedirectorMappingTable::getList();
	$arItems = [];
	while ($arItem = $rsList->Fetch()) {
		$arItems[] = $arItem;
	}
	
	if (isset($_POST['ACTION']) && $_POST['ACTION'] == 'SAVE') {
		$arIds = [];
		
		foreach ($_POST['FROM'] as $index => $from) {
			if (!isset($_POST['TO'][$index]) || !isset($_POST['ID'][$index])) {
				continue;
			}
			
			$id = $_POST['ID'][$index];
			
			$isNew = $id == -1;
			
			$to = $_POST['TO'][$index];
			
			if (trim($from) == '' || trim($to) == '') {
				continue;
			}
			
			$arFields = [
				'FROM'   => $from,
				'TO'     => $to,
				'ACTIVE' => 'Y',
			];
			
			if ($isNew) {
				$result = RedirectorMappingTable::add($arFields);
			} else {
				$arIds[] = $id;
				$result = RedirectorMappingTable::update($id, $arFields);
			}
		}
		
		if(!empty($_POST['DELETE'])) {
			$toDelete = json_decode($_POST['DELETE']);
			
			foreach ($toDelete as $deleteID) {
				$deleteID = intval($deleteID);
				
				if($deleteID < 1) {
					continue;
				}
				
				echo $deleteID;
				
				RedirectorMappingTable::delete($deleteID);
			}
		}
		
		LocalRedirect("/bitrix/admin/redirector_mappings.php");
	}

?>
	<script>
        let redirect_data = <?=json_encode($arItems)?>;
	</script>
	
	<link rel="stylesheet" href="/local/modules/cloudmind.main/assets/css/redirect_mapping.css"/>
	<script src="/local/modules/cloudmind.main/vendor/jquery/jquery-3.3.1.min.js"></script>
	<script src="/local/modules/cloudmind.main/vendor/react/react.development.js"></script>
	<script src="/local/modules/cloudmind.main/vendor/react/react-dom.development.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
	<script type='text/babel' src="/local/modules/cloudmind.main/assets/js/redirect_mapping.js"
	        charset='utf-8'></script>
	
	<link rel="stylesheet" href="/local/modules/cloudmind.main/assets/css/redirect_mapping.css">
	
	<div id="RedirectMappings">
		<RedirectMappings/>
	</div>


<?
	require($_SERVER["DOCUMENT_ROOT"] . BX_ROOT . "/modules/main/include/epilog_admin.php");