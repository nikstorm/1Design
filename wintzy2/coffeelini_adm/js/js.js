setTimeout(function(){
proverkahtml('content_adm', '/');
}, 1000);
function a(link){
document.location = link;
};
function proverkahtml(a, link){
var con = $('#'+a).html();
var linkk = link.replace(/[0-9]/, '');
var lin = link.replace(/\D/gi, '');
if(con == ""){
  setTimeout(function(){
  proverkahtml(a, link);
  }, 1000);
}else{
  setTimeout(function(){
  $('#start').hide('fade', 100);
  obrabimgdovn(linkk, lin);
  }, 300); 
}  
};
function proverkabtnon(b){
var clar = document.getElementById('onoffbtn'+b).className;
var ht = document.getElementById('onoffbtn'+b);
var txt = $('#onoffbtn'+b).text();

if(clar == "cont_inp_raz cont_inp_raz_on"){
ht.innerHTML = txt;
$('#onoffbtn'+b).switchClass( "cont_inp_raz_on", "cont_inp_raz_off", 500, "easeInOutQuad" );
}else{ 
ht.innerHTML = "<i class='fa fa-check'></i> "+txt;
$('#onoffbtn'+b).switchClass( "cont_inp_raz_off", "cont_inp_raz_on", 500, "easeInOutQuad" ); 
}  
};
function content(link, con) { // Контент
var cont = document.getElementById(con);
cont.innerHTML = "";
var http = indexRequestObject();
if( http ){
http.open('get', link);
http.onreadystatechange = function (){
if(http.readyState == 4){
cont.innerHTML = http.responseText;}}
http.send(null);
}else{
document.location = link;}
proverkahtml(con, link);  
};
// создание ajax объекта
function indexRequestObject()
{
try { return new XMLHttpRequest() }
catch(e)
{
try { return new ActiveXObject('Msxml2.XMLHTTP') }
catch(e)
{
try { return new ActiveXObject('Microsoft.XMLHTTP') }
catch(e) { return null; }
}
}
};
function vhod(){
var email=$('#input_lodin').attr('value');
var pass=$('#input_pass').attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/login",
data: {'log_login':email, 'log_pass':pass},
success: function(html){
if(html == 0){
document.location = "/admin";
}else{
ocibka('error_log');
};
}});};
function rcovery_pass(){
var email=$('#input_email').attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/login",
data: {'recovery_email':email},
success: function(html){
if(html == 0){
document.getElementById('good_log').innerHTML = "Login details sent to your Email";
ocibka('good_log');
$('#input_email').val("");
}else{
document.getElementById('error_log1').innerHTML = html;
ocibka('error_log1');
};
}});};
function customcode(){
var custom=$('#customcode').val();
$.ajax({
cache: false,
type: "POST",
url: "/customcode",
data: {'custom_code':custom},
success: function(html){
if(html == 1){
 $('#start_save').hide('fade', 500);
 document.getElementById('good_log1').innerHTML = "Data saved successfully";
 ocibka('good_log1');
 }else{
 customcode();
 }
}});};
function ocibka(a){
$('#'+a).show('blind', 500);
setTimeout(function(){
$('#'+a).hide('blind', 500);
}, 5000);
};
function eff_blind(a, a1){
$('#'+a1).hide('blind', 500);
setTimeout(function(){
$('#'+a).show('blind', 500);
}, 500);
};
 function  showlayer(layer){
  var  myLayer=document.getElementById(layer);
  if(myLayer.style.display=="none"){
  $('#'+layer).show('blind', 500);
  } else { 
  $('#'+layer).hide('blind', 500);
  }
  };
  function enter(a){
  if(a == 13){ vhod(); };
  };
  function enter_set(a){
  if(a == 13){ settinadmin(); };
  };
  function enter_recovery(a){
  if(a == 13){ rcovery_pass(); };
  };
  function start(){
  document.getElementById('start').style.display = "block";
  };
  function start_save(){
  document.getElementById('start_save').style.display = "block";
  };
  function start_save_bil(){
  document.getElementById('start_save_bil').style.display = "block";
  };
  function obrabimgdovn(a, line){
  if(a == "/contents"){ setTimeout(function(){ icosave(); }, 1000);}
  if(a == "/header"){ setTimeout(function(){ 
  colorset(); 
  header_logo(); 
  header_bac();
  start_func_headerbc();
  }, 100);}
  var controlcle = 
                    "bold italic underline strikethrough |" +
                    " bullets numbering " +
                    "| undo redo | " +
                    " link unlink | cut copy paste pastetext";
  if(a == "/whatwe"){ $('#Textitem1').cleditor({ controls: controlcle }); $('#Textitem2').cleditor({ controls: controlcle }); $('#Textitem3').cleditor({ controls: controlcle });}
  if(a == "/portfolioget"){ setTimeout(function(){$('#Innertext').cleditor({ controls: controlcle }); portfo_img_up(line);}, 100);}
  if(a == "/aboutget"){  setTimeout(function(){$('#abouttext').cleditor({ controls: controlcle }); abimgupload(line);}, 100);}
  if(a == "/team"){  $('#itemtext').cleditor({ controls: controlcle }); }
  if(a == "/itemget"){ itemimgupload(line);}
  if(a == "/contact"){ setTimeout(function(){colorset(); contact_us_img();  start_func_headerbc();}, 100);}
  if(a == "/footer"){ setTimeout(function(){colorset();}, 100);}
  if(a == "/appearance"){ setTimeout(function(){
           $("#test2").ImageColorPicker({
  				afterColorSelected: function(event, color){ 
				$("#interfacecolor").val(color);
				document.getElementById('Headerlinecolor').style.background = color; }
  			});
			apparen_colorset();
			}, 100);}
  };
  // Content_save
  function icosave(){
		var btnUpload=$('#upload');
		var status=$('#files');
		new AjaxUpload(btnUpload, {
			action: '/icosave',
			name: 'uploadfile',
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
				status.text('');
			    $(status).html(response);
			}
		});
  };
