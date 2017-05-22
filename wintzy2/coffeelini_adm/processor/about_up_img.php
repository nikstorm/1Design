<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################

if(isset($_GET["line"])){
$li=$_GET["line"];
$uploadabimg = $_FILES['uploadabimg']['tmp_name'];
if($li > 0){

// это папка, в которую будет загружаться картинка
$apend=date('YmdHis').rand(100,1000).".PNG"; 
// это имя, которое будет присвоенно изображению 
$uploaddir = 'img/about/';
$uploadfile = "$uploaddir$apend"; 
//в переменную $uploadfile будет входить папка и имя изображения

if($_FILES['uploadabimg']['size'] != 0 and $_FILES['uploadabimg']['size'] <= 6048576) 
{ 
// Указываем максимальный вес загружаемого файла. Сейчас 500 Кб
  if (move_uploaded_file($_FILES['uploadabimg']['tmp_name'], $uploadfile)) 
   {
   
    list($w_i, $h_i, $type) = getimagesize($uploadfile);
	if($w_i >= 200 || $h_i >= 200){
    $line1=$li;

	$about_img = file("coffeelini_adm/db/about_img.db");
	$about_img1 = explode ("*|*", $about_img[$line1]);
	$about_img_title = $about_img1[0];
	$about_img_subtitle = $about_img1[1];
	$about_img_text = $about_img1[2];
	$unlink = $about_img1[3];
	$unfile = "$uploaddir$unlink";
	$db=fopen("coffeelini_adm/db/about_img.db","w");
	$line=$li + 1; # номер строки 
    $replace="$about_img_title*|*$about_img_subtitle*|*$about_img_text*|*$apend*|*"; # на что 

   for($i=0;$i<count($about_img);$i++) 
   { 
      if(($i+1)!=$line){fwrite($db,$about_img[$i]);} 
      else{fwrite($db,$replace."\n");} 
   } 
   fclose($db);
   $func->size_img($uploadfile, $uploadfile, 200, 200, true, 0);
   echo "<img  class='img_about' src='/$uploadfile' alt='' '/>";
   if($unlink > 0){
   unlink("$unfile");
   }
   }else{
   echo "<BR/>The minimum image size 200 x 200 px";
   unlink("$uploadfile");
   }
   } else {
   echo "The file is not loaded, try again";
   } 
} else { 
echo "The file size should not exceed 5MB";
}
exit;
}


}
?>