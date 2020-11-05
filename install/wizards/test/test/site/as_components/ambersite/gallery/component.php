<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arResult = array();

if ($this->StartResultCache())
{
if(CModule::IncludeModule("iblock")) :
	$dbElement = CIBlockElement::GetList(Array('SORT' => 'ASC', 'TIMESTAMP_X' => 'DESC'), Array('IBLOCK_CODE' => $arParams['IBLOCK_CODE'], 'ACTIVE' => 'Y', 'ACTIVE_DATE'=>'Y'), false, Array("nPageSize"=>1000, "iNumPage"=>1), Array('ID', 'IBLOCK_ID', 'NAME', 'CODE', 'DATE_ACTIVE_FROM', 'DETAIL_PAGE_URL', 'IBLOCK_TYPE_ID', 'IBLOCK_SECTION_ID', 'PROPERTY_'.$arParams['PROP']));
		$n=1;
		while ($arElement = $dbElement->GetNext()):
			
		$arResult['ITEMS'][$n]['ID'] = $arElement['ID'];
		$arResult['ITEMS'][$n]['NAME'] = $arElement['NAME'];
		$arResult['IBLOCK_ID'] = $arElement['IBLOCK_ID'];
		$img = CFile::ResizeImageGet($arElement['PROPERTY_'.$arParams['PROP'].'_VALUE'], Array('width' => 200, 'height' => 200), BX_RESIZE_IMAGE_EXACT, true);
		$arResult['ITEMS'][$n]['IMG'] = $img['src'];
		$imgsrc = CFile::ResizeImageGet($arElement['PROPERTY_'.$arParams['PROP'].'_VALUE'], Array('width' => 1200, 'height' => 10000), BX_RESIZE_IMAGE_PROPORTIONAL, true);
		$arResult['ITEMS'][$n]['SRC'] = $imgsrc['src'];
		
		$arResult['ITEMS'][$n]['EDIT_LINK'] = '/bitrix/admin/iblock_element_edit.php?IBLOCK_ID='.$arElement['IBLOCK_ID'].'&type='.$arElement['IBLOCK_TYPE_ID'].'&ID='.$arElement['ID'].'&lang=ru&find_section_section=0&bxpublic=Y';

		$n++;
		endwhile;
		
endif;

	$this->IncludeComponentTemplate();
}


	if(CModule::IncludeModule("iblock"))
	{
	$dbResult = CIBlockElement::GetList(Array('SORT' => 'ASC'), Array('IBLOCK_CODE' => $arParams['IBLOCK_CODE'], 'ACTIVE' => 'Y'), false, Array("nPageSize"=>1, "iNumPage"=>1), Array('ID', 'IBLOCK_ID', 'IBLOCK_SECTION_ID', 'SECTION_URL', 'LIST_PAGE_URL'));
   while ($arResult = $dbResult->GetNext())
   {
		if($USER->IsAuthorized())
		{
		
		$arReturnUrl = array(
					"add_element" => CIBlock::GetArrayByID($arResult['IBLOCK_ID'], "DETAIL_PAGE_URL"),
					"delete_element" => (
						empty($arResult["SECTION_URL"])?
						$arResult["LIST_PAGE_URL"]:
						$arResult["SECTION_URL"]
					),
				);

				$arButtons = CIBlock::GetPanelButtons(
					$arResult["IBLOCK_ID"],
					0,
					$arResult["IBLOCK_SECTION_ID"],
					Array(
						"RETURN_URL" => $arReturnUrl,
						"SECTION_BUTTONS" => false,
					)
				);

		$this->AddIncludeAreaIcons(CIBlock::GetComponentMenu($APPLICATION->GetPublicShowMode(), $arButtons));
		
		}
	}
	}
?>