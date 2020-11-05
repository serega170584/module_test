<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if(!CModule::IncludeModule("iblock"))
	return;

$arTypes = Array(
	Array(
		"ID" => "as_content_".WIZARD_SITE_ID,
		"SECTIONS" => "N",
		"IN_RSS" => "N",
		"SORT" => 100,
		"LANG" => Array("ru" => array("NAME"=>GetMessage("NAMECONTENT")), "en" => array("NAME"=>"Content")),
	)
);

$iblockType = new CIBlockType;
foreach($arTypes as $arType)
{
	$dbType = CIBlockType::GetList(Array(),Array("=ID" => $arType["ID"]));
	if($dbType->Fetch())
		continue;

	$iblockType->Add($arType);
}
?>