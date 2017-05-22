<?php
if ($_REQUEST['zvonok']=='send'){
	if($_REQUEST['name22']!="" && $_REQUEST['tel22']!=""){
mail("alexxei83@gmail.com", "Заявка на обратный звонок", "Заявка на обратный звонок \n Имя: ".$_REQUEST['name22']."\n Номер телефона: ".$_REQUEST['tel22']."\n "); 
$_SESSION["send"]="ok";
}
header("Location: index.php");
exit;
}
?>
<!doctype html>
<html>
<head>
<title>Все виды страховых услуг для Москвы и МО</title>
<meta charset="UTF-8">
<meta name="description" content="Более 100 видов страхования от ведущих и самых надежных страховых компаний.Бесплатный выезд агента на дом по Москве.Онлайн оформление любой страховки.">
<meta name="keywords" content="купить страховку осаго,осаго заказать,оформить каско,оформление зеленой карты,страхование квартиры,страхование дома,">
<link rel="stylesheet" type="text/css" href="style.css"> 
  <!--[if IE 6]>
	<style type="text/css">
		* html .group {
			height: 1%;
		}
	</style>
  <![endif]--> 
  <!--[if IE 7]>
	<style type="text/css">
		*:first-child+html .group {
			min-height: 1px;
		}
	</style>
  <![endif]--> 
  <!--[if lt IE 9]> 
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script> 
  <![endif]--> 
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="favicon.ico"/>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,regular,italic,600,600italic,700,700italic,800,800italic&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin,latin-ext,vietnamese">

</head>
<body>
  <div class="global_container_">
   <div class="l-constrained">
    <div class="main-content-wrapper">
	       <?php
	  include_once("include/header.php");
	?>
     <div class="row group">
		 <?php
			 include_once("include/sidebar.php");
		 ?>
      <div class="col-4 group">
		  <?php
			  include_once("include/baners.php");
		  ?>
       <div class="news group">
        <p class="novosti-2">Новости</p>
		<?php
include_once("config.php");
$query = mysql_query("SELECT * FROM `news` ORDER BY `date` DESC LIMIT 3;");
while($userdata = mysql_fetch_array($query))
{
$Month_r = array(
"01" => "января",
"02" => "февраля",
"03" => "марта",
"04" => "апреля",
"05" => "мая",
"06" => "июня",
"07" => "июля",
"08" => "августа",
"09" => "сентября",
"10" => "октября",
"11" => "ноябрь",
"12" => "декабря");
$month99 = new DateTime($userdata['date']); 
$month99=$month99->format('m'); 
$month=$month99;
$dfhdfh= new DateTime($userdata['date']);

?>	  
      <div class="group1-3">
         <p class="text-19"><?php echo  $dfhdfh->format('d') ; echo ' '; echo $Month_r[$month]; echo ' '; echo  $dfhdfh->format('Y') ;  ?></p>
         <p class="text-20"><a href="news.php?id=<?php echo $userdata['id']; ?>"><?php echo $userdata['name']; ?> </a></p>
         <p class="text-21"><?php echo mb_substr ($userdata['text'], 0, 225, 'UTF-8'); ?></p>
        </div>
	<?php
	}
?>
       </div>
      </div>
     </div>
    </div>
   </div>
            <style>
    .footer {
  margin: 48px 0 0;
  position: relative;
} 
</style>
	   <?php
		   include_once("include/footer.php");
	   ?>
  </div>
 </body>
</html>

<?
session_start();
if($_SESSION["send"]){
unset($_SESSION["send"]);
echo("<script>alert('Заявка отправленна');</script>");
}
?>