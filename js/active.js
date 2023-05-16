$(function(){
	var hf = $(location).attr('pathname');
	var links = $('#main-nav-menu .nav-link');
	links.each(function() {
		if ($(this).attr('href') == hf)
			$(this).addClass('active');
		//alert(hf + ' == ' + $(this).attr('href'));
	});
});
	
	