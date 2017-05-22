<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################
if(isset($_POST["uninsproject"])){
    $line = $_POST["line"];
    $item = file("coffeelini_adm/db/item_img.db");
	$item_img1 = explode ("*|*", $item[$line]);
	$uploaddir = 'img/team/';
	$unlink = $item_img1[0];
	
	$db=fopen("coffeelini_adm/db/item_img.db","a");
	unset($item[$line]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/item_img.db", implode("", $item));
	fclose($db);
   if($unlink > 0){
   unlink("$uploaddir$unlink");
   }
   echo "1";
   exit;
}
if(isset($_POST["addproject"])){
    $addproject = file("coffeelini_adm/db/item_img.db");
	$db=fopen("coffeelini_adm/db/item_img.db","a");
	$img = "nopictur.png";
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/item_img.db", implode("", $addproject));
    fputs ($db, $img."*|**|**|**|**|**|*\n");
	fclose($db);
   echo "1";
   exit;
}
if(isset($_POST["title"])){
    $title = $_POST["title"];
	$subtitle = $_POST["subtitle"];
	$item_text = $func->text_wizwi($_POST["itemtext"]);
    $item = file("coffeelini_adm/db/item.db");
	$db=fopen("coffeelini_adm/db/item.db","a");
	unset($item[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/item.db", implode("", $item));
    fputs ($db, $title."*|*".$subtitle."*|*".$item_text."");
	fclose($db);
   echo "1";
   exit;
}
if(isset($_POST["Name"])){
    $line1=$_POST["line"];
	$item_img = file("coffeelini_adm/db/item_img.db");
	$item_img1 = explode ("*|*", $item_img[$line1]);
	$item_img_img = $item_img1[0];
	$item_img_name = $_POST["Name"];
	$item_img_prif = $_POST["Profession"];
	$item_img_twit = $func->Butgoto($_POST["Twitter"]);
	$item_img_fase = $func->Butgoto($_POST["Facebook"]);
	$item_img_in = $func->Butgoto($_POST["Instagram"]);
	$db=fopen("coffeelini_adm/db/item_img.db","w");
	$line=$_POST["line"] + 1; # номер строки 
    $replace="$item_img_img*|*$item_img_name*|*$item_img_prif*|*$item_img_twit*|*$item_img_fase*|*$item_img_in*|*"; # на что 

   for($i=0;$i<count($item_img);$i++) 
   { 
      if(($i+1)!=$line){fwrite($db,$item_img[$i]);} 
      else{fwrite($db,$replace."\n");} 
   } 
   fclose($db);
   echo "1";
   exit;
}
if(isset($_POST["downn"])){
    $li = $_POST["id"];
	$down = $_POST["downn"];
	$item_img = file("coffeelini_adm/db/item_img.db");
	$kol = count($item_img)-1;
	if($down == 2){$do = 0;}else{$do = $down;}
    if(($li - $down) >= 0 and ($li + $do) <= $kol){
	if($down == 2){ $lin1=$li; $lin2=$li+1; $line1=$li; $line2 = $line1 - 1;}
	else 
	if($down == 1){ $lin1=$li+2; $lin2=$li+1; $line1=$li; $line2 = $line1 + 1;}
	
	//
	$line1_item_img1 = explode ("*|*", $item_img[$line1]);
	$line1_item_img_img = $line1_item_img1[0];
	$line1_item_img_name = $line1_item_img1[1];
	$line1_item_img_prif = $line1_item_img1[2];
	$line1_item_img_twit = $line1_item_img1[3];
	$line1_item_img_fase = $line1_item_img1[4];
	$line1_item_img_in = $line1_item_img1[5];
	$replace1 = "$line1_item_img_img*|*$line1_item_img_name*|*$line1_item_img_prif*|*$line1_item_img_twit*|*$line1_item_img_fase*|*$line1_item_img_in*|*"; # на что
	//
		//
	$line2_item_img1 = explode ("*|*", $item_img[$line2]);
	$line2_item_img_img = $line2_item_img1[0];
	$line2_item_img_name = $line2_item_img1[1];
	$line2_item_img_prif = $line2_item_img1[2];
	$line2_item_img_twit = $line2_item_img1[3];
	$line2_item_img_fase = $line2_item_img1[4];
	$line2_item_img_in = $line2_item_img1[5];
	$replace2 = "$line2_item_img_img*|*$line2_item_img_name*|*$line2_item_img_prif*|*$line2_item_img_twit*|*$line2_item_img_fase*|*$line2_item_img_in*|*"; # на что
	//
	$db=fopen("coffeelini_adm/db/item_img.db","w"); 
   for($i=0;$i<count($item_img);$i++) 
   { 
      if(($i+1)==$lin1){fwrite($db,$replace1."\n");} 
      else 
	  if(($i+1)==$lin2){fwrite($db,$replace2."\n");}
	  else
	  {fwrite($db,$item_img[$i]);} 
   }
   fclose($db);
   echo "1";
}else echo "error";
exit;
}
?>