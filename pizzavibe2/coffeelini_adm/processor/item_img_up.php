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
$uploaddir = 'img/team/';
$uploadfile = "$uploaddir$apend"; 
//в переменную $uploadfile будет входить папка и имя изображения

if($_FILES['uploadabimg']['size'] != 0 and $_FILES['uploadabimg']['size'] <= 6048576) 
{ 
// Указываем максимальный вес загружаемого файла. Сейчас 500 Кб
  if (move_uploaded_file($_FILES['uploadabimg']['tmp_name'], $uploadfile)) 
   {
   
    list($w_i, $h_i, $type) = getimagesize($uploadfile);
	if($w_i >= 225 || $h_i >= 225){
    $line1=$li;

	$item_img = file("coffeelini_adm/db/item_img.db");
	$item_img1 = explode ("*|*", $item_img[$line1]);
	$item_img_img = $item_img1[0];
	$item_img_name = $item_img1[1];
	$item_img_prof = $item_img1[2];
	$item_img_twit = $item_img1[3];
	$item_img_fase = $item_img1[4];
	$item_img_in = $item_img1[5];
	$unlink = $item_img1[0];
	$unfile = "$uploaddir$unlink";
	$db=fopen("coffeelini_adm/db/item_img.db","w");
	$line=$li + 1; # номер строки 
    $replace="$apend*|*$item_img_name*|*$item_img_prof*|*$item_img_twit*|*$item_img_fase*|*$item_img_in*|*"; # на что 

   for($i=0;$i<count($item_img);$i++) 
   { 
      if(($i+1)!=$line){fwrite($db,$item_img[$i]);} 
      else{fwrite($db,$replace."\n");} 
   } 
   fclose($db);
   $func->size_img($uploadfile, $uploadfile, 225, 225, true, 0);
   echo "<img  class='img_about' src='/$uploadfile' alt='' '/>";
   if($unlink > 0){
   unlink("$unfile");
   }
   }else{
   echo "<BR/>The minimum image size 225 x 225 px";
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