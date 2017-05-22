<?php
if ($_REQUEST['dmc_yur']=='send'){

  $to = "alexxei83@gmail.com"; // поменять на свой адрес
  $from = $_POST['contactFF'];
  $subject = "Заполнена форма ДМС (для юр. лиц) ";
 // $message = "Имя: ".$_POST['nameFF']."\nEmail: ".$from."\nСообщение: ".$_POST['messageFF'];
  $boundary = md5(date('r', time()));
  $filesize = '';
  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "From: " . $from . "\r\n";
  $headers .= "Reply-To: " . $from . "\r\n";
  $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
  $message="
Content-Type: multipart/mixed; boundary=\"$boundary\"

--$boundary
Content-Type: text/plain; charset=\"utf-8\"
Content-Transfer-Encoding: 7bit

$message";
  for($i=0;$i<count($_FILES['fileFF']['name']);$i++) {
      if(is_uploaded_file($_FILES['fileFF']['tmp_name'][$i])) {
         $attachment = chunk_split(base64_encode(file_get_contents($_FILES['fileFF']['tmp_name'][$i])));
         $filename = $_FILES['fileFF']['name'][$i];
         $filetype = $_FILES['fileFF']['type'][$i];
         $filesize += $_FILES['fileFF']['size'][$i];
         $message.="

--$boundary
Content-Type: \"$filetype\"; name=\"$filename\"
Content-Transfer-Encoding: base64
Content-Disposition: attachment; filename=\"$filename\"

$attachment";
     }
   }
   $message.="
--$boundary--";

  if ($filesize < 10000000) { // проверка на общий размер всех файлов. Многие почтовые сервисы не принимают вложения больше 10 МБ
    mail($to, $subject, $message, $headers);
    $output = '<script>alert("Ваше сообщение получено, спасибо!");</script>';
  } else {
    $output = '<script>alert("Извините, письмо не отправлено. Размер всех файлов превышает 10 МБ.");</script>';
  }
  
session_start();	$_SESSION["send"]="ok";header("Location: index.php");
	exit;
}
?>
<!doctype html>
<html>
<head>
<title>Корпоративный ДМС индивидуальный подход по лучшим ценам</title>
<meta charset="UTF-8">
<meta name="description" content="Широкий выбор страховщиков ДМС для юр лиц.Предлагаем купить ДМС по лучшей цене.
Заказать и оформить ДМС можно в режиме онлайн.Корпоративный ДМС на привлекательных условиях.">
<meta name="keywords" content="дмс для юр лиц,корпоративный дмс,купить дмс,оформить дмс">
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
        <p class="novosti-2">ДМС для юр. лиц</p>
		

		<br><br>
<span  style="font-family: open sans;font-size: 14px;">Прикрепите ваше тех. задание, в котором необходимо указать</span>:
<p class="text-21">
<div style="font-family: open sans;font-size: 14px;">1) Полное название юр. лица</div>
<div style="font-family: open sans;font-size: 14px;">2) ИНН</div>
<div style="font-family: open sans;font-size: 14px;">3) Сколько человек</div>
<div style="font-family: open sans;font-size: 14px;">4) На какую сумму</div>
<div style="font-family: open sans;font-size: 14px;">5) Программа страхования</div>
<div style="font-family: open sans;font-size: 14px;">6) Какие необходимы клиники</div>
<br>
<b style="font-family: open sans;font-size: 14px;">Размер</b>: не больше 10 мб.
</p><br>
<form action="<?=$_SERVER["PHP_SELF"]?>" method="post"  enctype="multipart/form-data"  id="dmc_yur">
		<input required  type="file" name="fileFF[]" multiple id="fileFF" class="w100">
		<input type="hidden" name="dmc_yur" value="send">
		<center>
          		    <a href="javascript:void(0);" class="layer-4-holder1">Отправить</a>
    <input type="submit" id="submit1" style="display: none;" />
		  </form>
       </div>
      </div>
     </div>
    </div>
   </div>
      <style>
    .footer {
  margin: 100px 0 0;
  position: relative;
} 
</style>
	   <?php
		   include_once("include/footer.php");
	   ?>
  </div>
 </body>
</html>