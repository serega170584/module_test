<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
IncludeTemplateLangFile(__FILE__); 
?>
        </div>
    </div>
    
    <div id="footer">
    <div id="footerin">
    	<div id="footerinin">
        	<div id="fleft"><? $APPLICATION->IncludeFile(SITE_DIR."inc/copy.php", Array(), Array("MODE" =>"php"));?></div>
            <div id="fright"><div id="bx-composite-banner"></div><?=GetMessage("SOZDANIE")?> - <a href="http://ambersite.pro" target="_blank">AmberSite</a></div>
        </div>
    </div>
    </div>
</body>
</html>