/* common javascript */

$ = jQuery.noConflict();

(function() {
	function setup_navmenu() {
		$('#nav_button').bind('click ontouchstart', function(e) {
			e.preventDefault();
			e.stopPropagation();
			$('nav').toggleClass('visible');
		});

		$('body').bind('click ontouchstart', function(e) {
			$('nav').removeClass('visible');
		});
	}

	function resize_home_images() {
		var newHeight = $(window).height() - $('header').height() - $('footer').height() - 60;
		$('.post-image img').css({
			maxHeight: newHeight + 'px',
			width: 'auto'
		});		
	}

	function maintain_home_image_height() {

		if ( $('body').hasClass('home') && ( $(window).width() > 480 ) ) {
			$(window).resize(resize_home_images);
			resize_home_images();
		}
	}

	maintain_home_image_height();
	setup_navmenu();


}());