<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
	return;
	
$arComponentParameters = array(
   "GROUPS" => array(
	  "GROUP1" => array(
		 "NAME" => GetMessage("GROUPNAME")
	  )
   ),
   "PARAMETERS" => array(
	  "IBLOCK_CODE" => array(
		 "PARENT" => "GROUP1",
		 "NAME" => GetMessage("PAR1NAME"),
		 "TYPE" => "STRING",
		 "DEFAULT" => 'as_logo',
	  ),
	  "PROP" => array(
		 "PARENT" => "GROUP1",
		 "NAME" => GetMessage("PAR2NAME"),
		 "TYPE" => "STRING",
		 "DEFAULT" => 'AS_LOGO_FILE',
	  ),
	  
	  "CACHE_TIME" => array("DEFAULT" => '360000',),
   )
);
	
?>