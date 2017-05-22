﻿<!doctype html>
<html>
<head>
<title>Заказать полис ОСАГО с доставкой по Москве</title>
<meta http-equiv="Content-Type" content="text/html; charset=uft-8">
<meta name="description" content="У нас можно оформить полис осаго на выгодных условиях. Действует удобная для заказчика доставка 
осаго на дом, цены - самые низкие в столице. Мы предлагаем купить полис осаго и гарантируем его действительность. Полис будет 
зарегистрирован в базе данных ГИБДД, в случае аварии страховая компания осуществит выплаты по нему. ОСАГО с доставкой - это выгодно 
и удобно. Если Вам необходимо купить осаго в Москве, важна стоимость документа и условия обслуживания - обращайтесь к нам.">
<meta name="keywords" content="осаго с доставкой,купить осаго в москве,осаго купить дешево,оформить полис осаго,осаго на дом">
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
        <p class="novosti-2">Осаго</p>
		<form action="manage.php" method="get"  id="osago" >
		<table>
		<tr>
		<td width="230px">
	<style type="text/css"> 
select { width: 400px; text-align:center; } 
select .lt { text-align:left; } 
</style> 

<select  style="width:215px;" required name="propiska" class="group12">
<option value="">Прописка собственника</option>
<option value="Москва">Москва</option>
<option value="Московская обл.">Московская обл.</option>
<option value="Санкт - Петербург">Санкт - Петербург</option>
<option value="Ленинградская обл">Ленинградская обл</option>
</select>
</td>
		
<td width="230px">
<select style="width:215px;" required name="period" data-placeholder="Предупреждение" class="group12"   >
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
<select style="width:215px;" required name="kategori" data-placeholder="Предупреждение" class="group12"   >
<option value="">Категория ТС</option>
<option value="А">"А"</option>
<option value="В">"В"</option>
<option value="С">"С"</option>
</select>
</td>
</tr>
	  
<tr>
<td>
<input style="width:197px;" required class="group12" type="text" name="losh" placeholder="Лошадиные силы">
</td>
		
<td>
<input style="width:198px;" required class="group12" type="text"  name="date" placeholder="Дата окончания полиса">
</td>
		
<td>
<select style="width:215px;" required name="razshiren" data-placeholder="Предупреждение" class="group12">
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
		
<tr>
<td>
<select style="width:215px; " required name="voditel" data-placeholder="Предупреждение" class="group12"  onchange="f_go(this.value)" >
<option value="1">1 Водитель</option>
<option value="2">2 Водителя</option>
<option value="3">3 Водителя</option>
<option value="4">4 Водителя</option>
<option value="5">5 Водителей</option>
<option value="6">Без ограничений</option>
</select>
</td>
		
<td>
<td>
</td>
</tr>
		
<?php
include_once("form.php");
?>
<tr>
<td >
<input required style="width:198px;" class="group12" type="text" name="name" placeholder="Ваше имя">
</td>
		
<td>
<input required style="width:198px; margin-left: 7px;" class="group12" type="text" name="tel" placeholder="Номер телефона">
</td>

<td>
<input  style="width:198px;margin-left: 7px;" class="group12" type="text" name="mail" placeholder="Email ( не обязательное поле )">
</td>
</tr>
		
<tr>
<td>
</td>
		
<td>
<input type="hidden" name="osago" value="send">
<center>
<a href="javascript:void(0);" class="layer-4-holder1">Рассчитать</a>
<input type="submit" id="submit1" style="display: none;" />
</td>
<td>
</td>
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
	if(m_page==6){
		document.getElementById('i_page6').style.display='block';
		document.getElementById('i_page1').style.display='none';
		document.getElementById('i_page2').style.display='none';
		document.getElementById('i_page3').style.display='none';
		document.getElementById('i_page4').style.display='none';
		document.getElementById('i_page5').style.display='none';
	}
	if(m_page==5){
		document.getElementById('i_page6').style.display='none';
		document.getElementById('i_page1').style.display='block';
		document.getElementById('i_page2').style.display='block';
		document.getElementById('i_page3').style.display='block';
		document.getElementById('i_page4').style.display='block';
		document.getElementById('i_page5').style.display='block';
	}
	if(m_page==4){
		document.getElementById('i_page6').style.display='none';
		document.getElementById('i_page1').style.display='block';
		document.getElementById('i_page2').style.display='block';
		document.getElementById('i_page3').style.display='block';
		document.getElementById('i_page4').style.display='block';
		document.getElementById('i_page5').style.display='none';
	}
	if(m_page==3){
		document.getElementById('i_page6').style.display='none';
		document.getElementById('i_page1').style.display='block';
		document.getElementById('i_page2').style.display='block';
		document.getElementById('i_page3').style.display='block';
		document.getElementById('i_page4').style.display='none';
		document.getElementById('i_page5').style.display='none';
	}
	if(m_page==2){
		document.getElementById('i_page6').style.display='none';
		document.getElementById('i_page1').style.display='block';
		document.getElementById('i_page2').style.display='block';
		document.getElementById('i_page3').style.display='none';
		document.getElementById('i_page4').style.display='none';
		document.getElementById('i_page5').style.display='none';
	}
	if(m_page==1){
		document.getElementById('i_page6').style.display='none';
		document.getElementById('i_page1').style.display='block';
		document.getElementById('i_page2').style.display='none';
		document.getElementById('i_page3').style.display='none';
		document.getElementById('i_page4').style.display='none';
		document.getElementById('i_page5').style.display='none';
	}
}
f_go(1);
document.getElementById('pageselect').style.display = '';
//-->
</script>
</html>