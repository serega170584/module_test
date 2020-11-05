<? 
global $MESS; 
$strPath2Lang = str_replace('\\', '/', __FILE__); 
$strPath2Lang = substr($strPath2Lang, 0, strlen($strPath2Lang)-strlen("/install/index.php")); 
include(GetLangFileName($strPath2Lang."/lang/", "/install/index.php")); 

Class ambersite_prostositelight extends CModule 
{ 
var $MODULE_ID = "test.test";
var $MODULE_VERSION; 
var $MODULE_VERSION_DATE; 
var $MODULE_NAME; 
var $MODULE_DESCRIPTION; 
var $MODULE_CSS; 
var $PARTNER_NAME; 
var $PARTNER_URI; 

    function ambersite_prostositelight() 
    { 
    $arModuleVersion = array(); 
     
    $path = str_replace("\\", "/", __FILE__); 
    $path = substr($path, 0, strlen($path) - strlen("/index.php")); 
    include($path."/version.php"); 
     
    if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion)) 
        { 
        $this->MODULE_VERSION = $arModuleVersion["VERSION"]; 
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"]; 
        } 
     
    $this->MODULE_NAME = GetMessage("ambersite_prostositelight_MODULE_NAME"); 
    $this->MODULE_DESCRIPTION = GetMessage("ambersite_prostositelight_MODULE_DESC"); 
    $this->PARTNER_NAME = GetMessage("ambersite_prostositelight_PARTNER_NAME"); 
    $this->PARTNER_URI = GetMessage("ambersite_prostositelight_PARTNER_URI"); 
    } 
     
    function InstallDB() 
    { 
        RegisterModule($this->MODULE_ID); 
        UnRegisterModuleDependences("main", "OnEndBufferContent", "ambersite.prostositelight", "ambersite_prostositelight", "ambersite_prostositelight"); 
        RegisterModuleDependences("main", "OnEndBufferContent", "ambersite.prostositelight", "ambersite_prostositelight", "ambersite_prostositelight", "10");
        return true; 
    } 
     
    function UnInstallDB() 
    { 
        COption::RemoveOption($this->MODULE_ID); 
        UnRegisterModuleDependences("main", "OnEndBufferContent", "ambersite.prostositelight", "ambersite_prostositelight", "ambersite_prostositelight"); 
        UnRegisterModule($this->MODULE_ID);         
        return true; 
    } 

    function DoInstall() 
    { 
        global $DOCUMENT_ROOT, $APPLICATION, $DB; 
        $this->InstallDB(); 
		$APPLICATION->IncludeAdminFile(GetMessage("ambersite_prostositelight_INSTALL_TITLE"), $DOCUMENT_ROOT."/bitrix/modules/".$this->MODULE_ID."/install/step.php");
        //LocalRedirect("/bitrix/admin/wizard_install.php?lang=ru&wizardName=ambersite.prostositelight:ambersite:asprostositelight&".bitrix_sessid_get()); 
    } 

    function DoUninstall() 
    { 
        global $DOCUMENT_ROOT, $APPLICATION, $DB; 
        $this->UnInstallDB(); 
    } 
} 
?>