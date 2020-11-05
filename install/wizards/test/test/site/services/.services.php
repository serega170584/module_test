<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__); 

$arServices = Array(
	"main" => Array(
		"NAME" => GetMessage("NAME1"),
		"STAGES" => Array(
			"files.php",
			"template.php",
			"theme.php",
			"components.php",
			"settings.php",
		),
	),
	
	"iblock" => Array(
		"NAME" => GetMessage("NAME2"),
		"STAGES" => Array(
			"types.php",
			"slider.php",
			"gallery.php"
		),
	),
);
?>