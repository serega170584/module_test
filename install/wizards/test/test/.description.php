<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arWizardDescription = Array(
    "NAME" => GetMessage("NAME"), 
    "DESCRIPTION" => GetMessage("DESCRIPTION"), 
    "VERSION" => "1.0.0",
	"START_TYPE" => "WINDOW",
	"WIZARD_TYPE" => "INSTALL",
    "DEPENDENCIES" => Array( 
        "main" => "12.0.0",
    ),

    "TEMPLATES" => Array(
		Array("SCRIPT" => "wizard_sol")
	),

	"STEPS" => Array("SelectSiteStep", "SelectTemplateStep", "SelectThemeStep", "SiteSettingsStep", "DataInstallStep", "FinishStep")
);

?>