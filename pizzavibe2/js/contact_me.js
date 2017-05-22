function sendmessage(sec){
            var name = $("input#name").val();
            var email = $("input#email").val();
            var phone = $("input#phone").val();
			var sendtext = $("input#sendtext").val();
            var message = $("textarea#message").val();
			if(validationajax('name') == false){ validation('name'); return;}
			if(validationajax('email') == false){ validation('email'); return;}
			if(validationajax('phone') == false){ validation('phone'); return;}
			if(validationajax('message') == false){ validation('message'); return;}
            $.ajax({
                url: "/send",
                type: "POST",
                data: {
                    name: name,
                    phone: phone,
                    email: email,
                    message: message
                },
                cache: false,
                success: function() {
                    // Success message
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>"+sendtext+"</strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('#contactForm').trigger("reset");
					var onclk = $('#timeaut').attr('onClick');
					$('#timeaut').attr('onClick', 'ocibkasendtim('+sec+')');
					setTimeout(function(){
                    $('#timeaut').attr('onClick', 'sendmessage('+sec+')');
                    }, (sec * 1000));
                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Sorry " + name + ", it seems that my mail server is not responding. Please try again later!");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
            });};
function proverkasecond(input){
 var a= $('input'+input).val().replace(/[^\d+]/g, '');
 $(input).val(a);
};
function validation(id){
var error = $("#"+id).attr('name');
var nuzen = $("#"+id).attr('nuzen');
if(id != "message"){
var text = $("input#"+id).val().replace(/^\s+/, "");
}else{
var text = $("#"+id).val().replace(/^\s+/, "");
}
var r = /^\w+@\w+\.\w{2,4}$/i;
if(id == "email"){
if (!r.test(text)) {
//Код, неверный e-mail
$("#"+id+"error").html("<ul role='alert'><li><font><font>"+error+"</font></font></li></ul>");
}else{
$("#"+id+"error").html("");
}
}else{
if(text == ""){
if(nuzen == 0){
$("#"+id+"error").html("<ul role='alert'><li><font><font>"+error+"</font></font></li></ul>");
}
}else{
$("#"+id+"error").html("");
}
}
};
function validationajax(id){
var error = $("#"+id).attr('name');
var nuzen = $("#"+id).attr('nuzen');
if(id != "message"){
var text = $("input#"+id).val().replace(/^\s+/, "");
}else{
var text = $("#"+id).val().replace(/^\s+/, "");
}
var r = /^\w+@\w+\.\w{2,4}$/i;
if(id == "email"){
if (!r.test(text)) {
return false;
}else{
return true;
}
}else{
if(text == ""){
if(nuzen == 0){
return false;
}else{
return true;
}
}else{
return true;
}
}
};


                function two(a) {

                        return (9 < a? "": "0") + a

                }

 

                function formatTime(a) {

                        a = Math.floor(a / 1E3);

                        var b = Math.floor(a / 60),

                        c = Math.floor(b / 60);

                        a %= 60;

                        b %= 60;

                        return two(b) + " : " + two(a)

                }

function ocibkasendtim(sec){

                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>You have recently sent a message, you can only send one message in "+formatTime(sec*1000)+" minutes");
                    $('#success > .alert-danger').append('</div>');
};