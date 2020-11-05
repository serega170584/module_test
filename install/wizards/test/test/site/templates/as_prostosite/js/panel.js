function inpanel() {
	var $paddtop = $('#panel').height() + 120;
	//alert($paddtop);
	$('#workarea').css('paddingTop', $paddtop);
}
$( document ).ready(function() { inpanel(); $('#bx-panel-expander, #bx-panel-hider').click( function () { inpanel(); } ); });