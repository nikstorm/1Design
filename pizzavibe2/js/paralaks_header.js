       
		$(window).addEventListener( 'scroll', function( event ) {
			if( !didScroll ) {
				didScroll = true;
				setTimeout( paralaks_header, 250 );
			}
		}, false );
	   
	   
	   function paralaks_header(){
	   var myimage = document.getElementById("img_logo"); 
       var h = myimage.offsetHeight;
	   var sy = scrollY();
	   
	   myimage.style.display = "none";
	  
	   
	   };
	  
