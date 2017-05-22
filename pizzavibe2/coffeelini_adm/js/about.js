  function abimgupload(a){
		var btnUpload=$('#upload');
		var status=$('#files');
		var img = $('#abimg');
		new AjaxUpload(btnUpload, {
			action: '/aboutimgup'+a,
			name: 'uploadabimg',
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


function abouttitlesub(){
var title=$('#abtitle').attr('value');
var subtitle=$('#absubtitle').attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/about_post",
data: {'abtitle':title, 'absubtitle':subtitle},
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
function aboutprojectsett(a){
var title=$('#abtitle').attr('value');
var subtitle=$('#absubtitle').attr('value');
var text=$('#abouttext').attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/about_post",
data: {'line':a,  'abtitleset':title, 'absubtitleset':subtitle, 'abouttextset':text},
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
function about_addproject(id){
var cont = document.getElementById('content_adm');
cont.innerHTML = "";
var addproject="addproject";
$.ajax({
cache: false,
type: "POST",
url: "/about_post",
data: {'addproject':addproject},
success: function(html){
if(html == 1){
content('/aboutget'+id, 'content_adm');
setTimeout(function(){
scrollTOP('about_img'+id, false);
}, 1000);
}else{
about_addproject();
}
}});};
function about_uninsproject(a){
var line = a;
var cont = document.getElementById('content_adm');
cont.innerHTML = "";
var uninsproject="uninsproject";
$.ajax({
cache: false,
type: "POST",
url: "/about_post",
data: {'line':line, 'uninsproject':uninsproject},
success: function(html){
if(html == 1){
content('/about', 'content_adm');
setTimeout(function(){
scrollTOP('about_img'+ (a-1), false);
}, 1000);
}else{
about_uninsproject(line);
}
}});};
function aboutonoff(a){

$.ajax({
cache: false,
type: "POST",
url: "/about_post",
data: {'abonoff':a},
success: function(html){
if(html == 1){
 proverkabtnon(a); 
 $('#start_save').hide('fade', 500);
 
 }else{
 aboutonoff(a);
 }
}});};

function aboutloweritem(){
var loweritem=$('#loweritem').attr('value');

$.ajax({
cache: false,
type: "POST",
url: "/about_post",
data: {'loweritem':loweritem},
success: function(html){
if(html == 1){
$('#start_save').hide('fade', 500);
document.getElementById('good_log1').innerHTML = "Data saved successfully";
ocibka('good_log1');
}else{
$('#start_save').hide('fade', 500);
document.getElementById('error_log1').innerHTML = html;
ocibka('error_log1');
}
}});};