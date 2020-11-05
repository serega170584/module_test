<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<? if($arResult): $this->AddEditAction($arResult['ID'], $arResult['EDIT_LINK'], GetMessage("EDIT"), Array("WINDOW" => array("width"=>500, "height"=>500), "ICON" => "", "SRC" => ""));?>

<a href="<?=SITE_DIR?>" id="<?=$this->GetEditAreaId($arResult['ID']);?>"><img src="<?=$arResult['IMG']?>" /></a>

<? endif;?>