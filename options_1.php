<?php
	global $APPLICATION;
	
	/**
	 * Файл, который подключается в пункте "Настройки > Настройки модулей > Cloud Mind
	 */
?>
<form action="<?= $APPLICATION->GetCurPage() ?>" method="POST">
	<?php
		echo bitrix_sessid_post();
		$aTabs = [
			["DIV" => "edit1", "TAB" => 'Сайт', "ICON" => "form_settings", "TITLE" => "Основные параметры"],
		];
		
		$tabControl = new CAdminTabControl("tabControl", $aTabs);
		
		$tabControl->Begin();
		
		$tabControl->BeginNextTab();
		
		require "view/option/Tab1.php";
		
		$tabControl->Buttons();
		
		require "view/option/Buttons.php";
		
		$tabControl->End();
	?>

</form>