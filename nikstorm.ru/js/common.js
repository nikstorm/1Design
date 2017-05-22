$(document).ready(function() {

	$(".portfolio_item").each(function(i){
		$(this).find("a").attr("href", "#work_" + i);
		$(this).find(".port_descr").attr("id", "work_" + i);
	});
	$("#portfolio_grid").mixItUp();	

	$('.s_portfolio li').click(function(){
		$('.s_portfolio li').removeClass('active');
		$(this).addClass('active');

	});

	$('.popup').magnificPopup({type:'image'});
	$('.popup_content').magnificPopup({type: 'inline'});

	$('.top_text h1').animated('fadeInDown', 'fadeOutUp');
	$('.top_text p').animated('fadeInUp', 'fadeOutDown');
	$('.anim1').animated('fadeInUp','fadeOutDown');
	$('.anim2').animated('rubberBand','fadeOutDown');
	$('.anim3').animated('fadeInUp','fadeOutDown');
	$('.left .resume_item').animated('fadeInUp','fadeOutDown');
	
	$('.right .resume_item').animated('fadeInUp','fadeOutDown');
	$('.section_header').animated('fadeInUp', 'fadeOutDown');
	//$('.s_descr').animated('fadeInUp', 'fadeOutDown');
	function heightDetect(){
		$('.main_head').css('height',$(window).height());
	};
	heightDetect();
	
	$(window).resize(function(){
		heightDetect();
	});

	$(".sandwich, .menu_item").click(function() {
  		$(".sandwich").toggleClass("active");
  		//$('.top_mnu').css('display','block');
  	});

  	$('.top_mnu ul a').click(function(){
  		$('.top_mnu').fadeOut(600);
  		$(".sandwich").toggleClass("active");
  	}).append('<span>');

	$('.toggle_mnu').click(function(){
		if($('.top_mnu').is(':visible')){
			$('.top_text').removeClass('h_opacify');
			$('.top_mnu').fadeOut(600);
			$('.top_mnu li a').removeClass('fadeInUp animated');
		}
		else {
			$('.top_text').addClass('h_opacify');
			$('.top_mnu').fadeIn(600);
			$('.top_mnu li a').addClass('fadeInUp animated');
	};
		});
	
	//$('.top_mnu li a').sliphover();	
	$("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
	$(".top_mnu li a").mPageScroll2id();
	$(".goTop").mPageScroll2id();


});
$(window).load(function(){
	$('.loader_inner').fadeOut();
	$('.loader').delay(400).fadeOut('slow');
});

function goTop(){
	setInterval(2000);
	window.scrollBy(0, -5000);
	};