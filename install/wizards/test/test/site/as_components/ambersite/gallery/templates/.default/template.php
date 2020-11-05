<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<? if($arResult['ITEMS']):?>
<div id="as_gallery">
<? foreach ($arResult['ITEMS'] as $n=>$arItem):
$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], GetMessage("EDIT"), Array("WINDOW" => array("width"=>500, "height"=>500), "ICON" => "", "SRC" => ""));?><a class="fancybox" rel="as_gal" href="<?=$arItem['SRC']?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>"><img src="<?=$arItem['IMG']?>" /></a><? endforeach;?>
</div>
<? endif;?>