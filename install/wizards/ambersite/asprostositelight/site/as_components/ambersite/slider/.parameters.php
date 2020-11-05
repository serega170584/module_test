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
		 "DEFAULT" => 'as_slider',
	  ),
	  "PROP" => array(
		 "PARENT" => "GROUP1",
		 "NAME" => GetMessage("PAR2NAME"),
		 "TYPE" => "STRING",
		 "DEFAULT" => 'AS_SLIDER_FILE',
	  ),
	  "LINK" => array(
		 "PARENT" => "GROUP1",
		 "NAME" => GetMessage("PAR3NAME"),
		 "TYPE" => "STRING",
		 "DEFAULT" => 'AS_SLIDER_LINK',
	  ),
	  
	  "CACHE_TIME" => array("DEFAULT" => '360000',),
   )
);
	
?>