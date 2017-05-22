<?php	
foreach ($_GET as $key => $value) {
//   echo "$key   $value <br>";
}
if ($_REQUEST['dacha']=='send'){

if ($_REQUEST['stroenie']=='Да'){$stroenie="\n Пакет рисков: ".$_REQUEST['paket2']."\n Площадь: ".$_REQUEST['plo1']."\n Конструктив: ".$_REQUEST['konstruktiv2']."\n Стоимость: ".$_REQUEST['sto1']."";}
if ($_REQUEST['dom_imuzestvo']=='Да'){$dom_imuzestvo="\n Пакет рисков: ".$_REQUEST['paket3']."\n Стоимость: ".$_REQUEST['sto2']."";}
if ($_REQUEST['zabor']=='Да'){$zabor="\n Пакет рисков: ".$_REQUEST['paket4']."\n Конструктив: ".$_REQUEST['konstruktiv4']."\n Стоимость: ".$_REQUEST['sto3']."";}
	if($_REQUEST['strahovanie']!="" && $_REQUEST['plosad_doma']!="" && $_REQUEST['konstruktiv1']!="" && $_REQUEST['stoimost']!="" && $_REQUEST['prozivanie']!="" && $_REQUEST['arenda']!=""
	&& $_REQUEST['paket1']!="" && $_REQUEST['domvzaloge']!="" && $_REQUEST['istochnik']!="" && $_REQUEST['oxrana']!="" && $_REQUEST['hrazdanskaja']!="" 
	&& $_REQUEST['stroenie']!="" && $_REQUEST['dom_imuzestvo']!="" && $_REQUEST['zabor']!="" && $_REQUEST['name']!="" && $_REQUEST['tel']!="" && $_REQUEST['strahovka']!=""){
mail("alexxei83@gmail.com", "Заявка с формы Дача", "Заявка с формы Дача 
\n Страхование дома: ".$_REQUEST['strahovanie']."\n Площадь дома: ".$_REQUEST['plosad_doma']."\n Конструктив: ".$_REQUEST['konstruktiv1']."\n Стоимость дома: ".$_REQUEST['stoimost']."\n Проживание: ".$_REQUEST['prozivanie']."\n Аренда: ".$_REQUEST['arenda']."


\n Пакет рисков : ".$_REQUEST['paket1']."\n Дом в залоге: ".$_REQUEST['domvzaloge']."\n Источник огня: ".$_REQUEST['istochnik']."\n Охрана: ".$_REQUEST['oxrana']."\n Гражд. Ответственность: ".$_REQUEST['hrazdanskaja']."
 
\n Отдельное строение: ".$_REQUEST['stroenie']." ".$stroenie."

\n Домашнее имущество: ".$_REQUEST['dom_imuzestvo']." ".$dom_imuzestvo."

\n Забор: ".$_REQUEST['zabor']." ".$zabor."

\n Имя: ".$_REQUEST['name']."\n Телефон: ".$_REQUEST['tel']."\n Квартира застрахована: ".$_REQUEST['strahovka']."\n"); 
$_SESSION["send"]="ok";
}
header("Location: index.php");
exit;
}
?>

<!doctype html>
<html>
<head>
<title>Страхование дачных домов и коттеджей онлайн</title>
<meta charset="UTF-8">
<meta name="description" content="Выгодно застраховать дом,дачу.Работаем оперативно,условия привлекательные.
Рассчитать стоимость онлайн или с помощью специалиста и застраховать дачный дом.">
<meta name="keywords" content="застраховать дачу,застраховать дом,застраховать дачный дом">
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
<script type='text/javascript' src='//code.jquery.com/jquery-2.1.0.js'></script>

<!--<script type='text/javascript' src='include/jquery-1.10.1.min.js'></script> -->

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

.line  {
 border-top: 1px dashed #858281; /* Параметры линии */
 height: 18px; /* Высота блока */
  margin-top: 20px;
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
        <p class="novosti-2">Дача</p>
		<form action="<?=$_SERVER["PHP_SELF"]?>" method="get"  id="dacha" >
<table>
<tr>
   <td width="230px">
   <select required style="width:215px;" name="strahovanie" data-placeholder="Предупреждение" class="group12"   >
   <option value="">Страхование дома</option>
   <option value="с отделкой">с отделкой</option>
   <option value="без отделки">без отделки</option>
   </select>
   </td>		
		
   <td width="230px">
   <input  required style="width:198px;" class="group12" type="text" name="plosad_doma" placeholder="Площадь дома">
   </td>	

   <td width="230px">
   <select required style="width:215px;" name="konstruktiv1" data-placeholder="Предупреждение" class="group12"   >
   <option value="">Конструктив</option>
   <option value="не горючий">не горючий</option>
   <option value="комбинированный">комбинированный</option>
   <option value="горючий">горючий</option>
   </select>
   </td>
</tr>
				
<tr>
   <td>
   <input  required style="width:198px;" class="group12" type="text" name="stoimost" placeholder="Стоимость дома ">
   </td>	

   <td>
   <select required style="width:215px;" name="prozivanie" data-placeholder="Предупреждение" class="group12"   >
   <option value="">Проживание</option>
   <option value="временное">временное</option>
   <option value="постоянное">постоянное</option>
   </select>
   </td>
		
   <td>
   <select required style="width:215px;" name="arenda" data-placeholder="Предупреждение" class="group12"   >
   <option value="">Аренда</option>
   <option value="Да">Да</option>
   <option value="Нет">Нет</option>
   </select>
   </td>
</tr>
		
<tr>
   <td>
<br><br><b>Пакет рисков </b><span class="tooltip anim" tabindex="0"><img src="images/quest.jpg" width="16" height="14"><span>
<b>Вариант 1</b> - Пожар, удар молнии, взрыв газа, употребляемого для бытовых надобностей.
<br><b>Вариант 2</b> - Пожар, удар молнии, взрыв газа, употребляемого для бытовых надобностей, стихийные бедствия, противоправные действия третьих лиц (умышленное уничтожение или повреждение имущества третьими лицами).
<br><b>Вариант 3</b> - Пожар, удар молнии, взрыв газа, употребляемого для бытовых надобностей, стихийные бедствия, противоправные действия третьих лиц (кража со взломом, грабеж, разбой, умышленное уничтожение или повреждение имущества третьими лицами); повреждение застрахованного имущества водой из водопроводных, канализационных, отопительных систем и систем пожаротушения, падение на застрахованное имущество летающих объектов или их обломков, наезд транспортного средства, падение на застрахованное имущество деревьев или их частей (за исключением сухостоя), опор линий электропередач.
</span></span>
   </td>
   <td></td>
   <td></td>
</tr>
		
<tr>
   <td>
   <select required style="width:215px; " name="paket1" data-placeholder="Предупреждение" class="group12" >
   <option value="">Выбрать</option>
   <option value="вариант 1">вариант 1</option>
   <option value="вариант 2">вариант 2</option>
   <option value="вариант 3">вариант 3</option>
   </select>
   </td>
		
   <td>
   <select required style="width:215px; " name="domvzaloge" data-placeholder="Предупреждение" class="group12" >
   <option value="">Дом в залоге </option>
   <option value="Да">Да</option>
   <option value="Нет">Нет</option>
   </select>
   </td>

   <td></td>
</tr>

<tr>
   <td>
   <select required style="width:215px; " name="istochnik" data-placeholder="Предупреждение" class="group12" >
   <option value="">Источник огня</option>
   <option value="Нет">Нет</option>
   <option value="камин">камин</option>
   <option value="баня в доме">баня в доме</option>
   <option value="печь">печь</option>
   <option value="газ">газ</option>
   <option value="отопление пола">отопление пола</option>
   </select>
   <div class="line"></div>
   </td>
		
   <td>
   <select required style="width:215px; " name="oxrana" data-placeholder="Предупреждение" class="group12" >
   <option value="">Охрана</option>
   <option value="Нет">Нет</option>
   <option value="мет. решетки">мет. решетки</option>
   <option value="видеонаблюдение">видеонаблюдение</option>
   <option value="сигнализация (ОВД)">сигнализация (ОВД)</option>
   </select>
   <div class="line"></div>
   </td>

   <td>
   <select required style="width:215px;" name="hrazdanskaja" data-placeholder="Предупреждение" class="group12"   >
   <option value="">Гражд. Ответственность</option>
   <option value="0">0</option>
   <option value="300 000">300 000</option>
   <option value="500 000">500 000</option>
   <option value="700 000">700 000</option>
   <option value="1 000 000">1 000 000</option>
   <option value="1 500 000">1 500 000</option>
   <option value="2 000 000">2 000 000</option>
   </select>
   <div class="line"></div>
   </td>
</tr>
		
<tr>
   <td>
<b>Отдельное строение </b><span class="tooltip anim" tabindex="0"><img src="images/quest.jpg" width="16" height="14"><span>
Гараж, баня, сауна, сарай, хозстроение,  бассейн, летняя кухня, беседка и т.д.)
</span></span>
   </td>
   <td>
<b style="">Пакет рисков </b> <span class="tooltip anim" tabindex="0"><img src="images/quest.jpg" width="16" height="14"><span>
<b>Вариант 1</b> - Пожар, удар молнии, взрыв газа, употребляемого для бытовых надобностей.
<br><b>Вариант 2</b> - Пожар, удар молнии, взрыв газа, употребляемого для бытовых надобностей, стихийные бедствия, противоправные действия третьих лиц (умышленное уничтожение или повреждение имущества третьими лицами).
<br><b>Вариант 3</b> - Пожар, удар молнии, взрыв газа, употребляемого для бытовых надобностей, стихийные бедствия, противоправные действия третьих лиц (кража со взломом, грабеж, разбой, умышленное уничтожение или повреждение имущества третьими лицами); повреждение застрахованного имущества водой из водопроводных, канализационных, отопительных систем и систем пожаротушения, падение на застрахованное имущество летающих объектов или их обломков, наезд транспортного средства, падение на застрахованное имущество деревьев или их частей (за исключением сухостоя), опор линий электропередач.
</span></span>
   </td>
   <td></td>
</tr>

<tr>
    <td>
<!-- <script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){ 
$('.group128').on('change',function(){
   $('input#selection, select#selection').attr("disabled", "disabled");
});
});//]]>  
-->
</script>

