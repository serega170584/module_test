<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Фотогалерея");
?>

<? $APPLICATION->IncludeComponent("ambersite:gallery", "", array(   
	"CACHE_TYPE" => "A",   
	"CACHE_TIME" => "360000",   
	"IBLOCK_CODE" => "#GALL_CODE#", 
	"PROP" => "AS_GAL_PICT" 
	) 
);?>

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>