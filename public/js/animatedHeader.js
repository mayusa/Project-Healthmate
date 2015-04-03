

var animatedHeader = (function() {

	var docElem = document.documentElement,
		header = $( '.navbar' ),
		didScroll = false,
		changeHeaderOn = 80;
		
	function init() {

		window.addEventListener( 'load', scrollPage );

		window.addEventListener( 'scroll', function( event ) {
			if( !didScroll ) {
				didScroll = true;
				setTimeout( scrollPage, 250 );
			}
		}, false );
	}

	function scrollPage() {
		var sy = scrollY();
		if ( sy >= changeHeaderOn ) {
			header.addClass('navbar-shrink');
		}
		else {
			header.removeClass('navbar-shrink');
		}
		didScroll = false;
	}

	function scrollY() {
		return window.pageYOffset || docElem.scrollTop;
	}

	init();

})();
