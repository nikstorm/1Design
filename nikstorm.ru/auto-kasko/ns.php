<?php	
foreach ($_GET as $key => $value) {
   //       echo "$key   $value <br>";
}
	
if ($_REQUEST['ns']=='send'){
if($_REQUEST['travma']!="" && $_REQUEST['smert']!="" && $_REQUEST['invalidnost']!="" && $_REQUEST['name']!="" && $_REQUEST['tel']!="" && $_REQUEST['mail']!=""){
mail("alexxei83@gmail.com", "Заявка с формы НС", "Заявка с формы НС \n Травма: ".$_REQUEST['travma']."\n Смерть: ".$_REQUEST['smert']."\n Инвалидность: ".$_REQUEST['invalidnost']."\n Имя: ".$_REQUEST['name']."\n Телефон: ".$_REQUEST['tel']."\n Mail: ".$_REQUEST['mail']."\n"); 
$_SESSION["send"]="ok";
}
header("Location: index.php");
exit;
}
?>

<!doctype html>
<html>
<head>
<title>Личное страхование от несчастных случаев Москва</title>
<meta charset="UTF-8">
<meta name="description" content="Правила страхования от несчастныхслучаев.Полис страхования от несчастных случаев,
личное страхование – понадобится только удостоверение личности.Напишите заявление на страхование жизни от несчастного случая или 
сообщите по телефону.">
<meta name="keywords" content="полис страхования от несчастных случаев,личное страхование,страхование жизни от несчастного случая">
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
        <p class="novosti-2">НС</p>
		<form action="<?=$_SERVER["PHP_SELF"]?>" method="get"  id="ns" >
<table>
<tr>
   <td width="230px">
   <select required style="width:215px;" name="travma"  class="group12"   >
   <option value="">Травма </option>
   <option value="200 000">200 000</option>
   <option value="300 000">300 000</option>
   <option value="500 000">500 000</option>
   <option value="700 000">700 000</option>
   <option value="1 000 000">1 000 000</option>
   <option value="1 500 000">1 500 000</option>
   <option value="2 000 000">2 000 000</option>
   </select>
   </td>
   
   <td width="230px">
   <select required style="width:215px;margin-left: 10px;" name="smert" data-placeholder="Предупреждение" class="group12"   >
   <option value="">Смерть</option>
   <option value="200 000">200 000</option>
   <option value="300 000">300 000</option>
   <option value="500 000">500 000</option>
   <option value="700 000">700 000</option>
   <option value="1 000 000">1 000 000</option>
   <option value="1 500 000">1 500 000</option>
   <option value="2 000 000">2 000 000</option>
   </select>
   </td>
		
   <td>
   <select required style="width:215px;margin-left: 10px;" name="invalidnost" data-placeholder="Предупреждение" class="group12"   >
   <option value="">Инвалидность</option>
   <option value="200 000">200 000</option>
   <option value="300 000">300 000</option>
   <option value="500 000">500 000</option>
   <option value="700 000">700 000</option>
   <option value="1 000 000">1 000 000</option>
   <option value="1 500 000">1 500 000</option>
   <option value="2 000 000">2 000 000</option>
   </select>
   </td>
</tr>
		
<tr>
   <td >
   <input  required style="width:198px;" class="group12" type="text" name="name" placeholder="Ваше имя">
   </td>
		
   <td>
   <input  required style="width:198px;" class="group12" type="text" name="tel" placeholder="Номер телефона">
   </td>
		
   <td>
   <input style="width:198px;" class="group12" type="text" name="mail" placeholder="Email ( не обязательное поле )">
   </td>
</tr>
		
<tr>
   <td>
   </td>
		
   <td>
   <input  required type="hidden" name="ns" value="send">
   <center>
   <a href="javascript:void(0);" class="layer-4-holder1">Рассчитать</a>
   <input type="submit" id="submit1" style="display: none;" />
   </td>
   <td></td>
   </tr>
</table>
		
<?php
include_once("config.php");
$query = mysql_query("SELECT * FROM `news` ORDER BY `date` DESC LIMIT 1;");
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

?><br><br><br><br><br><br><hr>
      <div class="group1-3">
         <p class="text-19"><?php echo  $dfhdfh->format('d') ; echo ' '; echo $Month_r[$month]; echo ' '; echo  $dfhdfh->format('Y') ;  ?></p>
         <p class="text-20"><a href="news.php?id=<?php echo $userdata['id']; ?>"><?php echo $userdata['name']; ?> </a></p>
         <p class="text-21" style="width: 615px; margin-bottom: -44px;"><?php echo mb_substr ($userdata['text'], 0, 225, 'UTF-8'); ?></p>
        </div>
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