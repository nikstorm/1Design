<!doctype html>
<html>
<head>
<title>Контакты</title>
<meta charset="UTF-8">
<meta name="description" content="Все виды страхования.Оперативное реагирование на каждое обращение.Расчет КАСКО, ОСАГО онлайн.
Все контакты для постоянного доступа к консультантам и менеджерам.">
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
	.tab-holder-3{   background: #E5E5E5;
height: 21px;
z-index: 2;
border-bottom-right-radius:0;border-bottom-left-radius:0;
-webkit-box-shadow: none;
box-shadow: none;
text-shadow: none;
color: #000;
}}</style>
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
        <p class="novosti-2">Контакты</p>
  
      <div style="  float: left; position: relative; width: 235px; height: 250px;">
		<form action="manage.php" method="post"  id="contact" >
		<input style="width: 259px;" required class="group12" type="text" name="name22"  placeholder="Ваше имя">
       <div class="wrapper-6">
        <div class="dropdown-copy">
         <div class="group1-2">
		 <input style="width: 259px;" required class="group112" type="text" name="mail22"  placeholder="Email"><br><br><br>
		 <textarea style="width: 354px; height:159px"  required class="group1123" cols="50" rows="9" type="text" name="sms22"  placeholder="Сообщение"></textarea>
		  <input type="hidden" name="contact" value="send">
        
		       <a style="left: 252px;   top: 40px;" href="javascript:void(0);" class="layer-4-holder1">Отправить</a>
    <input type="submit" id="submit1" style="display: none;" />
         </div>
        </div>
       </div>
		  </form>
		   </div>


       </div>
      </div>
     </div>
    </div>
   </div>
<style>
.footer {
margin: 124px 0 0;
position: relative;
} 
</style>
	   <?php
		   include_once("include/footer.php");
	   ?>
  </div>
 </body>
</html>