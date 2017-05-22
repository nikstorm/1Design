   <footer class="footer">
    <div class="footer-2">
     <div class="pryamougolnik-2-kopiya-holder">
      <div class="menu group">
       <p class="osago-2"><a href="osago.php" >ОСАГО</a></p>
       <div class="wrapper-13">
        <div class="separator-kopiya group">
         <div class="figura-1-kopiya-7"></div>
         <div class="figura-1-kopiya-2-2"></div>
         <div class="figura-1-kopiya-3-2"></div>
         <div class="figura-1-kopiya-4-2"></div>
         <div class="figura-1-kopiya-5-2"></div>
         <div class="figura-1-kopiya-6-2"></div>
        </div>
        <p class="kasko-3"><a href="kasko.php" >КАСКО</a></p>
        <p class="text-28"><a href="karta.php" >Зеленая карта</a></p>
        <p class="kvartira-2"><a href="kvartira.php" >Квартира</a></p>
        <p class="dacha-2"><a href="dacha.php" >Дача</a></p>
        <a href="dmc_yur.php">
        <p class="dms-2">ДМС <br>для юр. лиц</p></a>
       </div>
       <p class="ns-2"><a href="ns.php" >НС</a></p>
      </div>
     </div>
     <div class="l-constrained-2">
      © 2015 Auto-kasko.info
     </div>
    </div>
   </footer>

<script type='text/javascript' src='include/jquery-ui.min.js'></script>
<script src="include/jquery.selectBoxIt.js"></script>

<script>
$(function($) {
  $("select").selectBoxIt();
});

$(document).bind('ready',function(){
  if( $('.postr-navigaciya').length ){
    var currentPage = window.location.search.slice(-1);
    var lastPage = $('div.last a').attr('href').slice(-1);

    if( window.location.href.slice(-8) == 'news.php' || currentPage == '1' ) {
      $('div.prev').hide();
      $('div.prev+div.navi_link').addClass('active');
    }
    if(currentPage ==  lastPage){
      $('div.next').hide();
    } 
    $('div.navi_link').each(function() {
      if( $(this).find('a').attr('href').slice(-1) == currentPage ) {$(this).addClass('active');}
    });
  }
});

/*
$('#dacha select').on('change', function (){
  var this_parents = $(this).parents('tr');
  if ($(this).val() !== 'Да') {
    this_parents.find('select').attr("disabled", "disabled");
    this_parents.find('input').attr("disabled", "disabled");
  } else {
    this_parents.find('select').removeAttr("disabled");
    this_parents.find('input').removeAttr("disabled");
  }
  $(this).removeAttr("disabled");
});
*/
</script>   