<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<? if($arResult['ITEMS']):?>
<ul class="bxslider">
<? foreach ($arResult['ITEMS'] as $n=>$arItem):
$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], GetMessage("EDIT"), Array("WINDOW" => array("width"=>500, "height"=>500), "ICON" => "", "SRC" => ""));?>
	<? if($arItem['LINK']):?>
	<li id="<?=$this->GetEditAreaId($arItem['ID']);?>"><a href="<?=$arItem['LINK']?>"><img src="<?=$arItem['IMG']?>" /></a></li>
    <? else:?>
    <li id="<?=$this->GetEditAreaId($arItem['ID']);?>"><img src="<?=$arItem['IMG']?>" /></li>
    <? endif;?>
<? endforeach;?>
</ul>
<? endif;?>