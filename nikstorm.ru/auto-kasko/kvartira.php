<?php	
foreach ($_GET as $key => $value) {
// echo "$key   $value <br>";
}
if ($_REQUEST['kvartira']=='send'){
if($_REQUEST['otdelka']!="" && $_REQUEST['imushestvo']!="" && $_REQUEST['cennoe']!="" && $_REQUEST['sdacha']!="" && $_REQUEST['konstruktiv']!="" && $_REQUEST['hrazdanskaja']!="" && $_REQUEST['paket']!="" && $_REQUEST['name']!="" && $_REQUEST['tel']!="" && $_REQUEST['strahovka']!=""){
mail("alexxei83@gmail.com", "Заявка с формы Квартира", "Заявка с формы Квартира \n Внутренняя отделка: ".$_REQUEST['otdelka']."\n Домашнее имущество: ".$_REQUEST['imushestvo']."\n Ценное имущество: ".$_REQUEST['cennoe']."\n Сдача в аренду: ".$_REQUEST['sdacha']."\n Конструктив: ".$_REQUEST['konstruktiv']."\n Гражданская ответственность: ".$_REQUEST['hrazdanskaja']."\n Пакет рисков : ".$_REQUEST['paket']."\n Имя: ".$_REQUEST['name']."\n Телефон: ".$_REQUEST['tel']."\n Квартира застрахована: ".$_REQUEST['strahovka']."\n"); 
$_SESSION["send"]="ok";
}
header("Location: index.php");
exit;
}
?>

<!doctype html>
<html>
<head>
<title>Застраховать квартиру в Москве и МО</title>
<meta charset="UTF-8">
<meta name="description" content="Страховка квартиры вполне может быть просчитана самостоятельно на этой странице.Чтобы 
застраховать квартиру, надо указать стоимость её отделки и имущества, выбрать пакет рисков. Страхование квартиры в Москве может 
включать гражданскую ответственность, её сумму тоже надо указать. Страхование жилья учитывает и пожарную безопасность материалов здания.">
<meta name="keywords" content="застраховать квартиру,страховка квартиры,страхование квартиры в москве,страхование жилья">
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
<style>
.tooltip { /* стиль текста, наведя или нажав на который появится пояснение */
  display: inline-block;
  position: relative;
  margin-left: 18px;
  top: 2px;
  text-indent: 0px;
  cursor: help; /* вид курсора */
}
.tooltip > span { /* стиль появляющейся подсказки */
  position: absolute;
  bottom: 100%;
  left: -20em; /* = max-width */
  right: -20em; /* = max-width */
  width: -moz-max-content;
  width: -webkit-max-content;
  width: max-content;  /* ширина подсказки может быть не более содержимого */
  max-width: 40em;  /* ширина подсказки может быть не более 20em */
  max-height: 80vh; /* необязательное ограничение по высоте подсказки, 1vh — это 1% от ширины окна */
  overflow: auto;
  visibility: hidden;
  margin: 0 auto .4em; /* поднята на .4em над текстом, наведя или нажав на который появится пояснение */
  padding: .3em;
  border: solid rgb(200,200,200);
  font-size: 90%;
  background: #fff;
  line-height: normal;
  cursor: auto;
}

.tooltip:after { /* треугольничек под подсказкой; тут тоже везде .4em */
  content: "";
  position: absolute;
  top: -.4em;
  left: 50%;
  visibility: hidden;
  margin: 0 0 0 -.4em;
  border: .4em solid;
  border-color: rgb(200,200,200) transparent transparent transparent;
  cursor: auto;
}

.tooltip:before { /* поле между текстом, наведя или нажав на который появится пояснение, и подсказкой нужно чтобы, если перевести курсор мышки на подсказку, та не исчезла; тут тоже везде .4em */
  content: "";
  position: absolute;
  top: -.4em;
  left: 0;
  right: 0;
  height: .4em;
  visibility: hidden;
}
.tooltip:hover > span,
.tooltip:hover:before,
.tooltip:hover:after,
.tooltip:focus > span,
.tooltip:focus:before,
.tooltip:focus:after {
  visibility: visible;
  transition: 0s .4s;
}
.tooltip:focus { /* убрать рамку в Хроме */
  outline: none;
}
.tooltip.anim > span,
.tooltip.anim:after { /* анимация */
  opacity: 0;
  transform: translateY(1.5em) scale(.3);
  transform-origin: center bottom;
}
.tooltip.anim:after {
  transform: translateY(.7em) scale(.3); /* 1.7 = 1.5 / (1.4*2) */
}
.tooltip.anim:hover > span,
.tooltip.anim:hover:after,
.tooltip.anim:focus > span,
.tooltip.anim:focus:after {
  opacity: 1;
  transition: .6s .4s;
  transform: translateY(0);
}
@media (max-width: 20em) { /* ширина подсказки может быть не более ширины окна браузера */
  .tooltip > span {
    max-width: 100vw; /* в 100vw входит полоса прокрутки, но на мобильных она часто отсутствует */
    box-sizing: border-box;
  }
}
</style>
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
        <p class="novosti-2">Квартира</p>
		<form action="<?=$_SERVER["PHP_SELF"]?>" method="get"  id="kvartira" >
