<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>

<table class="empty">
  <tr>
    <td>
    <div class="vcard">
    	<div><span class="category">Организация</span> <span class="fn org">Ромашка</span></div>
        <div><b>Телефон:</b> <span class="tel">+7 (000) 000-00-00</span></div>
        <div class="adr"><b>Адрес:</b> 000000, <span class="locality">г. Солнечный</span>, <span class="street-address">просп. Романтиков, д. 21</span></div>
        <div><b>E-mail:</b> <a href="mailto:noreply@mysite.com">noreply@mysite.com</a></div>
        <div>Мы работаем <span class="workhours">ежедневно с 11:00 до 24:00</span></div>
        <span class="url"><span class="value-title" title="http://www.mysite.com"></span></span>
    </div>
    </td>
    <td align="right">
    
    <? $APPLICATION->IncludeComponent(
        "bitrix:map.yandex.view",
        "",
        Array(
            "INIT_MAP_TYPE" => "MAP",
            "MAP_DATA" => "a:3:{s:10:\"yandex_lat\";s:7:\"55.7383\";s:10:\"yandex_lon\";s:7:\"37.5946\";s:12:\"yandex_scale\";i:10;}",
            "MAP_WIDTH" => "600",
            "MAP_HEIGHT" => "300",
            "CONTROLS" => array("ZOOM", "MINIMAP", "TYPECONTROL", "SCALELINE"),
            "OPTIONS" => array("ENABLE_SCROLL_ZOOM", "ENABLE_DBLCLICK_ZOOM", "ENABLE_DRAGGING"),
            "MAP_ID" => ""
        )
    );?>
    
    </td>
  </tr>
</table>

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>