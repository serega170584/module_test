<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();     
IncludeTemplateLangFile(__FILE__);     
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<?   
    $APPLICATION->ShowHead(); 
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery-2.1.3.min.js'); 
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/colors.css'); 
	if ($USER->IsAdmin()) $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/panel.js');       
    ?>
<title><? $APPLICATION->ShowTitle()?></title>

</head>

<body>
	<div id="header">
    <? if ($USER->IsAdmin()):?><div id="panel"><? $APPLICATION->ShowPanel(); $APPLICATION->ShowPanel = true;?></div><? endif;?>
    <div id="headerin">
    	<div id="toplogo">
            <a href="<?=SITE_DIR?>"><? $APPLICATION->IncludeFile(SITE_DIR."inc/logo.php", Array(), Array("MODE" =>"php"));?></a>
        </div>
        <div id="topmenu">
        <div id="slogan"><? $APPLICATION->IncludeFile(SITE_DIR."inc/slogan.txt", Array(), Array("MODE" =>"text"));?></div>
        <div id="topmenuin">
        	<? $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "ambersite_top",
                Array(
                    "ROOT_MENU_TYPE" => "top",
                    "MENU_CACHE_TYPE" => "N",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "MENU_CACHE_GET_VARS" => array(""),
                    "MAX_LEVEL" => "1",
                    "CHILD_MENU_TYPE" => "left",
                    "USE_EXT" => "N",
                    "DELAY" => "N",
                    "ALLOW_MULTI_SELECT" => "N"
                )
            );?>
        </div>
        </div>
        <div id="topphone"><? $APPLICATION->IncludeFile(SITE_DIR."inc/phone.txt", Array(), Array("MODE" =>"text"));?></div>
    </div>
    </div>
    
    <div id="body">
    	<div id="workarea">
        
        <? if(CSite::InDir(SITE_DIR.'index.php')) { $APPLICATION->IncludeComponent(
			"ambersite:slider", 
			".default", 
			array(
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "360000",
				"IBLOCK_CODE" => "#SLIDER_CODE#",
				"PROP" => "AS_SLIDER_FILE",
				"LINK" => "AS_SLIDER_LINK"
			),
			false
		);}?>
		
        <h1><? $APPLICATION->ShowTitle()?></h1>