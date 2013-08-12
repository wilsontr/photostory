/* album javascript */


(function(window, PhotoSwipe) {
	if ( navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/) ) {
		setup_photoswipe();
	}

	function setup_photoswipe() {
		document.addEventListener('DOMContentLoaded', 
			function(){ 
				var myPhotoSwipe = Code.PhotoSwipe.attach( window.document.querySelectorAll('.gallery img'), 
					{ 
						enableMouseWheel: false, 
						enableKeyboard: false,
						captionAndToolbarShowEmptyCaptions: false,
						captionAndToolbarHide: true,
						getImageSource: function(el){ 
							return el.getAttribute('rel'); 
						}
					} ); 

				myPhotoSwipe.addEventHandler(PhotoSwipe.EventTypes.onTouch, function(e){
					if ( e.action == 'tap' ) {
						e.preventDefault();
						e.stopPropagation();
						myPhotoSwipe.hide();
					}
				});
		}, false); 		
	}

}(window, window.Code.PhotoSwipe));