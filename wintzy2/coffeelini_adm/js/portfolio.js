  function portfo_img_up(a){
		var btnUpload=$('#upload');
		var status=$('#files');
		var img = $('#imglogo');
		new AjaxUpload(btnUpload, {
			action: '/portfolioimgup'+a,
			name: 'uploadportfo',
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

function portfoliotitle(){
var title=$('#Title').attr('value');
var subtitle=$('#Subtitle').attr('value');
var Innerbuttontext = $('#Innerbuttontext').attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/portfolio_post",
data: {'title':title, 'subtitle':subtitle, 'Innerbuttontext':Innerbuttontext},
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
function portfolio_img_title(a, col){
for(i = 1; i <= col; i++){
var line = i;
var img_title = $('#img_title'+i).attr('value');
var img_subtitle = $('#img_subtitle'+i).attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/portfolio_post",
data: {'line':line, 'img_title':img_title, 'img_subtitle':img_subtitle},
success: function(html){
if(html == 1){
$('#start_save').hide('fade', 500);
document.getElementById('good_log'+a).innerHTML = "Data saved successfully";
ocibka('good_log'+a);
}else{
$('#start_save').hide('fade', 500);
document.getElementById('error_log'+a).innerHTML = html;
ocibka('error_log'+a);
}
}});
}
};
function portfo_innertitle(a){
var Innertitle=$('#Innertitle').attr('value');
var Innersubtitle=$('#Innersubtitle').attr('value');
var titl_standart = $('#innersubtitlestandart').attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/portfolio_post",
data: {'line':a, 'Innertitle':Innertitle, 'Innersubtitle':Innersubtitle, 'titl_standart':titl_standart},
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
function portfo_innertext(a){
var Innertext=$('#Innertext').attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/portfolio_post",
data: {'line':a, 'Innertext':Innertext},
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
function portfo_addproject(id){
var cont = document.getElementById('content_adm');
cont.innerHTML = "";
var addproject="addproject";
$.ajax({
cache: false,
type: "POST",
url: "/portfolio_post",
data: {'addproject':addproject},
success: function(html){
if(html == 1){
content('/portfolioget'+id, 'content_adm');
}else{
portfo_addproject();
}
}});};
function portfo_uninsproject(a){
var line = a;
var cont = document.getElementById('content_adm');
cont.innerHTML = "";
var uninsproject="uninsproject";
$.ajax({
cache: false,
type: "POST",
url: "/portfolio_post",
data: {'line':line, 'uninsproject':uninsproject},
success: function(html){
if(html == 1){
content('/photos', 'content_adm');
setTimeout(function(){
scrollTOP('portfolio-item'+ (a-1), false);
}, 1000);
}else{
portfo_uninsproject(line);
}
}});};
function portf_standarttitle(a){
var title=$('#standarttitle').attr('value');
var subtitle=$('#standartsubtitle').attr('value');
var stand=$('#innersubtitlestandart').attr('value');
proverkabtnon('0');
if(stand == 0){
document.getElementById('Innertitle').removeAttribute('disabled');
document.getElementById('Innersubtitle').removeAttribute('disabled');
document.getElementById('Innertitle').style.background = '#fff';
document.getElementById('Innersubtitle').style.background = '#fff';
$('#innersubtitlestandart').attr('value', '1');
portf_standarttitle1(a);
}else{
document.getElementById('Innertitle').setAttribute('disabled', 'disabled');
document.getElementById('Innersubtitle').setAttribute('disabled', 'disabled');
document.getElementById('Innertitle').style.background = '#f5f5f5';
document.getElementById('Innersubtitle').style.background = '#f5f5f5';
$('#Innertitle').attr('value', title);
$('#Innersubtitle').attr('value', subtitle);
$('#innersubtitlestandart').attr('value', '0');
portf_standarttitle1(a);
}
};
function portf_standarttitle1(a){
var Innertitle=$('#Innertitle').attr('value');
var Innersubtitle=$('#Innersubtitle').attr('value');
var titl_standart = $('#innersubtitlestandart').attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/portfolio_post",
data: {'line':a, 'Innertitle':Innertitle, 'Innersubtitle':Innersubtitle, 'titl_standart':titl_standart},
success: function(html){

}});};
