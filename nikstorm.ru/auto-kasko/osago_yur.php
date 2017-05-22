<?php
if ($_REQUEST['osago_yur']=='send'){
	if($_REQUEST['date']!="" && $_REQUEST['region']!="" && $_REQUEST['kategory']!="" && $_REQUEST['fio']!="" && $_REQUEST['inn']!="" && $_REQUEST['vin']!="" && $_REQUEST['losh']!="" && $_REQUEST['razshi']!="" && $_REQUEST['period']!="" && $_REQUEST['name']!="" && $_REQUEST['tel']!=""){
	mail("alexxei83@gmail.com", "Заявка с формы ОСАГО для юр. лиц", "Заявка с формы ОСАГО для юр. лиц \n Дата окончания полиса: ".$_REQUEST['date']."\n Регион регистрации ТС  : ".$_REQUEST['region']."\n Категория ТС: ".$_REQUEST['kategory']."\n Полное наименование юр.лица: ".$_REQUEST['fio']."\n ИНН: ".$_REQUEST['inn']."\n Vin номер: ".$_REQUEST['vin']."\n Лошадиные силы: ".$_REQUEST['losh']."\n Расширение: ".$_REQUEST['razshi']."\n Период страхования : ".$_REQUEST['period']."\n Имя: ".$_REQUEST['name']."\n Телефон: ".$_REQUEST['tel'].""); 
$_SESSION["send"]="ok";
}
header("Location: index.php");
exit;
}
?>

<!doctype html>
<html>
<head>
<title>ОСАГО для юридических лиц Москвы и МО</title>
<meta charset="UTF-8">
<meta name="description" content="Полис осаго для юридических лиц с бесплатной доставкой по Москве от ведущих страховых компаний.Подберем оптимальный вариант на выгодных условиях для вас.">
<meta name="keywords" content="осаго для юр лиц,осаго для юридических лиц,страхование осаго юридических лиц,страховка осаго для юридических лиц,полис осаго для юридических лиц">
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
        <p class="novosti-2">Осаго для юр. лиц</p>
		<form action="<?=$_SERVER["PHP_SELF"]?>" method="get"   id="osago_yur">
		<table>
		<tr>
		
		<td width="230px">
		<select required style="width:215px;" name="region" data-placeholder="Предупреждение" class="group12"   >
	  <option value="">Регион регистрации ТС</option>
	  <option value="Москва">Москва</option>
	  <option value="Московская обл.">Московская обл.</option>
	  <option value="Санкт - Петербург">Санкт - Петербург</option>
	  <option value="Ленинградская обл">Ленинградская обл</option>
	  </select>
		</td>
		
	    <td width="230px">
		<select required style="width:215px;" name="period" data-placeholder="Предупреждение" class="group12"   >
	  <option value="">Период страхования</option>
	  <option value="3 мес">3 мес</option>
	  <option value="4 мес">4 мес</option>
	  <option value="5 мес">5 мес</option>
	  <option value="6 мес">6 мес</option>
	  <option value="7 мес">7 мес</option>
	  <option value="8 мес">8 мес</option>
	  <option value="9 мес">9 мес</option>
	  <option value="10 и более">10 и более</option>
	  </select>
		</td>
		
		<td>
		<select required style="width:215px;" name="kategory" data-placeholder="Предупреждение" class="group12"   >
	  <option value="">Категория ТС</option>
	  <option value="А">"А"</option>
	  <option value="В">"В"</option>
	  <option value="С">"С"</option>
	  </select>
		</td>
		
		
		
		</tr>
				<tr>
		<td>
<input  required style="width:198px; margin-bottom: 20px;" class="group12" type="text" name="losh" placeholder="Лошадиные силы">
		</td>
		
		
		<td>
	  <input  required style="width:198px;" class="group12" type="text" name="date" placeholder="Дата окончания полиса">
		</td>
		
		<td>
		<select required style="width:215px;" name="razshi" data-placeholder="Предупреждение" class="group12"   >
	  <option value="">Расширение</option>
	  <option value="0">0</option>
	  <option value="300 000">300 000</option>
	  <option value="600 000">600 000</option>
	  <option value="1 000 000">1 000 000</option>
	  <option value="1 500 000">1 500 000</option>
	  <option value="3 000 000">3 000 000</option>
	  </select>
		</td>
		</tr>
		
		
		<table id="i_page1" style="margin-bottom: 20px;">
								<tr id="i_page1">
		<td colspan="3">
 <input  required style="width:424px;" class="group12" type="text" name="fio" placeholder="Полное наименование юр.лица"> 
		  <input  required style="width:198px;  margin-left: 7px;" class="group12" type="text" name="inn" placeholder="ИНН">
		</td>
		</tr>
		
</table>

								<tr>
		<td >
						 <input  required style="width:198px;" class="group12" type="text" name="vin" placeholder="Vin номер">
		</td>
		
		
		<td>
				 <input  required style="width:198px;margin-left: 7px;" class="group12" type="text" name="name" placeholder="Ваше имя">
		</td>
		
		<td>
				 <input  required style="width:198px;margin-left: 7px;" class="group12" type="text" name="tel" placeholder="Номер телефона">
		</td>
		</tr>
		
		
								<tr>
		<td>
		</td>
		
		
		<td>
		<input  required type="hidden" name="osago_yur" value="send">
		<center>	
		    <a href="javascript:void(0);" class="layer-4-holder1">Рассчитать</a>
    <input type="submit" id="submit1" style="display: none;" />
		</td>
		<td></td>
		</tr>
		
		</table>
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