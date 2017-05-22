<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################


$uploaddir = 'img/'; 
// это папка, в которую будет загружаться картинка
$apend=date('YmdHis').rand(100,1000).'.PNG'; 
// это имя, которое будет присвоенно изображению 
$uploadfile = "$uploaddir$apend"; 
$tipefiles = $_FILES['uploadcontus']['type'];
//в переменную $uploadfile будет входить папка и имя изображения

// Указываем максимальный вес загружаемого файла. Сейчас 500 Кб
  if (move_uploaded_file($_FILES['uploadcontus']['tmp_name'], $uploadfile)) 
   {
   	$contact_us = file("coffeelini_adm/db/contact_us.db");
$contact_us1 = explode ("*|*", $contact_us[1]);
$title = $contact_us1[0];
$titlecolor = $contact_us1[1];
$subtitle = $contact_us1[2];
$subtitlecolor = $contact_us1[3];
$Namecaption = $contact_us1[4];
$Nameerror = $contact_us1[5];
$Nameonoff = $contact_us1[6];
$Phonecaption = $contact_us1[7];
$Phoneerror = $contact_us1[8];
$Phoneonoff = $contact_us1[9];
$Emailcaption = $contact_us1[10];
$Emailerror = $contact_us1[11];
$Messagecaption = $contact_us1[12];
$Messageerror = $contact_us1[13];
$Messagesent = $contact_us1[14];
$Buttontext = $contact_us1[15];
$Timeout = $contact_us1[16];
$Background = $contact_us1[17];
$fixed = $contact_us1[18];
$images = $apend;
$unimg = $contact_us1[19];
$unlink = "$uploaddir$unimg";
     if($tipefiles == "image/jpg" || $tipefiles == "image/jpeg"){
	 $img = ImageCreateFromJPEG($uploadfile);
     imageinterlace($img, true);
	 ImageJPEG($img, $uploadfile);
     imagedestroy($img);	 
	 }
	$db=fopen("coffeelini_adm/db/contact_us.db","a");
	unset($contact_us[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/contact_us.db", implode("", $contact_us));
    fputs ($db, $title."*|*".$titlecolor."*|*".$subtitle."*|*".$subtitlecolor."*|*".$Namecaption."*|*".$Nameerror."*|*".$Nameonoff."*|*".$Phonecaption."*|*".$Phoneerror."*|*".$Phoneonoff."*|*".$Emailcaption."*|*".$Emailerror."*|*".$Messagecaption."*|*".$Messageerror."*|*".$Messagesent."*|*".$Buttontext."*|*".$Timeout."*|*".$Background."*|*".$fixed."*|*".$images."*|*");
	fclose($db);
    $header_pos = file("coffeelini_adm/db/positioncontactus.db");
    $header_pos1 = explode ("*|*", $header_pos[1]);
	$headimgpos = $header_pos1[0];
	$positionhead = $header_pos1[1];
    $size_header_bac = getimagesize($uploadfile); 
    $header_bac_width = $size_header_bac[0];
	$header_bac_height = $size_header_bac[1];
	if($header_bac_width < $header_bac_height){
	$w1per = $header_bac_width / 100;
	$h1 = $header_bac_height - $header_bac_width;
	$h2 = $h1 / $w1per;
	$h = 100 - $h2;
	$header_bac_top = ($headimgpos/100) * $h2;
	$header_bac_bottom = $headimgpos - $header_bac_top;
	}else{
	$h = 80;
	$h1 = "25%";
	$header_bac_top = $headimgpos/5;
	}
     echo "
	    <div id='headerbc_vib_obl' onMouseUp='positioncontactusimg(), start_save_bil()' class='blocc_head_bc' style='top:{$header_bac_top}%;width:100%; height:{$h}%;'>
   <div style='cursor:auto; top:-{$h1};position:absolute; z-index:4;width:100%; background:#FFFFFF; opacity:0.5; height:{$h1};'></div>
   <div style='position:absolute; z-index:1;width:99.4%; height:99.3%; border: red dashed 2px;'></div>
   <div style='cursor:auto; bottom:-{$h1};position:absolute; z-index:4;width:100%; background:#FFFFFF; opacity:0.5; height:{$h1};'></div>
   </div>
   <img src='/$uploadfile' alt='' style='max-width:100%;' />
	 ";
   if($unimg != 0){
   unlink($unlink);
   }
  } else echo "The file is not loaded, try again";
  
?>