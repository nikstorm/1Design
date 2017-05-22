function color_btn_vib(id){
var ht1 = document.getElementById('onoffbtn1');
var ht2 = document.getElementById('onoffbtn2');
var ht3 = document.getElementById('onoffbtn3');
var ht4 = document.getElementById('onoffbtn'+id);
var txt1 = $('#onoffbtn1').text();
var txt2 = $('#onoffbtn2').text();
var txt3 = $('#onoffbtn3').text();
var txt4 = $('#onoffbtn'+id).text();
ht1.innerHTML = txt1;
$('#onoffbtn1').switchClass( "cont_inp_raz_on", "cont_inp_raz_off", 500, "easeInOutQuad" );
ht2.innerHTML = txt2;
$('#onoffbtn2').switchClass( "cont_inp_raz_on", "cont_inp_raz_off", 500, "easeInOutQuad" );
ht3.innerHTML = txt3;
$('#onoffbtn3').switchClass( "cont_inp_raz_on", "cont_inp_raz_off", 500, "easeInOutQuad" );
ht4.innerHTML = "<i class='fa fa-check'></i> "+txt4;
$('#onoffbtn'+id).switchClass( "cont_inp_raz_off", "cont_inp_raz_on", 500, "easeInOutQuad" );  
};
function apparen_colorset(){
$('#interfacecolor, #interfacehovercolor, #iconscolor, #menufontcolor, #linecolor ').ColorPicker({
onSubmit: function(hsb, hex, rgb, el) {
$(el).val("#"+hex);
$(el).ColorPickerHide();
},
onBeforeShow: function () {
$(this).ColorPickerSetColor(this.value);
}
})
.bind('keyup', function(){
$(this).ColorPickerSetColor(this.value);
});
};
function img_color_pere(iddec, idin){
           $("#test2").ImageColorPicker({
  				afterColorSelected: function(event, color){ 
				$("#"+idin).val(color);
				document.getElementById(iddec).style.background = color; }
  			});
};

function aparance_post(){
var interfacecolor=$('#interfacecolor').attr('value');
var hovercolor=$('#interfacehovercolor').attr('value');
var iconscolor=$('#iconscolor').attr('value');
var colorgood=$('#colorgood').attr('value');
var colorerror=$('#colorerror').attr('value');
$.ajax({
cache: false,
type: "POST",
url: "/aparance_post",
data: {'interfacecolor':interfacecolor, 'hovercolor':hovercolor, 'iconscolor':iconscolor, 'colorgood':colorgood, 'colorerror':colorerror },
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