<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$('.group128').on('change', function () {
    console.log($(this).val());
    if ($(this).val() !== 'Да') {
        $('input#selection, select#selection').attr("disabled", "disabled");
    } else {
        $('input#selection, select#selection').removeAttr("disabled");
    }
});


});//]]>  

</script>	
		
<select required style="width:215px; " name="stroenie" data-placeholder="Предупреждение" class="group128" >
<option value="Нет">Нет</option>
<option value="Да" selected="selected">Да</option>
</select>
   </td>
		
   <td>
   <select required id="selection" style="width:215px; " name="paket2" data-placeholder="Предупреждение" class="group12" >
   <option value="">Выбрать</option>
   <option value="вариант 1">вариант 1</option>
   <option value="вариант 2">вариант 2</option>
   <option value="вариант 3">вариант 3</option>
   </select>
   </td>

   <td></td>
</tr>

<tr>
   <td>
   <input  required id="selection" style="width:198px;" class="group12" type="text" name="plo1" placeholder="Площадь">
   <div class="line"></div>
   </td>
		
   <td>
   <select required id="selection" style="width:215px; " name="konstruktiv2" data-placeholder="Предупреждение" class="group12" >
   <option value="">Конструктив</option>
   <option value="не горючий">не горючий</option>
   <option value="комбинированный">комбинированный</option>
   <option value="горючий">горючий</option>
   </select>
   <div class="line"></div>
   </td>

   <td>
   <input  required id="selection" style="width:198px;" class="group12" type="text" name="sto1" placeholder="Стоимость">
   <div class="line"></div>
   </td>
