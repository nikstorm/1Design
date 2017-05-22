<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################
if(isset($_POST["addproject"])){
    $addproject = file("coffeelini_adm/db/about_img.db");
	$db=fopen("coffeelini_adm/db/about_img.db","a");
	$img = "nopictur.png";
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/about_img.db", implode("", $addproject));
    fputs ($db, "*|**|**|*".$img."*|*\n");
	fclose($db);
   echo "1";
   exit;
}
if(isset($_POST["uninsproject"])){
    $line = $_POST["line"];
    $about = file("coffeelini_adm/db/about_img.db");
	$about1 = explode ("*|*", $about[$line]);
	$uploaddir = 'img/about/';
	$unlink = $about1[3];
	
	$db=fopen("coffeelini_adm/db/about_img.db","a");
	unset($about[$line]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/about_img.db", implode("", $about));
	fclose($db);
   if($unlink > 0){
   unlink("$uploaddir$unlink");
   }
   echo "1";
   exit;
}
if(isset($_POST["abtitle"])){
    $title = $_POST["abtitle"];
	$subtitle = $_POST["absubtitle"];
    $about = file("coffeelini_adm/db/about.db");
	$db=fopen("coffeelini_adm/db/about.db","a");
	unset($about[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/about.db", implode("", $about));
    fputs ($db, $title."*|*".$subtitle."");
	fclose($db);
   echo "1";
   exit;
}
if(isset($_POST["abouttextset"])){
    $line1=$_POST["line"];
	$about_img = file("coffeelini_adm/db/about_img.db");
	$about_img1 = explode ("*|*", $about_img[$line1]);
	$about_img_title = $_POST["abtitleset"];
	$about_img_subtitle = $_POST["absubtitleset"];
	$about_img_text = $func->text_wizwi($_POST["abouttextset"]);
	$about_img_img = $about_img1[3];
	$db=fopen("coffeelini_adm/db/about_img.db","w");
	$line=$_POST["line"] + 1; # номер строки 
    $replace="$about_img_title*|*$about_img_subtitle*|*$about_img_text*|*$about_img_img*|*"; # на что 

   for($i=0;$i<count($about_img);$i++) 
   { 
      if(($i+1)!=$line){fwrite($db,$about_img[$i]);} 
      else{fwrite($db,$replace."\n");} 
   } 
   fclose($db);
   echo "1";
   exit;
}
if(isset($_POST["abonoff"])){
    $about = file("coffeelini_adm/db/about_lower_item.db");
	$about1 = explode ("*|*", $about[1]);
	$onoff = $about1[0];
	$text = $about1[1];
	if($onoff == 0){ $y =1; }else{ $y = 0; }
	$db=fopen("coffeelini_adm/db/about_lower_item.db","a");
	unset($about[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/about_lower_item.db", implode("", $about));
    fputs ($db, $y."*|*".$text."");
	fclose($db);
   echo "1";
   exit;
}
if(isset($_POST["loweritem"])){
    $about = file("coffeelini_adm/db/about_lower_item.db");
	$about1 = explode ("*|*", $about[1]);
	$onoff = $about1[0];
	$text = $_POST["loweritem"];
	$db=fopen("coffeelini_adm/db/about_lower_item.db","a");
	unset($about[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/about_lower_item.db", implode("", $about));
    fputs ($db, $onoff."*|*".$text."");
	fclose($db);
   echo "1";
   exit;
}
echo "error";
?>