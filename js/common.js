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

	setup_navmenu();


}());