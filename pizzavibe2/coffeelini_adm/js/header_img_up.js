  function header_logo(){
		var btnUpload=$('#upload');
		var status=$('#files');
		var img = $('#imglogo');
		new AjaxUpload(btnUpload, {
			action: '/header_img_up',
			name: 'uploadlogo',
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
				}
			}
		});
  };
    function header_bac(){
		var btnUpload=$('#upload1');
		var status=$('#files1');
		var img = $('#imghead');
		new AjaxUpload(btnUpload, {
			action: '/header_img_up',
			name: 'uploadheadbac',
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
function headerlinecolorsave(){
var linecolor=$('#linecolor').attr('value');
var menufontcolor=$('#menufontcolor').attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/header_set_post",
data: {'headerlinecolor':linecolor, 'menufontcolor':menufontcolor},
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

function headersubtitle(){
var subtitle=$('#subtitle').attr('value');
var subtitlecolor=$('#subtitlecolor').attr('value');
var maintitle=$('#maintitle').attr('value');
var maintitlecolor=$('#maintitlecolor').attr('value');
var buttontext=$('#buttontext').attr('value');
var butgoesto=$('#butgoesto').attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/header_set_post",
data: {'subtitle':subtitle, 'subtitlecolor':subtitlecolor, 'maintitle':maintitle, 'maintitlecolor':maintitlecolor, 'buttontext':buttontext, 'butgoesto':butgoesto},
success: function(html){
if(html == 1){
start_save();
$('#start_save').hide('fade', 500);
document.getElementById('good_log1').innerHTML = "Data saved successfully";
ocibka('good_log1');
}else{
$('#start_save').hide('fade', 500);
document.getElementById('error_log1').innerHTML = html;
ocibka('error_log1');
}
}});};

function headersetonoff(a){

$.ajax({
cache: false,
type: "POST",
url: "/header_set_post",
data: {'onoff':a},
success: function(html){
if(html == 1){
 proverkabtnon(a); 

 $('#start_save').hide('fade', 500);
 
 }else{
 headersetonoff(a);
 }
}});};
function headerposition(a){

$.ajax({
cache: false,
type: "POST",
url: "/header_set_post",
data: {'position':a},
success: function(html){
if(html == 1){
 proverkabtnon(a); 

 $('#start_save_bil').hide('fade', 500);
 
 }else{
 headerposition(a);
 }
}});};
function Textbottomlovr(a){

$.ajax({
cache: false,
type: "POST",
url: "/header_set_post",
data: {'Textbottomlovr':a},
success: function(html){
if(html == 1){
 proverkabtnon(a);
 $('#start_save').hide('fade', 500);
 }else{
 Textbottomlovr(a);
 }
}});};

function recoveryimg(a){
var logo = document.getElementById('imglogo');
var head = document.getElementById('imghead');
var statuslogo=$('#files');
var statushead=$('#files1');
if(a == 0){ statuslogo.html("<img src='/coffeelini_adm/img/start.GIF' style='position:absolute; margin-top:-22px;' alt='' width='30px' height='30px'/>");}
if(a == 1){ statushead.html("<img src='/coffeelini_adm/img/start.GIF' style='position:absolute; margin-top:-22px;' alt='' width='30px' height='30px'/>");}
$.ajax({
cache: false,
type: "POST",
url: "/header_set_post",
data: {'imgrecoveri':a},
success: function(html){
if(a == 0){ 
logo.innerHTML = "<img src='/img/logo-big.png' />";
  setTimeout(function(){
  statuslogo.html('');
  }, 1000);
}
if(a == 1){ 
head.innerHTML = "<img src='/img/header-bg.png' width='100%'/>";
  setTimeout(function(){
  statushead.html('');
  }, 1000);
}
}});};