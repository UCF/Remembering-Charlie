$(function(){

	/**************************************************************************\
		IE css fixes
	\**************************************************************************/
	if(jQuery.browser.name === 'msie'){
		$('#wrap').addClass('ie');
		var str = 'ie' + jQuery.browser.versionX;
		$('#wrap').addClass(str);
	}
	
});