</tr>

<tr>
   <td><b>Забор</b></td>
   
   <td>
<b style="">Пакет рисков </b> <span class="tooltip anim" tabindex="0"><img src="images/quest.jpg" width="16" height="14"><span>
<b>Вариант 1</b> - Пожар, удар молнии, взрыв газа, употребляемого для бытовых надобностей.
<br><b>Вариант 2</b> - Пожар, удар молнии, взрыв газа, употребляемого для бытовых надобностей, стихийные бедствия, противоправные действия третьих лиц (умышленное уничтожение или повреждение имущества третьими лицами).
<br><b>Вариант 3</b> - Пожар, удар молнии, взрыв газа, употребляемого для бытовых надобностей, стихийные бедствия, противоправные действия третьих лиц (кража со взломом, грабеж, разбой, умышленное уничтожение или повреждение имущества третьими лицами); повреждение застрахованного имущества водой из водопроводных, канализационных, отопительных систем и систем пожаротушения, падение на застрахованное имущество летающих объектов или их обломков, наезд транспортного средства, падение на застрахованное имущество деревьев или их частей (за исключением сухостоя), опор линий электропередач.
</span></span>
   </td>
   <td></td>
</tr>

<tr>
   <td>
<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$('.group123').on('change', function () {
    console.log($(this).val());
    if ($(this).val() !== 'Да') {
        $('input#selection3, select#selection3').attr("disabled", "disabled");
    } else {
        $('input#selection3, select#selection3').removeAttr("disabled");
    }
});


});//]]> 
</script>
   <select required style="width:215px; " name="zabor" data-placeholder="Предупреждение" class="group123" >
   <option value="Нет">Нет</option>
   <option value="Да" selected="selected">Да</option>
   </select>
   </td>
		
   <td>
   <select required id="selection3" style="width:215px;margin-left:10px;padding: 3px 8px 6px;" name="paket4" data-placeholder="Предупреждение" class="group12" >
   <option value="">Выбрать</option>
   <option value="вариант 1">вариант 1</option>
   <option value="вариант 2">вариант 2</option>
   <option value="вариант 3">вариант 3</option>
   </select>
   </td>
   <td></td>
