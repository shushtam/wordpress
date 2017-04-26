jQuery(window).ready(function($) {

	// Responsive menu open/close
	$('.responsive_menu_icon').click(function() {
		if($(this).hasClass('opened')) {

			// Update button
			$(this).removeClass('opened');

			// Close menu
			$('.default-navigation .nav').hide();
		} else {
			$(this).addClass('opened');
			$('.default-navigation .nav').show();
		}
	});

	$(window).resize(function() {
		if($(window).width() >= 992 ) {
			$('.default-navigation .nav').show();
		}
	});

	// Responsive drop-down menu
	$('li.menu-item-has-children').click(function(e) {
		 e.stopPropagation();
		if($(this).hasClass('opened')) {
			$(this).removeClass('opened');
		} else {
			$(this).addClass('opened');
		}
	});

});