<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################

if(isset($_GET["line"])){
$li=$_GET["line"];
$uploadportfo = $_FILES['uploadportfo']['tmp_name'];
if($li > 0){
$uploaddir = 'img/portfolio/'; 
// это папка, в которую будет загружаться картинка
$apend=date('YmdHis').rand(100,1000).'.PNG'; 
$apendsmil=date('YmdHis').rand(100,1000).'smil.PNG';
// это имя, которое будет присвоенно изображению 
$uploadfile = "$uploaddir$apend"; 
$uploadfileapendsmil = "$uploaddir$apendsmil";
//в переменную $uploadfile будет входить папка и имя изображения

if($_FILES['uploadportfo']['size'] != 0 and $_FILES['uploadportfo']['size']<=3512000) 
{ 
// Указываем максимальный вес загружаемого файла. Сейчас 500 Кб
  if (move_uploaded_file($_FILES['uploadportfo']['tmp_name'], $uploadfile)) 
   {
   
    list($w_i, $h_i, $type) = getimagesize($uploadfile);
	if($w_i >= 400 || $h_i >= 289){
    $line1=$li;

    $portfolio_img = file("coffeelini_adm/db/portfolio_img.db");
	$portfolio_img1 = explode ("*|*", $portfolio_img[$line1]);
	$title = $portfolio_img1[0];
	$subtitle = $portfolio_img1[1];
	$portfolio_Inner_title = $portfolio_img1[2];
	$portfolio_Inner_subtitle = $portfolio_img1[3];
	$portfolio_Inner_text = $portfolio_img1[4];
	$portfolio_button_text = $portfolio_img1[5];
	$portfolio_Img_Big = $apend;
	$portfolio_Img_Small = $apendsmil;
	$unlink = $portfolio_img1[6];
	$unlink2 = $portfolio_img1[7];
	$standtitl = $portfolio_img1[8];
	$db=fopen("coffeelini_adm/db/portfolio_img.db","w");
	$line=$li + 1; # номер строки 
    $replace="$title*|*$subtitle*|*$portfolio_Inner_title*|*$portfolio_Inner_subtitle*|*$portfolio_Inner_text*|*$portfolio_button_text*|*$portfolio_Img_Big*|*$portfolio_Img_Small*|*$standtitl*|*"; # на что 

   for($i=0;$i<count($portfolio_img);$i++) 
   { 
      if(($i+1)!=$line){fwrite($db,$portfolio_img[$i]);}
      else{fwrite($db,$replace."\n");}
   }
   fclose($db);
   if($w_i > 980){
   $w_o = 980; $h_o = false;
   }else if($h_i > 800){
   $w_o = false; $h_o = 800;
   }else{
   $w_o = $w_i; $h_o = false;
   }
   $func->size_img_big($uploadfile, $uploadfile, $w_o, $h_o);
   if($w_i > $h_i){ $posi = 0; }else if($w_i == $h_i){ $posi = 1; }else{ $posi = 1; }
   $func->size_img($uploadfileapendsmil, $uploadfile, 400, 289, true, $posi);
   echo "<img src='/$uploadfile' alt='' style='max-width:100%;'/>";
   if($unlink > 0){
   unlink("$uploaddir$unlink");
   unlink("$uploaddir$unlink2");
   }
   }else{
   echo "<BR/>The minimum image size 400 x 289 px";
   unlink("$uploadfile");
   }
   } else {
   echo "The file is not loaded, try again";
   } 
} else { 
echo "The file size should not exceed 3MB";
}
exit;
}


}
?>