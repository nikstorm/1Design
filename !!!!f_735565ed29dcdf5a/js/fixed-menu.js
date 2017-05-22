    $(document).ready(function(){
        
        var $menu = $("#menu");
		var contacts = document.getElementById("menu-contact");
		var hideli = document.getElementById("hideli");
            
        $(window).scroll(function(){
            if ( $(this).scrollTop() > 210 && $menu.hasClass("default") ){
                $menu.fadeOut('fast',function(){
                    $(this).removeClass("default")
                           .addClass("fixed transbg")
                           .fadeIn('fast');
                });
				contacts.style.visibility = "visible"
				hideli.style.visibility = "hidden"
				hideli.style.display = "none"
            } else if($(this).scrollTop() <= 210 && $menu.hasClass("fixed")) {
                $menu.fadeOut('fast',function(){
                    $(this).removeClass("fixed transbg")
                           .addClass("default")
                           .fadeIn('fast');
                });
				contacts.style.visibility = "hidden"
				hideli.style.visibility = "visible"
				hideli.style.display = "list-item"

            }
        });//scroll
        
        $menu.hover(
            function(){
                if( $(this).hasClass('fixed') ){
                    $(this).removeClass('transbg');
                }
            },
            function(){
                if( $(this).hasClass('fixed') ){
                    $(this).addClass('transbg');
                }
            });//hover
    });//jQuery