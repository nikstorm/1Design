<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################


$uploadlogo = $_FILES['uploadlogo']['tmp_name'];
$uploadheadbac = $_FILES['uploadheadbac']['tmp_name'];
if($uploadlogo == true){
$uploaddir = 'img/'; 
// это папка, в которую будет загружаться картинка
$apend=date('YmdHis').rand(100,1000).'.PNG'; 
// это имя, которое будет присвоенно изображению 
$uploadfile = "$uploaddir$apend"; 
//в переменную $uploadfile будет входить папка и имя изображения

if($_FILES['uploadlogo']['size'] != 0 and $_FILES['uploadlogo']['size']<=3512000) 
{ 
// Указываем максимальный вес загружаемого файла. Сейчас 500 Кб
  if (move_uploaded_file($_FILES['uploadlogo']['tmp_name'], $uploadfile)) 
   { 
    $header_set = file("coffeelini_adm/db/header_set.db");
    $header_set1 = explode ("*|*", $header_set[1]);
	$logo = $header_set1[0];
	$header_bac = $header_set1[1];
	$Headerlinecolor = $header_set1[2];
	$Menufontcolor = $header_set1[3];
	$Headersubtitle = $header_set1[4];
	$Headersubtitlecolor = $header_set1[5];
	$Headermaintitle = $header_set1[6];
	$Headermaintitlecolor = $header_set1[7];
	$Buttontext = $header_set1[8];
	$Buttongoesto = $header_set1[9];
	$Textbottomlovr = $header_set1[10];
	$unlink = "$uploaddir$logo";
	$nounlink = $func->Butgotono($logo);
	$db=fopen("coffeelini_adm/db/header_set.db","a");
	unset($header_set[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/header_set.db", implode("", $header_set));
    fputs ($db, $apend."*|*".$header_bac."*|*".$Headerlinecolor."*|*".$Menufontcolor."*|*".$Headersubtitle."*|*".$Headersubtitlecolor."*|*".$Headermaintitle."*|*".$Headermaintitlecolor."*|*".$Buttontext."*|*".$Buttongoesto."*|*".$Textbottomlovr."");
	fclose($db);
   echo "<img src='/$uploadfile' alt='' style='max-width:100%;'/>";
   if($nounlink != 0){
   unlink($unlink);
   }
   } else {
   echo "The file is not loaded, try again";
   } 
} else { 
echo "The file size should not exceed 3MB";
}
exit;
}
if($uploadheadbac == true){
$uploaddir = 'img/'; 
$tipefiles = $_FILES['uploadheadbac']['type'];
// это папка, в которую будет загружаться картинка
$apend=date('YmdHis').rand(100,1000).'.jpeg'; 
// это имя, которое будет присвоенно изображению 
$uploadfile = "$uploaddir$apend"; 

//в переменную $uploadfile будет входить папка и имя изображения

// Указываем максимальный вес загружаемого файла. Сейчас 500 Кб
  if (move_uploaded_file($_FILES['uploadheadbac']['tmp_name'], $uploadfile)) 
   { 
     if($tipefiles == "image/png"){
	 $img = ImageCreateFromPNG($uploadfile);
	 }else if($tipefiles == "image/jpg" || $tipefiles == "image/jpeg"){
	 $img = ImageCreateFromJPEG($uploadfile);
	 }else if($tipefiles == "image/gif"){
	 $img = ImageCreateFromGIF($uploadfile);
	 }
	 imageinterlace($img, true);
	 unlink($uploadfile);
	 if($tipefiles == "image/png"){
	 ImagePNG($img, $uploadfile);
	 }else if($tipefiles == "image/jpg" || $tipefiles == "image/jpeg"){
	 ImageJPEG($img, $uploadfile);
	 }else if($tipefiles == "image/gif"){
	 ImageGIF($img, $uploadfile); 
	 }
	 imagedestroy($img);
    $header_set = file("coffeelini_adm/db/header_set.db");
    $header_set1 = explode ("*|*", $header_set[1]);
	$logo = $header_set1[0];
	$header_bac = $header_set1[1];
	$Headerlinecolor = $header_set1[2];
	$Menufontcolor = $header_set1[3];
	$Headersubtitle = $header_set1[4];
	$Headersubtitlecolor = $header_set1[5];
	$Headermaintitle = $header_set1[6];
	$Headermaintitlecolor = $header_set1[7];
	$Buttontext = $header_set1[8];
	$Buttongoesto = $header_set1[9];
	$Textbottomlovr = $header_set1[10];
	$unlink = "$uploaddir$header_bac";
	$nounlink = $func->Butgotono($header_bac);
	   $aparance = file("coffeelini_adm/db/aparance.db");
	$aparance1 = explode ("*|*", $aparance[1]);
		$ap_interfacecolor = $aparance1[0];
	$ap_hovercolor   = $aparance1[1];
	$ap_iconscolor = $aparance1[2];
	$img_app =  $aparance1[3];
	$color_pasce = "col$apend";
	$colorunlink = "$uploaddir$img_app";
	$appdb=fopen("coffeelini_adm/db/aparance.db","a");
	unset($aparance[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/aparance.db", implode("", $aparance));
    fputs ($appdb, $ap_interfacecolor."*|*".$ap_hovercolor."*|*".$ap_iconscolor."*|*".$color_pasce."*|*");
	fclose($appdb);
	$db=fopen("coffeelini_adm/db/header_set.db","a");
	unset($header_set[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/header_set.db", implode("", $header_set));
    fputs ($db, $logo."*|*".$apend."*|*".$Headerlinecolor."*|*".$Menufontcolor."*|*".$Headersubtitle."*|*".$Headersubtitlecolor."*|*".$Headermaintitle."*|*".$Headermaintitlecolor."*|*".$Buttontext."*|*".$Buttongoesto."*|*".$Textbottomlovr."");
	fclose($db);
	$size_header_bac = getimagesize($uploadfile); 
    $header_bac_width = $size_header_bac[0];
	$header_bac_height = $size_header_bac[1];
	if($header_bac_width < $header_bac_height){
	$w1per = $header_bac_width / 100;
	$h1 = $header_bac_height - $header_bac_width;
	$h2 = $h1 / $w1per;
	$h = 100 - $h2;
	}else{
	$h = 80;
	$h1 = "25%";
	$header_bac_top = 10;
	$header_bac_bottom = 10;
	}
	$pos1 = 50;
	$img_color_pasc = "$uploaddir$color_pasce";
	if($header_bac_width > 600){ $func->size_img_big($img_color_pasc, $uploadfile, 600, false); }
    $header_pos = file("coffeelini_adm/db/positionheaderimg.db");
    $header_pos1 = explode ("*|*", $header_pos[1]);
	$position = $header_pos1[1];
	$db=fopen("coffeelini_adm/db/positionheaderimg.db","a");
	unset($header_pos[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/positionheaderimg.db", implode("", $header_pos));
    fputs ($db, $pos1."*|*".$position."");
	fclose($db);
   echo "
   <div id='headerbc_vib_obl' onMouseUp='positionheaderimg(), start_save_bil()' class='blocc_head_bc' style='top:{$header_bac_top}%;width:100%; height:{$h}%;'>
   <div style='cursor:auto; top:-{$h1};position:absolute; z-index:4;width:100%; background:#FFFFFF; opacity:0.5; height:{$h1};'></div>
   <div style='position:absolute; z-index:1;width:99.4%; height:99.3%; border: red dashed 2px;'></div>
   <div style='cursor:auto; bottom:-{$h1};position:absolute; z-index:4;width:100%; background:#FFFFFF; opacity:0.5; height:{$h1};'></div>
   </div>
   <img src='/$uploadfile' alt='' style='max-width:100%;' />
   ";
   if($nounlink != 0){
   unlink($unlink);
   unlink($colorunlink);
   }
   } else {
   echo "The file is not loaded, try again";
   } 
exit;
}
echo "error";
?>