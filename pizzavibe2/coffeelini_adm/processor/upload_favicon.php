<?php
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################



$uploaddir = 'favico/'; 
// это папка, в которую будет загружаться картинка
$apend=date('YmdHis').rand(100,1000).'.PNG'; 
// это имя, которое будет присвоенно изображению 
$uploadfile = "$uploaddir$apend"; 
//в переменную $uploadfile будет входить папка и имя изображения
$tipefiles = $_FILES['uploadfile']['type'];
if($_FILES['uploadfile']['size'] != 0 and $_FILES['uploadfile']['size']<=512000) 
{ 
// Указываем максимальный вес загружаемого файла. Сейчас 500 Кб 
  if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile)) 
   { 
   //Здесь идет процесс загрузки изображения 
   $size = getimagesize($uploadfile); 
   // с помощью этой функции мы можем получить размер пикселей изображения 
     if ($size[0] < 501 && $size[1]<501) 
     {
	 if($tipefiles == "image/png"){
	 $img = ImageCreateFromPNG($uploadfile);
	 }else if($tipefiles == "image/jpg" || $tipefiles == "image/jpeg"){
	 $img = ImageCreateFromJPEG($uploadfile);
	 }else if($tipefiles == "image/gif"){
	 $img = ImageCreateFromGIF($uploadfile);
	 }
	 $w = 16;
	 $h = 16;
  
    $srcWidth  = ImageSX($img); 
    $srcHeight = ImageSY($img); 
    $resImage = ImageCreateTrueColor($w, $h);
    imagesavealpha($resImage, true );
	imagealphablending($resImage, false );
    ImageCopyResampled($resImage, $img, 0, 0, 0, 0, $w, $h, $srcWidth, $srcHeight);    
            
     unlink($uploadfile);
	 if($tipefiles == "image/png"){
	 ImagePNG($resImage, $uploadfile);
	 }else if($tipefiles == "image/jpg" || $tipefiles == "image/jpeg"){
	 ImageJPEG($resImage, $uploadfile);
	 }else if($tipefiles == "image/gif"){
	 ImageGIF($resImage, $uploadfile); 
	 }
        
        ImageDestroy($img); 
        ImageDestroy($resImage); 
    // Записываем данные 
	$data1 = file("coffeelini_adm/db/contents.db");
    $dat = explode ("*|*", $data1[0]);
	$retitle = $dat[0];
    $redescription = $dat[1];
    $rekeywords = $dat[2];
	$reicon = $dat[3];
	$ww=fopen("coffeelini_adm/db/contents.db","w+");
	fputs ($ww, $retitle."*|*".$redescription."*|*".$rekeywords."*|*".$apend."\r\n");
	fclose($ww);
     // если размер изображения не более 500 пикселей по ширине и не более 1500 по  высоте 
     echo "<img src='/$uploadfile' alt='' width='20px' height='20px'/>"; 
     } else {
     echo "Uploaded image exceeds the allowable width of not more than 500; height no more than 500)"; 
     unlink($uploadfile); 
     // удаление файла 
     } 
   } else {
   echo "The file is not loaded, try again";
   } 
} else { 
echo "The file size should not exceed 500kB";
}
 

?>