function contentssav(){
var title=$('#title').attr('value');
var description=$('#description').attr('value');
var keywords=$('#keywords').attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/contsave",
data: {'title':title, 'description':description, 'keywords':keywords},
success: function(html){
if(html == 1){
 $('#start_save').hide('fade', 500);
 document.getElementById('good_log').innerHTML = "Data saved successfully";
 ocibka('good_log');
 }else{
 contentssav();
 }
}});};
function settinadmin(){
var re_login=$('#re_login').attr('value');
var re_email=$('#re_email').attr('value');
var pass=$('#pass').attr('value');
var pass_new=$('#pass_new').attr('value');
var re_pass_new=$('#re_pass_new').attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/login",
data: {'re_login':re_login, 're_email':re_email, 'pass':pass, 'pass_new':pass_new, 're_pass_new':re_pass_new},
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
function onoffsecti(a){
$.ajax({
cache: false,
type: "POST",
url: "/contsave",
data: {'onoff':a},
success: function(html){
if(html == 1){
 proverkabtnon(a); 
 $('#start_save').hide('fade', 500);
 }else{
 onoffsecti(a);
 }
}});};
function Headercolorline(a){
document.getElementById('Headerlinecolor').className = '';
document.getElementById('Headerlinecolor').className = a;

};
function colorset(){
$('#subtitlecolor, #maintitlecolor, #linecolor, #menufontcolor').ColorPicker({
onSubmit: function(hsb, hex, rgb, el) {
$(el).val("#"+hex);
$(el).ColorPickerHide();
headerlinecolor('linecolor', 'Headerlinecolor', 'menufontcolor');
},
onBeforeShow: function () {
$(this).ColorPickerSetColor(this.value);
}
})
.bind('keyup', function(){
$(this).ColorPickerSetColor(this.value);
});
};
function headerlinecolor(a, a1, a2){
var color=$('#'+a).attr('value');
var font=$('#'+a2).attr('value');
var recolor=document.getElementById(a1).style;
if(color != false){recolor.background = color;}
if(font != false){recolor.color = font;}
};
function vopros_uns(a){
$('#vopros_uns').show('fade', 100);
$('#vopros_uns_yes').attr('onClick', a);
};
function vopros_uns_close(){
$('#vopros_uns').hide('fade', 100);
};

function scrollTOP(id, ami){
var con = $('#content_adm').html();
if(con == ""){
setTimeout(function(){
scrollTOP(id, ami);
}, 1000);
}
else
{
if(ami == true){
        $('html, body').stop().animate({
            scrollTop: $('#'+id).offset().top - 200
        }, 1000, 'easeInOutExpo');
}else{
        $('html, body').stop().animate({
            scrollTop: $('#'+id).offset().top - 200
        }, 100);
}
}};
function name_modules(id){
var namemodules=$('#namemodules').attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/introduction_post",
data: {'namemodules':namemodules, 'namemodulesid':id},
success: function(html){
if(html == 1){
$('#start_save').hide('fade', 500);
document.getElementById('good_log10').innerHTML = "Data saved successfully";
ocibka('good_log10');
}else{
$('#start_save').hide('fade', 500);
document.getElementById('error_log10').innerHTML = html;
ocibka('error_log10');
}
}});};