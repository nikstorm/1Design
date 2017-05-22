  function itemimgupload(a){
		var btnUpload=$('#upload');
		var status=$('#files');
		var img = $('#abimg');
		new AjaxUpload(btnUpload, {
			action: '/itemoutimgup'+a,
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
  
function itemprojectsett(){
var title=$('#Title').attr('value');
var subtitle=$('#Subtitle').attr('value');
var text=$('#itemtext').attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/item_post",
data: {'title':title, 'subtitle':subtitle, 'itemtext':text},
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
function item_addproject(a){
var cont = document.getElementById('content_adm');
cont.innerHTML = "";
var addproject="addproject";
$.ajax({
cache: false,
type: "POST",
url: "/item_post",
data: {'addproject':addproject},
success: function(html){
if(html == 1){
content('/itemget'+a, 'content_adm');
}else{
team_addproject();
}
}});};
function item_uninsproject(a){
var line = a;
var cont = document.getElementById('content_adm');
cont.innerHTML = "";
var uninsproject="uninsproject";
$.ajax({
cache: false,
type: "POST",
url: "/item_post",
data: {'line':line, 'uninsproject':uninsproject},
success: function(html){
if(html == 1){
content('/team', 'content_adm');
}else{
item_uninsproject(line);
}
}});};
function itemimgsett(a){
var Name=$('#Name').attr('value');
var Profession=$('#Profession').attr('value');
var Twitter=$('#Twitter').attr('value');
var Facebook=$('#Facebook').attr('value');
var Instagram=$('#Instagram').attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/item_post",
data: {'line':a,  'Name':Name, 'Profession':Profession, 'Twitter':Twitter, 'Facebook':Facebook, 'Instagram':Instagram},
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
function itemcontentj(link, con) { // Контент
var cont = document.getElementById(con);
var http = indexRequestObject();
if( http ){
http.open('get', link);
http.onreadystatechange = function (){
if(http.readyState == 4){
cont.innerHTML = http.responseText;
$('#item_preload'+id).html("");
}}
http.send(null);
}else{
document.location = link;}  
};

function blocc_next_down(down, id){
$('#item_preload'+id).html("<img src='/coffeelini_adm/img/start.GIF' width='30px' height='30px'/>");
setTimeout(function(){
$.ajax({
cache: false,
type: "POST",
url: "/item_post",
data: {'downn':down,  'id':id},
success: function(html){
if(html == 1){
itemcontentj('/item_content', 'item_content');
}else{
$('#item_preload'+id).html("");
}
}});}, 500);};



