
function logotip() {
         lg = document.body.clientWidth;
	var  logo=document.getElementById('logo_big');
	var  HeaderTopp = $('#intro-text').offset().top;
	if( $(window).scrollTop() > HeaderTopp ) {
	if (lg < 750) {
		 $("#img_logo").animate({
		 marginLeft:10,
	     top:4,
         width:wap1,
         height:45}, 350);
		 $("#img_logo").clearQueue();
    }else{
	     $("#img_logo").animate({
		 marginLeft:0,
	     top:4,
         width:wap,
         height:62}, 350);
		 $("#img_logo").clearQueue();
	}
	}else{
	if (lg < 750) {
 		 $("#img_logo").animate({
		 marginLeft:10,
	     top:4,
         width:wap1,
         height:45}, 350);
		 $("#img_logo").clearQueue();
    }else{
        $("#img_logo").animate({
		 marginLeft:0,
	     top:20,
         width: w1,
         height: h1}, 350);
		 $("#img_logo").clearQueue();
		 
	}
	
	}
};
$(window).bind('resize orientationchange', function() {
    logotip();
	timeline_image();
});
 setTimeout(function(){
logotip();
}, 500);

function timeline_image(){

						var parentlineH = $('#timeline_image').height();
					    var timelineH = $('#parentline').height();
						var top = timelineH/2;
						var top1 = top - parentlineH;
						var top2 = top1/2 + 3;
	                   $('#timeline_image').css({top:top2});					 
};
	
