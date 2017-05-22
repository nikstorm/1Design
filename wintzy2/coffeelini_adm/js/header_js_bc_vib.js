
function positionheaderimg(){
var pos = $('#header_bc_txt').html();
$.ajax({
cache: false,
type: "POST",
url: "/header_set_post",
data: {'positionheaderimg':pos},
success: function(html){
if(html == 1){
 $('#start_save_bil').hide('fade', 500);
 }else{
 positionheaderimg();
 }
}});
};

function headerbcrazss(){
var myimage = document.getElementById("imghead");
var h = myimage.offsetHeight;
var headerbcrazssmy = document.getElementById("headerbc_vib_obl"); 
var headerbcrazssmy1 = document.getElementById("header_bc_txt");
var h2 =  headerbcrazssmy.offsetHeight;
var headerbcrazssb = headerbcrazssmy1.offsetTop - headerbcrazssmy.offsetTop - headerbcrazssmy.offsetHeight;
var global_bb = h - h2;
var headerbcrazssper = global_bb / 100;
var headerbcrazssper1 = headerbcrazssb / headerbcrazssper;
document.getElementById("header_bc_txt").innerHTML = (100 - headerbcrazssper1).toFixed(2);
};
function start_func_headerbc(){
// Setter
$( "#headerbc_vib_obl" ).draggable({
  axis: "y",
  cursor: "crosshair",
  containment: "parent",
    drag:        function() {
            headerbcrazss();
        }
});
var cursor = $( "#headerbc_vib_obl" ).draggable( "option", "cursor" );
var axis = $( "#headerbc_vib_obl" ).draggable( "option", "axis");
var parent = $( "#headerbc_vib_obl" ).draggable( "option", "containment" );

$( "#headerbc_vib_obl" ).draggable( "option", "axis", "y", "cursor", "parent");
};
