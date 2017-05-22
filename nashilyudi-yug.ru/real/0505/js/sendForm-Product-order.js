
// $(document).ready(function() {


        var title_mail = 'Онлайн-Заявка';
        var from_email = 'rpk1@list.ru';


$('.pr1 .submit').click(function(){
if ($('.pr1 .phone').val() != false) { 
  // alert('есть'); 

        var name = $('.pr1 .name').val();
        var tel = $('.pr1 .phone').val();

        

        $.ajax({
            url: "../modul_php/mail-sendler-Caller.php", 
            type: "post", // метод передачи
            dataType: "json", // тип передачи данных
            data: { // что отправляем
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
$('.modal-header .close').click();
$('.btn_okSending').click();

 
 return false;
}
  }); // END


// конец формы. форма ======================================


$('.pr2 .submit').click(function(){
if ($('.pr2 .phone').val() != false) { 
  // alert('есть'); 

        var name = $('.pr2 .name').val();
        var tel = $('.pr2 .phone').val();

       

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
$('.modal-header .close').click();
$('.btn_okSending').click();

 
 return false;
}
  }); // END 


// конец формы. форма ======================================

$('.pr3 .submit').click(function(){
if ($('.pr3 .phone').val() != false) { 
  // alert('есть'); 

        var name = $('.pr3 .name').val();
        var tel = $('.pr3 .phone').val();

       
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
$('.modal-header .close').click();
$('.btn_okSending').click();

 
 return false;
}
  }); // END 


// конец формы. форма ======================================


$('.pr4 .submit').click(function(){
if ($('.pr4 .phone').val() != false) { 
  // alert('есть'); 

        var name = $('.pr4 .name').val();
        var tel = $('.pr4 .phone').val();

        // отправляем данные для письма

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
$('.modal-header .close').click();
$('.btn_okSending').click();

 
 return false;
}
  }); // END 


// конец формы. форма ======================================

$('.pr5 .submit').click(function(){
if ($('.pr5 .phone').val() != false) { 
  // alert('есть'); 

        var name = $('.pr5 .name').val();
        var tel = $('.pr5 .phone').val();

        

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
$('.modal-header .close').click();
$('.btn_okSending').click();

 
 return false;
}
  }); // END 


// конец формы. форма ======================================

$('.pr6 .submit').click(function(){
if ($('.pr6 .phone').val() != false) { 
  // alert('есть'); 

        var name = $('.pr6 .name').val();
        var tel = $('.pr6 .phone').val();

        

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
$('.modal-header .close').click();
$('.btn_okSending').click();

 
 return false;
}
  }); // END 


// конец формы. форма ======================================

$('.pr7 .submit').click(function(){
if ($('.pr7 .phone').val() != false) { 
  // alert('есть'); 

        var name = $('.pr7 .name').val();
        var tel = $('.pr7 .phone').val();

        

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
$('.modal-header .close').click();
$('.btn_okSending').click();

 
 return false;
}
  }); // END 


// ======================================

$('.pr8 .submit').click(function(){
if ($('.pr8 .phone').val() != false) { 
  // alert('есть'); 

        var name = $('.pr8 .name').val();
        var tel = $('.pr8 .phone').val();

     

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
$('.modal-header .close').click();
$('.btn_okSending').click();

 
 return false;
}
  }); // END 


// конец формы. форма ======================================

$('.pr9 .submit').click(function(){
if ($('.pr9 .phone').val() != false) { 
  // alert('есть'); 

        var name = $('.pr9 .name').val();
        var tel = $('.pr9 .phone').val();

       

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
$('.modal-header .close').click();
$('.btn_okSending').click();

 
 return false;
}
  }); // END 


// конец формы. форма ======================================

// });


