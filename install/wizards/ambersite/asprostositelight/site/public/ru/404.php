<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("404 Not Found");
CHTTP::SetStatus("404 Not Found");
?>

<p>Страница не найдена 404 Not Found</p>

<p>Если вы вводили адрес вручную в адресной строке браузера, проверьте, всё ли вы написали правильно.</p>

<p>Если вы перешли по ссылке с другого сайта, попробуйте перейти на первую страницу и найти нужный вам материал там.</p>

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>