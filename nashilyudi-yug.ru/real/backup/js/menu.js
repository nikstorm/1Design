// alert('Ваша версия jQuery ' + jQuery.fn.jquery);

/*var val_scroll = $(".wrapp-menu").scrollTop();
// alert(val_scroll);
if (val_scroll > 0) { 
	alert('больше 100'); 
}*/

/*$(function(){
    $(window).scroll(function() {
        if($(this).scrollTop() >= 710) {
            $('.wrapp-menu, .banner').addClass('stickytop');
        }
        else{
            $('.wrapp-menu, .banner').removeClass('stickytop');
        }
    });
});
*/




$('a[href^="#"], a[href^="."]').click( function(){ // если в href начинается с # или ., то ловим клик

    $('div#overlap-menu .toggle').click();

        var scroll_el = $(this).attr('href'); // возьмем содержимое атрибута href
        if ($(scroll_el).length != 0) { // проверим существование элемента чтобы избежать ошибки
        $('html, body').animate({ scrollTop: ($(scroll_el).offset().top)-10 }, 500); // анимируем скроолинг к элементу scroll_el
        }

        // return false; // выключаем стандартное действие
        return true; 
    });