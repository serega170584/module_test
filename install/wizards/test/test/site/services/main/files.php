<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if (!defined("WIZARD_SITE_ID"))
	return;

if (!defined("WIZARD_SITE_DIR"))
	return;
 
	$path = str_replace("//", "/", WIZARD_ABSOLUTE_PATH."/site/public/".LANGUAGE_ID."/"); 
	
	$handle = @opendir($path);
	if ($handle)
	{
		while ($file = readdir($handle))
		{
			if (in_array($file, array(".", "..")))
				continue; 
			/*elseif (
				is_file($path.$file) 
				&& 
				(
					($file == "index.php"  && trim(WIZARD_SITE_PATH, " /") == trim(WIZARD_SITE_ROOT_PATH, " /"))
					|| 
					($file == "_index.php" && trim(WIZARD_SITE_PATH, " /") != trim(WIZARD_SITE_ROOT_PATH, " /"))
				)
			)
				continue;*/ 

			CopyDirFiles(
				$path.$file,
				WIZARD_SITE_PATH."/".$file,
				$rewrite = false, 
				$recursive = true,
				$delete_after_copy = false
			);
		}
		//CModule::IncludeModule("search");
		//CSearch::ReIndexAll(false, 0, Array(WIZARD_SITE_ID, WIZARD_SITE_DIR));
	}

	WizardServices::PatchHtaccess(WIZARD_SITE_PATH);

	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/inc/main.php", array("TEMPLATE" => WIZARD_TEMPLATE_ID."_".WIZARD_THEME_ID));
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/about/index.php", array("TEMPLATE" => WIZARD_TEMPLATE_ID."_".WIZARD_THEME_ID));
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/services/index.php", array("TEMPLATE" => WIZARD_TEMPLATE_ID."_".WIZARD_THEME_ID));
	
	//WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."catalog/", array("SITE_DIR" => WIZARD_SITE_DIR));
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/.top.menu.php", array("SITE_DIR" => WIZARD_SITE_DIR));
	
	$arUrlRewrite = array(); 
	if (file_exists(WIZARD_SITE_ROOT_PATH."/urlrewrite.php"))
	{
		include(WIZARD_SITE_ROOT_PATH."/urlrewrite.php");
	}
	$arNewUrlRewrite = array(
		array(
			"CONDITION" => "#^".WIZARD_SITE_DIR."news/([A-Za-z0-9_]+)/(.*)#",
			"RULE" => "code=\$1",
			"ID" => "",
			"PATH" => WIZARD_SITE_DIR."news/detail.php",
		),
		array(
			"CONDITION" => "#^".WIZARD_SITE_DIR."catalog/#",
			"RULE" => "",
			"ID" => "bitrix:catalog",
			"PATH" => WIZARD_SITE_DIR."catalog/index.php",
		),
	); 
		
	foreach ($arNewUrlRewrite as $arUrl)
	{
		if (!in_array($arUrl, $arUrlRewrite))
		{
			CUrlRewriter::Add($arUrl);
		}
	}

function ___writeToAreasFile($fn, $text)
{
	if(file_exists($fn) && !is_writable($abs_path) && defined("BX_FILE_PERMISSIONS"))
		@chmod($abs_path, BX_FILE_PERMISSIONS);

	$fd = @fopen($fn, "wb");
	if(!$fd)
		return false;

	if(false === fwrite($fd, $text))
	{
		fclose($fd);
		return false;
	}

	fclose($fd);

	if(defined("BX_FILE_PERMISSIONS"))
		@chmod($fn, BX_FILE_PERMISSIONS);
}
?>