<table>
<tr>
   <td width="230px">
   <select required style="width:215px;" name="otdelka" data-placeholder="Предупреждение" class="group12"   >
   <option value="">Внутренняя отделка</option>
   <option value="0">0</option>
   <option value="500 000">500 000</option>
   <option value="700 000">700 000</option>
   <option value="1 000 000">1 000 000</option>
   <option value="1 500 000">1 500 000</option>
   <option value="2 000 000">2 000 000</option>
   </select>
   </td>		
		
   <td width="230px">
   <select required style="width:215px;margin-left: 10px;" name="imushestvo" data-placeholder="Предупреждение" class="group12"   >
   <option value="">Домашнее имущество</option>
   <option value="0">0</option>
   <option value="500 000">500 000</option>
   <option value="700 000">700 000</option>
   <option value="1 000 000">1 000 000</option>
   <option value="1 500 000">1 500 000</option>
   <option value="2 000 000">2 000 000</option>
   </select>
   </td>	

   <td width="230px">
   <select required style="width:215px;margin-left: 10px;" name="cennoe" data-placeholder="Предупреждение" class="group12"   >
   <option value="">Ценное имущество </option>
   <option value="0">0</option>
   <option value="500 000">500 000</option>
   <option value="700 000">700 000</option>
   <option value="1 000 000">1 000 000</option>
   <option value="1 500 000">1 500 000</option>
   <option value="2 000 000">2 000 000</option>
   </select>
   </td>
</tr>
				
<tr>
   <td>
   <select required style="width:215px;" name="sdacha" data-placeholder="Предупреждение" class="group12"   >
   <option value="">Аренда</option>
   <option value="Да">Да</option>
   <option value="Нет">Нет</option>
   </select>
   </td>	

   <td>
   <select required style="width:215px;margin-left: 10px;" name="konstruktiv" data-placeholder="Предупреждение" class="group12"   >
   <option value="">Конструктив</option>
   <option value="полностью не горючие">полностью не горючие</option>
   <option value="горючие перекрытия">горючие перекрытия</option>
   <option value="горючие несущие и ненесущие стены">горючие несущие и ненесущие стены</option>
   </select>
   </td>
		
   <td>
   <select required style="width:215px;margin-left: 10px;" name="hrazdanskaja" data-placeholder="Предупреждение" class="group12"   >
   <option value="">Граж. ответственность</option>
   <option value="0">0</option>
   <option value="300 000">300 000</option>
   <option value="500 000">500 000</option>
   <option value="700 000">600 000</option>
   <option value="1 000 000">1 000 000</option>
   <option value="1 500 000">1 500 000</option>
   <option value="2 000 000">2 000 000</option>
   </select>
   </td>
</tr>
		
<tr>
   <td>
   <br><br><b>Пакет рисков </b> <span class="tooltip anim" tabindex="0"><img src="images/quest.jpg" width="16" height="14"><span>
   <b>Вариант «Эконом»</b>: Пожар, удар молнии, взрыв газа, употребляемого для бытовых надобностей.
   <br><b>Вариант «Стандарт»</b>: Пожар, удар молнии, взрыв газа, употребляемого для бытовых надобностей; повреждение застрахованного имущества водой из водопроводных, канализационных, отопительных систем и систем пожаротушения; противоправные действия третьих лиц (кража со взломом, грабеж).
   <br><b>Вариант «Комфорт»</b>: Пожар, удар молнии, взрыв газа, употребляемого для бытовых надобностей; стихийные бедствия; повреждение застрахованного имущества водой из водопроводных, канализационных, отопительных систем и систем пожаротушения; противоправные действия третьих лиц (кража со взломом, грабеж, умышленное уничтожение или повреждение имущества третьими лицами; падение на застрахованное имущество летающих объектов или их обломков, деревьев или их частей (за исключением сухостоя), опор линий электропередач; наезд транспортного средства; взрыв.
   </span></span>
   <br>
   <select required style="width:215px; " name="paket" data-placeholder="Предупреждение" class="group12"   >
   <option value="">Выбрать</option>
   <option value="Эконом">Эконом</option>
   <option value="Стандарт">Стандарт</option>
   <option value="Комфорт">Комфорт</option>
   </select>
   </td>
		
   <td>
   <td></td>
</tr>

<tr>
   <td >
   <input  required style="width:198px;" class="group12" type="text" name="name" placeholder="Ваше имя">
   </td>
		
   <td>
   <input  required style="width:198px;" class="group12" type="text" name="tel" placeholder="Номер телефона">
   </td>
		
   <td>
   <select required style="width:215px;margin-left: 10px;" name="strahovka" data-placeholder="Предупреждение" class="group12"   >
   <option value="">Квартира застрахована</option>
   <option value="Да">Да</option>
   <option value="Нет">Нет</option>
   </select>
   </td>
</tr>
		
<tr>
   <td><br><br>
   </td>
		
   <td>
   <input  required type="hidden" name="kvartira" value="send">
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