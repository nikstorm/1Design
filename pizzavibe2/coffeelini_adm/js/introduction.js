function item_ico_vib(a, i){
var doc = document.getElementById('item_ico'+i);
var ico = $('#ico_item'+i);
var icon = "<i class='"+a+"'></i>";
doc.innerHTML = icon;
ico.val(a);
};

function introtitle(){
var Maintitle=$('#Maintitle').attr('value');
var Mainsubtitle=$('#Mainsubtitle').attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/introduction_post",
data: {'maintitle':Maintitle, 'mainsubtitle':Mainsubtitle},
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

function introduction_item(a){
var Icon=$('#ico_item'+a).attr('value');
var Titleitem=$('#Titleitem'+a).attr('value');
var Textitem=$('#Textitem'+a).val();
$.ajax({
cache: false,
type: "POST",
url: "/introduction_post",
data: {'item':a, 'ico_item':Icon, 'titleitem':Titleitem, 'textitem':Textitem},
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
}});};