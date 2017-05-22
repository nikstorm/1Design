
// $(document).ready(function() {


        var title_mail = 'Онлайн-Заявка';
        var from_email = 'rpk1@list.ru';


$('.Caller .submit').click(function(){
if ($('.Caller .phone').val() != false) { 
  // alert('есть'); 

        var name = $('.Caller .name').val();
        var tel = $('.Caller .phone').val();



        $.ajax({
            url: "../modul_php/mail-sendler-Caller.php",
            type: "post", 
            dataType: "json", 
            data: {
                "title_mail": title_mail,
                "name": name,
                "tel": tel,
                "from_email": from_email,
            },

           
            success: function(data) {
                $('.messages').html(data.result); 
            }
        });


// ----------------------------------------

$('.ok-send').show();

 $('.callback').each(function(){
 	$(this).val('ОТПРАВЛЕНО!').addClass('succes');
 })
    $('.submit').animate({left:"200px", opacity:"0.0"},250)
                      .animate({left:"-200px"},0)
                      .animate({left:"0", opacity:"1.0"},250);
 return false;
}
  }); // END "для события по клику"




// в модуле "подарок в често знакомства - график работ"
    
    // скроем сначала .ok-send

    $('a.giftButton').click(function(){
        $('.ok-send').hide();
    });
    
// сама форма

$('.callerGift .submit').click(function(){
    
if ($('.callerGift .phone').val() != false) { 
  // alert('есть'); 

        var name = $('.callerGift .name').val();
        var tel = $('.callerGift .phone').val();


        $.ajax({
            url: "../modul_php/mail-sendler-Caller.php", // куда отправляем
            type: "post", // метод передачи
            dataType: "json", // тип передачи данных
            data: { // что отправляем
                "title_mail": title_mail,
                "name": name,
                "tel": tel,
                "from_email": from_email,
            },

            // после получения ответа сервера
            success: function(data) {
                $('.messages').html(data.result); // выводим ответ сервера
            }
        });


// ----------------------------------------

$('.ok-send').show();

// после отправки формы, можем еще кликнуть на эту кнопку


$('a.more_button').click(function(){
        $('.on-center').css({"display":"none"});

    });

// $('.btn_okSending').click();



 $('.callback').each(function(){
    $(this).val('ОТПРАВЛЕНО!').addClass('succes');
 })
    $('.submit').animate({left:"200px", opacity:"0.0"},250)
                      .animate({left:"-200px"},0)
                      .animate({left:"0", opacity:"1.0"},250);
 return false;
}
  }); // END 




// Дополнение для "график работ" - форма для акции 
    
$('.formSale .submit').click(function(){
if ($('.formSale .phone').val() != false) { 
  // alert('есть'); 

        var tel = $('.formSale .phone').val();
        var name = 'noname';

        

        $.ajax({
            url: "../modul_php/mail-sendler-Caller.php", 
            type: "post", 
            dataType: "json", 
            data: { 
                "title_mail": title_mail,
                "name": name,
                "tel": tel,
            },

           
            success: function(data) {
                $('.messages').html(data.result); 
            }
        });


// ----------------------------------------

// $('.ok-send').show();
$('#caller_gift .modal-header .close').click();

$('.ok-send .on-center').show();
$('.btn_okSending').click();

// после отправки формы, можем еще кликнуть на эту кнопку


 $('.callback').each(function(){
    $(this).val('ОТПРАВЛЕНО!').addClass('succes');
 })
    $('.submit').animate({left:"200px", opacity:"0.0"},250)
                      .animate({left:"-200px"},0)
                      .animate({left:"0", opacity:"1.0"},250);
 return false;
}
  }); // END 





// в модуле "наши работы"

$('.ourWork-send .submit').click(function(){
if ($('.ourWork-send .phone').val() != false) { 
  // alert('есть'); 

        var name = $('.ourWork-send .name').val();
        var tel = $('.ourWork-send .phone').val();



        $.ajax({
            url: "../modul_php/mail-sendler-Caller.php", 
            type: "post", 
            dataType: "json", 
            data: { 
                "title_mail": title_mail,
                "name": name,
                "tel": tel,
                "from_email": from_email,
            },

            
            success: function(data) {
                $('.messages').html(data.result); 
            }
        });


// ----------------------------------------

// $('.ok-send').show();

$('.btn_okSending').click();



 $('.callback').each(function(){
    $(this).val('ОТПРАВЛЕНО!').addClass('succes');
 })
    $('.submit').animate({left:"200px", opacity:"0.0"},250)
                      .animate({left:"-200px"},0)
                      .animate({left:"0", opacity:"1.0"},250);
 return false;
}
  }); // END



// });


