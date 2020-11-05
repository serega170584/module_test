<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Заголовок главной страницы");
?>

<? $APPLICATION->IncludeFile(SITE_DIR."inc/main.php", Array(), Array("MODE" =>"html"));?>

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>