/**
 * cbpAnimatedHeader.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */

var cbpAnimatedHeader = (function() {

	var docElem = document.documentElement,
		header = document.querySelector( '.navbar-default' ),
		didScroll = false,
		changeHeaderOn = 300;

	function init() {
		window.addEventListener( 'scroll', function( event ) {
			if( !didScroll ) {
				didScroll = true;
				setTimeout( scrollPage, 250 );
			}
		}, false );
	}

	function scrollPage() {
		var sy = scrollY();
		syww = document.body.clientWidth;
		if ( sy >= changeHeaderOn ) {
		classie.add( header, 'navbar-shrink' );
	    if (syww > 750) {
		
		 $("#img_logo").animate({
	     top:4,
         width:wap,
         height:62}, 300);
		 $("#img_logo").clearQueue();
		}
		
		}else{
		classie.remove( header, 'navbar-shrink' );
		if (syww > 750) {
	     $("#img_logo").animate({
	     top:20,
         width: w1,
         height: h1}, 300);
		 $("#img_logo").clearQueue();
			
		}
		

		}
		didScroll = false;
	}

	function scrollY() {
		return window.pageYOffset || docElem.scrollTop;
	}
 
 init();
})();

