<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if(!CModule::IncludeModule("iblock"))
	return;

$iblockXMLFile = WIZARD_SERVICE_RELATIVE_PATH."/xml/".LANGUAGE_ID."/news.xml"; 
$iblockCode = "as_news_".WIZARD_SITE_ID; 
$iblockType = "as_content_".WIZARD_SITE_ID; 

$rsIBlock = CIBlock::GetList(array(), array("CODE" => $iblockCode, "TYPE" => $iblockType));
$iblockID = false; 
if ($arIBlock = $rsIBlock->Fetch())
{
	$iblockID = $arIBlock["ID"]; 
	if (WIZARD_REINSTALL_DATA)
	{
		CIBlock::Delete($arIBlock["ID"]); 
		$iblockID = false; 
	}
}

if($iblockID == false)
{
	$permissions = Array(
			"1" => "X",
			"2" => "R"
		);
	$iblockID = WizardServices::ImportIBlockFromXML(
		$iblockXMLFile,
		$iblockCode,
		$iblockType,
		WIZARD_SITE_ID,
		$permissions
	);

	if ($iblockID < 1)
		return;	
	
	//IBlock fields
	$iblock = new CIBlock;
	$arFields = Array(
		"ACTIVE" => "Y",
		"FIELDS" => array ( 'IBLOCK_SECTION' => array ( 'IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '', ), 'ACTIVE' => array ( 'IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'Y', ), 'ACTIVE_FROM' => array ( 'IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '=today', ), 'ACTIVE_TO' => array ( 'IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '', ), 'SORT' => array ( 'IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '', ), 'NAME' => array ( 'IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => '', ), 'PREVIEW_PICTURE' => array ( 'IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => array ( 'FROM_DETAIL' => 'Y', 'SCALE' => 'Y', 'WIDTH' => '200', 'HEIGHT' => '', 'IGNORE_ERRORS' => 'N', 'DELETE_WITH_DETAIL' => 'Y', 'UPDATE_WITH_DETAIL' => 'Y' ), ), 'PREVIEW_TEXT_TYPE' => array ( 'IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'text', ), 'PREVIEW_TEXT' => array ( 'IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '', ), 'DETAIL_PICTURE' => array ( 'IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => array ( 'SCALE' => 'Y', 'WIDTH' => '400', 'HEIGHT' => '', 'IGNORE_ERRORS' => 'N', ), ), 'DETAIL_TEXT_TYPE' => array ( 'IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'text', ), 'DETAIL_TEXT' => array ( 'IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '', ), 'XML_ID' => array ( 'IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '', ), 'CODE' => array ( 'IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => array( 'UNIQUE' => 'Y', 'TRANSLITERATION' => 'Y', 'TRANS_SPACE' => '_', 'TRANS_CASE' => 'L', 'TRANS_OTHER' => '_' ), ), 'TAGS' => array ( 'IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '', ), ), 
		"CODE" => $iblockCode, 
		"XML_ID" => $iblockCode,
		"NAME" => $iblock->GetArrayByID($iblockID, "NAME"),
	);
	
	$iblock->Update($iblockID, $arFields);
}
else
{
	$arSites = array(); 
	$db_res = CIBlock::GetSite($iblockID);
	while ($res = $db_res->Fetch())
		$arSites[] = $res["LID"]; 
	if (!in_array(WIZARD_SITE_ID, $arSites))
	{
		$arSites[] = WIZARD_SITE_ID;
		$iblock = new CIBlock;
		$iblock->Update($iblockID, array("LID" => $arSites));
	}
}

//Column settings
$arColumns = array("NAME", "ACTIVE", "DATE_ACTIVE_FROM", "USER_NAME");
$arListFields = array(
   "columns" => implode(",", $arColumns),
   "by" => "id",
   "order" => "desc",
   "page_size" => "20",
   );
$sTableID = "tbl_iblock_list_".md5($iblockType.".".$iblockID);
$rez1 = CUserOptions::SetOption("list", $sTableID, $arListFields, $bCommon=true, $userId=false);
if (!$rez1) {echo "Error column settings | "; die();}


//Form settings
      $arFormSettings = array(
         array(
            array("edit1", GetMessage("NOVOST")),
			array("NAME", GetMessage("NAZVANIE")),
            array("CODE", GetMessage("SIMVKOD")),
			array("IBLOCK_ELEMENT_PROP_VALUE", GetMessage("AKTIVNGR")),
            array("ACTIVE", GetMessage("AKTIVN")),
			array("ACTIVE_FROM", GetMessage("NACHAKT")),
            array("ACTIVE_TO", GetMessage("OKONCHAKT")),
         ),
         array(
            array("edit2", GetMessage("ANONS")),
            array("PREVIEW_TEXT", GetMessage("TEXTANONSA")),
         ),
         array(
            array("edit3", GetMessage("PODROBNO")),
			array("DETAIL_PICTURE", GetMessage("IZOBR")),
            array("DETAIL_TEXT", GetMessage("DETOPISANIE")),
         ),
         array(
            array("edit4", "SEO"), 
			array("IPROPERTY_TEMPLATES_ELEMENT_META_TITLE", GetMessage("SHMT")),
			array("IPROPERTY_TEMPLATES_ELEMENT_META_KEYWORDS", GetMessage("SHMK")),
			array("IPROPERTY_TEMPLATES_ELEMENT_META_DESCRIPTION", GetMessage("SHMD")),
         ),
      );

      //Serialise
      $arFormFields = array();
      foreach ($arFormSettings as $key => $arFormFields)
      {
         $arFormItems = array();
         foreach ($arFormFields as $strFormItem)
            $arFormItems[] = implode('--#--', $strFormItem);

         $arStrFields[] = implode('--,--', $arFormItems);
      }
      $arSettings = array("tabs" => implode('--;--', $arStrFields));

      $rez2 = CUserOptions::SetOption("form", "form_element_".$iblockID, $arSettings, $bCommon=true, $userId=false);
      if (!$rez2) {echo "Error form settings | "; die();}


CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/news/index.php", array("NEWS_IBLOCK_ID" => $iblockID));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/news/detail.php", array("NEWS_IBLOCK_ID" => $iblockID));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/news/index.php", array("NEWS_IBLOCK_TYPE" => $iblockType));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/news/detail.php", array("NEWS_IBLOCK_TYPE" => $iblockType));
?>
