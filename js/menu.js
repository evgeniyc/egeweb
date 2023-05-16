$(function() {
	var $menu_popup = $('#main-nav-menu');
	
	$("#toggler").click(function(){
		$menu_popup.slideToggle(300, function(){
			if (!$menu_popup.hasClass('d-none')) {
				$menu_popup.addClass('d-none');
				$menu_popup.removeClass('d-block');
			} else {
				$menu_popup.removeClass('d-none');
				$menu_popup.addClass('d-block');
			}					
		});  
		return false;
	});			
	/*
	$(document).on('click', function(e){
		if (!$(e.target).closest('.menu').length){
			$('body').removeClass('body_pointer');
			$menu_popup.slideUp(300);
		}
	});
	*/
});

