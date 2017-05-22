  function contact_us_img(){
		var btnUpload=$('#upload');
		var status=$('#files');
		var img = $('#imghead');
		new AjaxUpload(btnUpload, {
			action: '/contact_us_up',
			name: 'uploadcontus',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    // extension is not allowed 
					status.text('  Supported formats are JPG, PNG, GIF');
					return false;
				}
				status.html("<img src='/coffeelini_adm/img/start.GIF' style='position:absolute; margin-top:-22px;' alt='' width='30px' height='30px'/>");
				
			},
			onComplete: function(file, response){
				//On completion clear the status
				if(response == "error"){
				 status.html('error');
				 }else{
				status.html('');
			    $(img).html(response);
				 start_func_headerbc();
				}
			}
		});
  };
function positioncontactusimg(){
var pos = $('#header_bc_txt').html();
$.ajax({
cache: false,
type: "POST",
url: "/contact_us_post",
data: {'positionheaderimg':pos},
success: function(html){
if(html == 1){
 $('#start_save_bil').hide('fade', 500);
 }else{
 positionheaderimg();
 }
}});
};
function standartimg(){
var status=$('#files');
var img = $('#imghead');
status.html("<img src='/coffeelini_adm/img/start.GIF' style='position:absolute; margin-top:-22px;' alt='' width='30px' height='30px'/>");
$.ajax({
cache: false,
type: "POST",
url: "/contact_us_post",
data: {'standartimg':'YES'},
success: function(htm){
status.html("");
$(img).html(htm);
}});
};
function contact_us_post(){
var Background=$('#linecolor').attr('value');
var title=$('#title').attr('value');
var titlecolor=$('#menufontcolor').attr('value');
var subtitle=$('#subtitle').attr('value');
var subtitlecolor=$('#subtitlecolor').attr('value');
var Namecaption=$('#Namecaption').attr('value');
var Nameerror=$('#Nameerror').attr('value');
var Nameonoff=$('#Nameonoff').attr('value');
var Phonecaption=$('#Phonecaption').attr('value');
var Phoneerror=$('#Phoneerror').attr('value');
var Phoneonoff=$('#Phoneonoff').attr('value');
var Emailcaption=$('#Emailcaption').attr('value');
var Emailerror=$('#Emailerror').attr('value');
var Messagecaption=$('#Messagecaption').attr('value');
var Messageerror=$('#Messageerror').attr('value');
var Messagesent=$('#Messagesent').attr('value');
var Buttontext=$('#Buttontext').attr('value');
var Timeout=$('#Timeout').attr('value');
var Adminemail=$('#Adminemail').attr('value');
var fixed=$('#fixed').attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/contact_us_post",
data: {
 'Background':Background,
 'title':title,
 'titlecolor':titlecolor,
 'subtitle':subtitle,
 'subtitlecolor':subtitlecolor,
 'Namecaption':Namecaption,
 'Nameerror':Nameerror,
 'Nameonoff':Nameonoff,
 'Phonecaption':Phonecaption,
 'Phoneerror':Phoneerror,
 'Phoneonoff':Phoneonoff,
 'Emailcaption':Emailcaption,
 'Emailerror':Emailerror,
 'Messagecaption':Messagecaption,
 'Messageerror':Messageerror,
 'Messagesent':Messagesent,
 'Buttontext':Buttontext,
 'Timeout':Timeout,
 'Adminemail':Adminemail,
 'fixed':fixed
 },
success: function(html){
if(html == 1){
$('#start_save').hide('fade', 500);
document.getElementById('good_log').innerHTML = "Data saved successfully";
ocibka('good_log');
}else{
$('#start_save').hide('fade', 500);
document.getElementById('error_log').innerHTML = html;
ocibka('error_log');
}
}});};
function contact_us_post_fixed_img(){
var fixed=$('#fixed').attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/contact_us_post",
data: {'fixedimg':fixed},
success: function(html){
if(html == 1){
$('#start_save').hide('fade', 500);
document.getElementById('good_log').innerHTML = "Data saved successfully";
ocibka('good_log');
}else{
$('#start_save').hide('fade', 500);
document.getElementById('error_log').innerHTML = html;
ocibka('error_log');
}
}});};
function btnonoff(a, id){
 proverkabtnon(a);
var btn = $('#'+id).attr('value');
if(btn == 0){ on = 1; }else if(btn == 1){ on = 0; }
 $('#'+id).attr('value', on);
};
function proverkasecond(input) {
 var a= $(input).attr('value').replace(/\D/gi, '');
 $(input).val(a);
};
function footer_post(){
var Background=$('#linecolor').attr('value');
var text=$('#foottext').attr('value');
var email=$('#email').attr('value');
var Twitter=$('#Twitter').attr('value');
var Facebook=$('#Facebook').attr('value');
var linkedin=$('#linkedin').attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/contact_us_post",
data: {'Background':Background, 'footertext':text, 'email':email, 'Twitter':Twitter, 'Facebook':Facebook, 'linkedin':linkedin },
success: function(html){
if(html == 1){
$('#start_save').hide('fade', 500);
document.getElementById('good_log').innerHTML = "Data saved successfully";
ocibka('good_log');
}else{
$('#start_save').hide('fade', 500);
document.getElementById('error_log').innerHTML = html;
ocibka('error_log');
}
}});};