</tr>

<tr>
   <td>
   <select required id="selection3" style="width:215px; " name="konstruktiv4" data-placeholder="Предупреждение" class="group12" >
   <option value="">Конструктив</option>
   <option value="не горючий">не горючий</option>
   <option value="комбинированный">комбинированный</option>
   <option value="горючий">горючий</option>
   </select>
   <div class="line"></div>
   </td>

   <td>
   <input  required id="selection3" style="width:198px;" class="group12" type="text" name="sto3" placeholder="Стоимость">
   <div class="line"></div>
   </td>
		
   <td>
   <input   id="selection3" style="width:198px; opacity:0;" class="group12" type="text">
   <div class="line"></div>
   </td>
</tr>
		
<tr>
   <td>
<b style="margin-left: 1px;">Домашнее имущество  </b> <span class="tooltip anim" tabindex="0"><img src="images/quest.jpg" width="16" height="14"><span>
Мебель, бытовая техника ,вычислительная техника, оргтехника, периферийные устройства; телевизоры, радио-, аудио-, видеотехника, средства связи; одежда, обувь, спортивно-туристический инвентарь, предметы интерьера 
</span></span>
   </td>
   <td>
<b style="">Пакет рисков </b> <span class="tooltip anim" tabindex="0"><img src="images/quest.jpg" width="16" height="14"><span>
<b>Вариант 1</b> - Пожар, удар молнии, взрыв газа, употребляемого для бытовых надобностей.
<br><b>Вариант 2</b> - Пожар, удар молнии, взрыв газа, употребляемого для бытовых надобностей, стихийные бедствия, противоправные действия третьих лиц (умышленное уничтожение или повреждение имущества третьими лицами).
<br><b>Вариант 3</b> - Пожар, удар молнии, взрыв газа, употребляемого для бытовых надобностей, стихийные бедствия, противоправные действия третьих лиц (кража со взломом, грабеж, разбой, умышленное уничтожение или повреждение имущества третьими лицами); повреждение застрахованного имущества водой из водопроводных, канализационных, отопительных систем и систем пожаротушения, падение на застрахованное имущество летающих объектов или их обломков, наезд транспортного средства, падение на застрахованное имущество деревьев или их частей (за исключением сухостоя), опор линий электропередач.
</span></span>
   </td>
   <td></td>
</tr>

<tr>
   <td>
<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$('.group122').on('change', function () {
    console.log($(this).val());
    if ($(this).val() !== 'Да') {
        $('input#selection2, select#selection2').attr("disabled", "disabled");
    } else {
        $('input#selection2, select#selection2').removeAttr("disabled");
    }
});


});//]]>  

</script>
   <select required style="width:215px; " name="dom_imuzestvo" data-placeholder="Предупреждение" class="group122" >
   <option value="Нет">Нет</option>
   <option value="Да" selected="selected">Да</option>
   </select>
   <div class="line"></div>
   </td>
		
   <td>
   <select required id="selection2" style="width:215px; " name="paket3" data-placeholder="Предупреждение" class="group12" >
   <option value="">Выбрать</option>
   <option value="вариант 1">вариант 1</option>
   <option value="вариант 2">вариант 2</option>
   <option value="вариант 3">вариант 3</option>
   </select>
   <div class="line"></div>
   </td>

   <td>
   <input  required id="selection2" style="width:198px;" class="group12" type="text" name="sto2" placeholder="Стоимость">
   <div class="line"></div>
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
   <select required style="width:215px;" name="strahovka" data-placeholder="Предупреждение" class="group12"   >
   <option value="">Дом застрахован</option>
   <option value="Да">Да</option>
   <option value="Нет">Нет</option>
   </select>
   </td>
</tr>

<tr>
   <td><br><br>
   </td>
		
   <td>
   <input  required type="hidden" name="dacha" value="send">
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