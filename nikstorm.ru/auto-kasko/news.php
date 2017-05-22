<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<?php if ($_REQUEST['id']!=''){
include_once("config.php");
$gdgdfg="SELECT * FROM `news` WHERE  `id`='".$_REQUEST['id']."'";
$query5 = mysql_query($gdgdfg);
$userdata5 = mysql_fetch_assoc($query5);
echo "<title>".$userdata5['name']."</title>";
echo '<meta name="description" content="'.$userdata5['description'].'">';
echo '<meta name="keywords" content="'.$userdata5['keywords'].'">';
}
else{
echo('<title>Новости</title><meta name="description" content="Интересные новости в сфере страхования всех видов.Познавательная информация 
доступна в режиме онлайн.Только актуальные данные.Читайте,обращайтесь по вопросам страхования жизни,имущества,авто.">');
}
?>
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
<style>
.tab-holder{
z-index: 1;
min-height:14px;
background: -moz-linear-gradient(90deg, #700000 0, #cb0000 50%, #ec2f2f 50.268555%, #ff6363 100%);
background: -o-linear-gradient(90deg, #700000 0, #cb0000 50%, #ec2f2f 50.268555%, #ff6363 100%);
background: -webkit-linear-gradient(90deg, #700000 0, #cb0000 50%, #ec2f2f 50.268555%, #ff6363 100%);
background: linear-gradient(0deg, #700000 0, #cb0000 50%, #ec2f2f 50.268555%, #ff6363 100%);
-webkit-box-shadow: inset 0 0 250px 0 rgba(255, 255, 190, 0.16);
-moz-box-shadow: inset 0 0 250px 0 rgba(255, 255, 190, 0.16);
box-shadow: inset 0 0 250px 0 rgba(255, 255, 190, 0.16);
color: #ffffff;
text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
.tab-holder-2{  background: #E5E5E5;
height: 21px;
z-index: 2;
border-bottom-right-radius:0;border-bottom-left-radius:0;
-webkit-box-shadow: none;
box-shadow: none;
text-shadow: none;
color: #000;
}}</style>
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
       <div class="news1 group" style="  margin-bottom: -41px;">
	   	   <?php
		 if ($_REQUEST['id']==''){
	   ?>
	   
        <p class="novosti-2">Новости</p>
	 <?php  
	 include_once("config.php");
	   $num = 5;  
// Извлекаем из URL текущую страницу  
$page = isset($_GET['page']) ? $_GET['page'] : 1;
// Определяем общее число сообщений в базе данных  
$result = mysql_query("SELECT COUNT(*) FROM `news`");  
$posts = mysql_result($result, 0);  
// Находим общее число страниц  
$total = intval(($posts - 1) / $num) + 1;  
// Определяем начало сообщений для текущей страницы  
$page = intval($page);  
// Если значение $page меньше единицы или отрицательно  
// переходим на первую страницу  
// А если слишком большое, то переходим на последнюю  
if(empty($page) or $page < 0) $page = 1;  
  if($page > $total) $page = $total;  
// Вычисляем начиная к какого номера  
// следует выводить сообщения  
$start = $page * $num - $num;  
// Выбираем $num сообщений начиная с номера $start  
$result = mysql_query("SELECT * FROM `news`  ORDER BY id DESC LIMIT $start, $num");  
// В цикле переносим результаты запроса в массив $postrow  
while ( $postrow[] = mysql_fetch_array($result))  
?>

<?php  
for($i = 0; $i < $num; $i++)  
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
$month99 = new DateTime($postrow[$i]['date']); 
$month99=$month99->format('m'); 
$month=$month99;
$dfhdfh= new DateTime($postrow[$i]['date']);
?>	  
      <div class="group1-3">
         <p class="text-19"><?php if ($postrow[$i]['date']!=''){ echo  $dfhdfh->format('d') ; echo ' '; echo $Month_r[$month]; echo ' '; echo  $dfhdfh->format('Y') ;  echo $userdata['id']; } ?></p>
         <p class="text-20"><a href="news.php?id=<?php echo $postrow[$i]['id']; ?>"><?php echo $postrow[$i]['name']; ?> </a></p>
         <p class="text-21"><?php echo mb_substr ($postrow[$i]['text'], 0, 225, 'UTF-8');  ?></p>
        </div>
	<?php	   
}  
?>

<?php  
// Проверяем нужны ли стрелки назад  
$www=87;

$page2left = "";
$page1left = "";
$page1right = "";
$page2right = "";

if($page - 2 > 0){ $page2left = 'news.php?page='. ($page - 2) .'';}
if($page - 1 > 0){ $page1left = 'news.php?page='. ($page - 1) .'';  $www+=34;} 
if($page + 1 <= $total){$page1right = 'news.php?page='. ($page + 1) .'';   $www+=34;}
if($page + 2 <= $total){$page2right = 'news.php?page='. ($page + 2) .'';   $www+=34;}
?>
<center>
	<div class="postr-navigaciya group" align="center">
        <div class="navi_link first"><a href="news.php?page=1"><<</a></div>
        <div class="navi_link prev"><a href="<? echo $page1left; ?>"><</a></div>
		<?
				if ($page2left!="") echo "<div class='navi_link'><a href='$page2left'>".($page-2)."</a></div>";
				if ($page1left!="") echo "<div class='navi_link'><a href='$page1left'>".($page-1)."</a></div>";
				echo "<div class='navi_link'><a href='news.php?page=$page'>$page</a></div>";
				if ($page1right!="") echo "<div class='navi_link'><a href='$page1right'>".($page+1)."</a></div>";
				if ($page2right!="") echo "<div class='navi_link'><a href='$page2right'>".($page+2)."</a></div>";
		?>
        <div class="navi_link next"><a href="<? echo $page1right; ?>">></a></div>
        <div class="navi_link last"><a href="news.php?page=<? echo $total; ?>">>></a></div>
    </div>
</center>	   
	   <?php
		   }
		   
		   if ($_REQUEST['id']!=''){
	echo "<h1>".$userdata5['name']."</h1>";
	echo "<br><p class='text-21'>".$userdata5['text']."</p>";
		   ?>	  

	   
	   
	   	  	<?php
		   }
	   ?>
	   
	   
      </div>
</div>
     </div>
    </div>
   </div>
	   <?php
		   include_once("include/footer.php");
	   ?>
  </div>
 </body>
</html>