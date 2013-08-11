/* common javascript */


(function() {
	$ = jQuery.noConflict();
	var content_height_fudge = 80;


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

	function get_content_height() {
		return $('header').height() + $('footer').height() + $('#river').height() + content_height_fudge;
	}

	function resize_home_images(force) {
		var shouldResize = $(window).height() < get_content_height();
		if ( shouldResize || force ) {
			var newHeight = $(window).height() - ($('header').height() + $('footer').height() + content_height_fudge);
			$('.post-image img').css({
				maxHeight: newHeight + 'px',
				width: 'auto'
			});					
		}
	}

	function maintain_home_image_height() {
		
		if ( $('body').hasClass('home') && ( $(window).width() > 480 ) ) {
			$(window).resize(resize_home_images);
			$(document).ready(function() {
				resize_home_images(true);	
			})
			
		}
	}

	function setup_facebook_share_links() {
		$('.share-facebook a').click(function(e) {
			e.preventDefault();
			window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 
  				'facebook-share-dialog', 
  				'width=626,height=436'); 
		});
		
	}

	maintain_home_image_height();
	setup_navmenu();
	setup_facebook_share_links();

}());