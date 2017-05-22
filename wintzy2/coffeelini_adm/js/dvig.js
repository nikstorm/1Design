function portfo_next_down(down, id){
$('#item_preload'+id).html("<img src='/coffeelini_adm/img/start.GIF' width='30px' height='30px'/>");
setTimeout(function(){
$.ajax({
cache: false,
type: "POST",
url: "/portfo_dvig",
data: {'downn':down,  'id':id},
success: function(html){
if(html == 1){
itemcontentj('/portfo_dvig', 'bll_porf');
}else{
$('#item_preload'+id).html("");
}
}});}, 500);};

function about_next_down(down, id){
$('#item_preload'+id).html("<img src='/coffeelini_adm/img/start.GIF' width='30px' height='30px'/>");
setTimeout(function(){
$.ajax({
cache: false,
type: "POST",
url: "/about_dvig",
data: {'downn':down,  'id':id},
success: function(html){
if(html == 1){

itemcontentj('/about_dvig', 'blockimgabout');
}else{
$('#item_preload'+id).html("");
}
}});}, 500);};
