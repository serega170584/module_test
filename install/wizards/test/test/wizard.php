<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/install/wizard_sol/wizard.php");

class SelectSiteStep extends CSelectSiteWizardStep
{
	function InitStep()
	{
		parent::InitStep();
		$wizard =& $this->GetWizard();
		$wizard->solutionName = "asprostositelight";
	}
}

class SelectTemplateStep extends CSelectTemplateWizardStep {
}

class SelectThemeStep extends CSelectThemeWizardStep {
}

class SiteSettingsStep extends CSiteSettingsWizardStep
{
	function InitStep()
	{
		$wizard =& $this->GetWizard();
		$wizard->solutionName = "asprostositelight";
		parent::InitStep();
		$this->SetTitle(GetMessage("READYTITLE"));
	}
	
	function OnPostForm()
	{
		$wizard =& $this->GetWizard();
	}
	
	function ShowStep() {
    	$this->content .= "<div style='padding-left:10px;'>".GetMessage("READYTEXT")."</div>";
    }
}

class DataInstallStep extends CDataInstallWizardStep
{
}

class FinishStep extends CFinishWizardStep
{
	function InitStep()
	{
		parent::InitStep();
		$this->SetStepID("finish");
		$this->SetNextStep("finish");
	}
}
?>