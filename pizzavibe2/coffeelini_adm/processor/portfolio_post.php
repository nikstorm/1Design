<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################
if(isset($_POST["uninsproject"])){
    $line = $_POST["line"];
    $portfolio = file("coffeelini_adm/db/portfolio_img.db");
	$portfolio_img1 = explode ("*|*", $portfolio[$line]);
	$uploaddir = 'img/portfolio/'; 
	$unlink = $portfolio_img1[6];
	$unlink2 = $portfolio_img1[7];
	
	$db=fopen("coffeelini_adm/db/portfolio_img.db","a");
	unset($portfolio[$line]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/portfolio_img.db", implode("", $portfolio));
	fclose($db);
   if($unlink > 0){
   unlink("$uploaddir$unlink");
   unlink("$uploaddir$unlink2");
   }
   echo "1";
   exit;
}
if(isset($_POST["addproject"])){
    $addproject = file("coffeelini_adm/db/portfolio_img.db");
	$db=fopen("coffeelini_adm/db/portfolio_img.db","a");
	$img = "nopictur.png";
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/portfolio_img.db", implode("", $addproject));
    fputs ($db, "*|**|**|**|**|**|*".$img."*|*".$img."*|*0*|*\n");
	fclose($db);
   echo "1";
   exit;
}
if(isset($_POST["title"])){
    $title = $_POST["title"];
	$subtitle = $_POST["subtitle"];
	$buttom_text = $_POST["Innerbuttontext"];
    $portfolio = file("coffeelini_adm/db/portfolio.db");
	$db=fopen("coffeelini_adm/db/portfolio.db","a");
	unset($portfolio[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/portfolio.db", implode("", $portfolio));
    fputs ($db, $title."*|*".$subtitle."*|*".$buttom_text."");
	fclose($db);
   echo "1";
   exit;
}
if(isset($_POST["img_title"])){
    $line1=$_POST["line"];
    $title = $_POST["img_title"];
	$subtitle = $_POST["img_subtitle"];
    $portfolio_img = file("coffeelini_adm/db/portfolio_img.db");
	$portfolio_img1 = explode ("*|*", $portfolio_img[$line1]);
	$portfolio_Inner_title = $portfolio_img1[2];
	$portfolio_Inner_subtitle = $portfolio_img1[3];
	$portfolio_Inner_text = $portfolio_img1[4];
	$portfolio_button_text = $portfolio_img1[5];
	$portfolio_Img_Big = $portfolio_img1[6];
	$portfolio_Img_Small = $portfolio_img1[7];
	$standtitl = $portfolio_img1[8];
	$db=fopen("coffeelini_adm/db/portfolio_img.db","w");
	$line=$_POST["line"] + 1; # номер строки 
    $replace="$title*|*$subtitle*|*$portfolio_Inner_title*|*$portfolio_Inner_subtitle*|*$portfolio_Inner_text*|*$portfolio_button_text*|*$portfolio_Img_Big*|*$portfolio_Img_Small*|*$standtitl*|*"; # на что 

   for($i=0;$i<count($portfolio_img);$i++) 
   { 
      if(($i+1)!=$line){fwrite($db,$portfolio_img[$i]);} 
      else{fwrite($db,$replace."\n");} 
   } 
   fclose($db);
   echo "1";
   exit;
}
if(isset($_POST["Innertitle"])){
    $line1=$_POST["line"];
    $portfolio_img = file("coffeelini_adm/db/portfolio_img.db");
	$portfolio_img1 = explode ("*|*", $portfolio_img[$line1]);
	$title = $portfolio_img1[0];
	$subtitle = $portfolio_img1[1];
	$portfolio_Inner_title = $_POST["Innertitle"];
	$portfolio_Inner_subtitle = $_POST["Innersubtitle"];
	$portfolio_Inner_text = $portfolio_img1[4];
	$portfolio_button_text = $portfolio_img1[5];
	$portfolio_Img_Big = $portfolio_img1[6];
	$portfolio_Img_Small = $portfolio_img1[7];
	$standtitl = $_POST["titl_standart"];
	$db=fopen("coffeelini_adm/db/portfolio_img.db","w");
	$line=$_POST["line"] + 1; # номер строки 
    $replace="$title*|*$subtitle*|*$portfolio_Inner_title*|*$portfolio_Inner_subtitle*|*$portfolio_Inner_text*|*$portfolio_button_text*|*$portfolio_Img_Big*|*$portfolio_Img_Small*|*$standtitl*|*"; # на что 

   for($i=0;$i<count($portfolio_img);$i++) 
   { 
      if(($i+1)!=$line){fwrite($db,$portfolio_img[$i]);} 
      else{fwrite($db,$replace."\n");} 
   } 
   fclose($db);
   echo "1";
   exit;
}
if(isset($_POST["Innertext"])){
    $line1=$_POST["line"];
    $portfolio_img = file("coffeelini_adm/db/portfolio_img.db");
	$portfolio_img1 = explode ("*|*", $portfolio_img[$line1]);
	$title = $portfolio_img1[0];
	$subtitle = $portfolio_img1[1];
	$portfolio_Inner_title = $portfolio_img1[2];
	$portfolio_Inner_subtitle = $portfolio_img1[3];
	$portfolio_Inner_text = $func->text_wizwi($_POST["Innertext"]);
	$portfolio_button_text = $_POST["Innerbuttontext"];
	$portfolio_Img_Big = $portfolio_img1[6];
	$portfolio_Img_Small = $portfolio_img1[7];
	$standtitl = $portfolio_img1[8];
	$db=fopen("coffeelini_adm/db/portfolio_img.db","w");
	$line=$_POST["line"] + 1; # номер строки 
    $replace="$title*|*$subtitle*|*$portfolio_Inner_title*|*$portfolio_Inner_subtitle*|*$portfolio_Inner_text*|*$portfolio_button_text*|*$portfolio_Img_Big*|*$portfolio_Img_Small*|*$standtitl*|*"; # на что 

   for($i=0;$i<count($portfolio_img);$i++) 
   { 
      if(($i+1)!=$line){fwrite($db,$portfolio_img[$i]);} 
      else{fwrite($db,$replace."\n");} 
   } 
   fclose($db);
   echo "1";
   exit;
}
?>