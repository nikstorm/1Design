
// $(document).ready(function() {


        var title_mail = 'Онлайн-Заявка';
        var from_email = 'rpk1@list.ru';


$('.fullForm-footer .submit').click(function(){
if ($('.fullForm-footer .phone').val() != false) { 
  // alert('есть'); 

        var name = $('.fullForm-footer .name').val();
        var tel = $('.fullForm-footer .phone').val();

    var your_email = $('.fullForm-footer .email').val();
       

        $.ajax({
            url: "../modul_php/mail-sendler.php", 
            type: "post", 
            dataType: "json", 
            data: { 
                "title_mail": title_mail,
                "name": name,
                "tel": tel,
                "your_email": your_email,
                "from_email": from_email,
            },

           
            success: function(data) {
                $('.messages').html(data.result); 
            }
        });

// 
// 
$('.btn_okSending').click();


 $('.callback').each(function(){
 	$(this).val('ОТПРАВЛЕНО!').addClass('succes');
 })
    $('.submit').animate({left:"200px", opacity:"0.0"},250)
                      .animate({left:"-200px"},0)
                      .animate({left:"0", opacity:"1.0"},250);
 return false;
}
  }); 



// другая форма


$('.fullForm-header .submit').click(function(){
if ($('.fullForm-header .phone').val() != false) { 
  // alert('есть'); 

        var name = $('.fullForm-header .name').val();
        var tel = $('.fullForm-header .phone').val();

    var your_email = $('.fullForm-header .email').val();
        


        $.ajax({
            url: "../modul_php/mail-sendler.php", 
            type: "post", 
            dataType: "json", 
            data: { 
                "title_mail": title_mail,
                "name": name,
                "tel": tel,
                "your_email": your_email,
                "from_email": from_email,
            },

            
            success: function(data) {
                $('.messages').html(data.result); 
            }
        });


// ----------------------------------------

$('.btn_okSending').click();


 $('.callback').each(function(){
  $(this).val('ОТПРАВЛЕНО!').addClass('succes');
 })
    $('.submit').animate({left:"200px", opacity:"0.0"},250)
                      .animate({left:"-200px"},0)
                      .animate({left:"0", opacity:"1.0"},250);
 return false;
}
  }); 







// });


