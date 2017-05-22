<!doctype html>
<html>
<head>
<title>Купить полис каско с доставкой на дом</title>
<meta charset="UTF-8">
<meta name="description" content="На данный момент следует задуматься о безопасности авто. Лучший способ обезопасить свою машину - купить каско.
Благодаря нему ваш любимый автомобиль будет застрахован от угона, кражи, пожара. Многие интересуются - как оформить полис каско со скидкой, так как цены в наше время немалые. В этом поможет auto-kasko.info.">
<meta name="keywords" content="купить каско,застраховать каско,купить полис каско,оформить полис каско,приобрести каско">
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
        <p class="novosti-2">Каско</p>
		<form action="manage.php" method="get"  id="kasko" >
<table>
<tr>
   <td width="230px">
   <select required style="width:215px;" name="propiska" data-placeholder="Предупреждение" class="group12"   >
   <option value="">Прописка собственника</option>
   <option value="Москва">Москва</option>
   <option value="Московская обл.">Московская обл.</option>
   <option value="Санкт - Петербург">Санкт - Петербург</option>
   <option value="Ленинградская обл">Ленинградская обл</option>
   </select>
   </td>
		
   <td width="230px">
   <select required style="width:215px;" name="forma" data-placeholder="Предупреждение" class="group12"   >
   <option value="">Форма возмещения</option>
   <option value="Ремонт у официального диллера">Ремонт у официального диллера</option>
   <option value="Ремонт у неофициального диллера">Ремонт у неофициального диллера</option>
   </select>
   </td>
		
   <td>
   <select required style="width:215px;" name="oplata" data-placeholder="Предупреждение" class="group12"   >
   <option value="">Оплата </option>
   <option value="Единовременно">Единовременно</option>
   <option value="Раз в полгода">Раз в полгода</option>
   </select>
   </td>
</tr>

<tr>
   <td>
   <input  required style="width:198px; margin-bottom: 10px;" class="group12" type="text" name="marka" placeholder="Марка ТС">
   </td>
		
   <td>
   <input  required style="width:198px; " class="group12" type="text" name="model" placeholder="Модель ТС">
   </td>
		
   <td>
   <input  required style="width:198px; " class="group12" type="text" name="hod" placeholder="Год выпуска">
   </td>
</tr>
		
<tr>
   <td>
   <input  required style="width:198px; " class="group12" type="text" name="data" placeholder="Дата эксплуатации по ПТС">
   </td>
		
   <td>
   <input  required style="width:198px; " class="group12" type="text" name="stoimost" placeholder="Стоимость ТС">
   </td>
		
   <td>
   <input  required style="width:198px; " class="group12" type="text" name="sili" placeholder="Лошадиные силы">
   </td>
</tr>

<tr>
   <td>
   <select required style="width:215px; " name="voditel" data-placeholder="Предупреждение" class="group12"  onchange="f_go(this.value)" >
   <option value="1">1 Водитель</option>
   <option value="2">2 Водителя</option>
   <option value="3">3 Водителя</option>
   <option value="4">Без ограничений</option>
   </select>
   </td>
		
   <td>
   <td></td>
</tr>

<?php
include_once("form_kasko.php");
?>
<tr>
   <td >
   <input  required style="width:198px; margin-top: 20px;" class="group12" type="text" name="name" placeholder="Ваше имя">
   </td>
		
   <td>
   <input  required style="width:198px;margin-left: 7px;" class="group12" type="text" name="tel" placeholder="Номер телефона">
   </td>
		
   <td>
   <input  style="width:198px;margin-left: 7px;" class="group12" type="text" name="mail" placeholder="Email ( не обязательное поле )">
   </td>
</tr>
		
<tr>
<td>
</td>
		
   <td>
   <input  required type="hidden" name="kasko" value="send">
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
<script type="text/javascript">
//<!--
function f_go(m_page) {
	if(m_page==4){
		document.getElementById('i_page1').style.display='none';
		document.getElementById('i_page2').style.display='none';
		document.getElementById('i_page3').style.display='none';
		document.getElementById('i_page4').style.display='block';
	}
	if(m_page==3){
		document.getElementById('i_page1').style.display='block';
		document.getElementById('i_page2').style.display='block';
		document.getElementById('i_page3').style.display='block';
		document.getElementById('i_page4').style.display='none';
	}
	if(m_page==2){
		document.getElementById('i_page1').style.display='block';
		document.getElementById('i_page2').style.display='block';
		document.getElementById('i_page3').style.display='none';
		document.getElementById('i_page4').style.display='none';
	}
	if(m_page==1){
		document.getElementById('i_page1').style.display='block';
		document.getElementById('i_page2').style.display='none';
		document.getElementById('i_page3').style.display='none';
		document.getElementById('i_page4').style.display='none';
	}
}
f_go(1);
document.getElementById('pageselect').style.display = '';
//-->
</script>
</html>