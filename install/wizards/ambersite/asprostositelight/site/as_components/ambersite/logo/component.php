<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arResult = array();

if ($this->StartResultCache())
{
if(CModule::IncludeModule("iblock")) :
	$dbElement = CIBlockElement::GetList(Array('SORT' => 'DESC', 'TIMESTAMP_X' => 'DESC'), Array('IBLOCK_CODE' => $arParams['IBLOCK_CODE'], 'ACTIVE' => 'Y', 'ACTIVE_DATE'=>'Y'), false, Array("nPageSize"=>1, "iNumPage"=>1), Array('ID', 'IBLOCK_ID', 'NAME', 'CODE', 'DATE_ACTIVE_FROM', 'DETAIL_PAGE_URL', 'IBLOCK_TYPE_ID', 'IBLOCK_SECTION_ID', 'PROPERTY_'.$arParams['PROP']));
		while ($arElement = $dbElement->GetNext()):

		$arResult['ID'] = $arElement['ID'];
		$img = CFile::ResizeImageGet($arElement['PROPERTY_'.$arParams['PROP'].'_VALUE'], Array('width' => 500, 'height' => 80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
		 $arResult['IMG'] = $img['src'];
		
		$arResult['EDIT_LINK'] = '/bitrix/admin/iblock_element_edit.php?IBLOCK_ID='.$arElement['IBLOCK_ID'].'&type='.$arElement['IBLOCK_TYPE_ID'].'&ID='.$arElement['ID'].'&lang=ru&find_section_section=0&bxpublic=Y';

		endwhile;
		
endif;

	$this->IncludeComponentTemplate();
}
?>