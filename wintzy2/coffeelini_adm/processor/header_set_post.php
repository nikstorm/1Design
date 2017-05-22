<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################

if(isset($_POST["positionheaderimg"])){
    $pos = $_POST["positionheaderimg"];
	if($pos == "" || $pos == "NaN"){ $pos1 = $y; }else{ $pos1 = $pos; }
    $header_pos = file("coffeelini_adm/db/positionheaderimg.db");
    $header_pos1 = explode ("*|*", $header_pos[1]);
	$position = $header_pos1[1];
	$db=fopen("coffeelini_adm/db/positionheaderimg.db","a");
	unset($header_pos[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/positionheaderimg.db", implode("", $header_pos));
    fputs ($db, $pos1."*|*".$position."");
	fclose($db);
   echo "1";
exit;
}
if(isset($_POST["position"])){

    $header_pos = file("coffeelini_adm/db/positionheaderimg.db");
    $header_pos1 = explode ("*|*", $header_pos[1]);
	$pos1 = $header_pos1[0];
	$position = $header_pos1[1];
	if($position == 0){ $position1 = 1; }else{ $position1 = 0;}
	$db=fopen("coffeelini_adm/db/positionheaderimg.db","a");
	unset($header_pos[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/positionheaderimg.db", implode("", $header_pos));
    fputs ($db, $pos1."*|*".$position1."");
	fclose($db);
   echo "1";
exit;
}
if(isset($_POST["headerlinecolor"])){
    $Headerlinecolor = $_POST["headerlinecolor"];
    $Menufontcolor = $_POST["menufontcolor"];

    $header_set = file("coffeelini_adm/db/header_set.db");
    $header_set1 = explode ("*|*", $header_set[1]);
	$logo = $header_set1[0];
	$header_bac = $header_set1[1];
	$Headersubtitle = $header_set1[4];
	$Headersubtitlecolor = $header_set1[5];
	$Headermaintitle = $header_set1[6];
	$Headermaintitlecolor = $header_set1[7];
	$Buttontext = $header_set1[8];
	$Buttongoesto = $header_set1[9];
	$Textbottomlovr = $header_set1[10];
	$db=fopen("coffeelini_adm/db/header_set.db","a");
	unset($header_set[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/header_set.db", implode("", $header_set));
    fputs ($db, $logo."*|*".$header_bac."*|*".$Headerlinecolor."*|*".$Menufontcolor."*|*".$Headersubtitle."*|*".$Headersubtitlecolor."*|*".$Headermaintitle."*|*".$Headermaintitlecolor."*|*".$Buttontext."*|*".$Buttongoesto."*|*".$Textbottomlovr."");
	fclose($db);
   echo "1";
exit;
}
if(isset($_POST["Textbottomlovr"])){
    $header_set = file("coffeelini_adm/db/header_set.db");
    $header_set1 = explode ("*|*", $header_set[1]);
	$y = $header_set1[10];
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
	if($y == 1){ $Textbottomlovr = 0; }else{ $Textbottomlovr = 1;}
	$db=fopen("coffeelini_adm/db/header_set.db","a");
	unset($header_set[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/header_set.db", implode("", $header_set));
    fputs ($db, $logo."*|*".$header_bac."*|*".$Headerlinecolor."*|*".$Menufontcolor."*|*".$Headersubtitle."*|*".$Headersubtitlecolor."*|*".$Headermaintitle."*|*".$Headermaintitlecolor."*|*".$Buttontext."*|*".$Buttongoesto."*|*".$Textbottomlovr."");
	fclose($db);
   echo "1";
exit;
}

if(isset($_POST["subtitle"])){
    $header_set = file("coffeelini_adm/db/header_set.db");
    $header_set1 = explode ("*|*", $header_set[1]);
	$logo = $header_set1[0];
	$header_bac = $header_set1[1];
	$Headerlinecolor = $header_set1[2];
	$Menufontcolor = $header_set1[3];
	
	$Headersubtitle = $_POST["subtitle"];
	$Headersubtitlecolor = $_POST["subtitlecolor"];
	$Headermaintitle = $_POST["maintitle"];
	$Headermaintitlecolor = $_POST["maintitlecolor"];
	$Buttontext = $_POST["buttontext"];
	$Buttongoesto = $_POST["butgoesto"];
	$Textbottomlovr = $header_set1[10];
	$db=fopen("coffeelini_adm/db/header_set.db","a");
	unset($header_set[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/header_set.db", implode("", $header_set));
    fputs ($db, $logo."*|*".$header_bac."*|*".$Headerlinecolor."*|*".$Menufontcolor."*|*".$Headersubtitle."*|*".$Headersubtitlecolor."*|*".$Headermaintitle."*|*".$Headermaintitlecolor."*|*".$Buttontext."*|*".$Buttongoesto."*|*".$Textbottomlovr."");
	fclose($db);
   echo "1";
exit;
}
if(isset($_POST["onoff"])){
    $chto = $_POST["onoff"];
	$header_set_onoff = file("coffeelini_adm/db/header_set_onoff.db");
    $headersetonoff = explode ("|", $header_set_onoff[1]);
	$a=$headersetonoff[0]; 
	$a1=$headersetonoff[1];
	$a2=$headersetonoff[2];
	$db=fopen("coffeelini_adm/db/header_set_onoff.db","a");
	if($chto == 0){
	if($a == 0){ $y = 1;}else{ $y =0;}
	unset($header_set_onoff[1]);
	file_put_contents("coffeelini_adm/db/header_set_onoff.db", implode("", $header_set_onoff));
    fputs ($db, $y."|".$a1."|".$a2."");
	}else if($chto == 1){
	if($a1 == 0){ $y = 1;}else{ $y =0;}
	unset($header_set_onoff[1]);
	file_put_contents("coffeelini_adm/db/header_set_onoff.db", implode("", $header_set_onoff));
    fputs ($db, $a."|".$y."|".$a2."");
	}else if($chto == 2){
	if($a2 == 0){ $y = 1;}else{ $y =0;}
	unset($header_set_onoff[1]);
	file_put_contents("coffeelini_adm/db/header_set_onoff.db", implode("", $header_set_onoff));
    fputs ($db, $a."|".$a1."|".$y."");
	}
	 fclose($db);
	echo "1";
	exit;
	}
if(isset($_POST["imgrecoveri"])){
    $y = $_POST["imgrecoveri"];
    $header_set = file("coffeelini_adm/db/header_set.db");
    $header_set1 = explode ("*|*", $header_set[1]);
	$unlogo = $header_set1[0];
	$unheader_bac = $header_set1[1];
	if($y == 0){ $un = $unlogo; $logo = "logo-big.png"; $unlink = "img/$unlogo"; }else{ $logo = $header_set1[0]; }
	if($y == 1){ $un = $unheader_bac; $header_bac = "header-bg.png"; $unlink = "img/$unheader_bac"; }else{ $header_bac = $header_set1[1]; }
	$Headerlinecolor = $header_set1[2];
	$Menufontcolor = $header_set1[3];
	$Headersubtitle = $header_set1[4];
	$Headersubtitlecolor = $header_set1[5];
	$Headermaintitle = $header_set1[6];
	$Headermaintitlecolor = $header_set1[7];
	$Buttontext = $header_set1[8];
	$Buttongoesto = $header_set1[9];
	$Textbottomlovr = $header_set1[10];
	$nounlink = $func->Butgotono($un);
	$db=fopen("coffeelini_adm/db/header_set.db","a");
	unset($header_set[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/header_set.db", implode("", $header_set));
    fputs ($db, $logo."*|*".$header_bac."*|*".$Headerlinecolor."*|*".$Menufontcolor."*|*".$Headersubtitle."*|*".$Headersubtitlecolor."*|*".$Headermaintitle."*|*".$Headermaintitlecolor."*|*".$Buttontext."*|*".$Buttongoesto."*|*".$Textbottomlovr."");
	fclose($db);
	$pos1 = 50;
    $header_pos = file("coffeelini_adm/db/positionheaderimg.db");
    $header_pos1 = explode ("*|*", $header_pos[1]);
	
	$db=fopen("coffeelini_adm/db/positionheaderimg.db","a");
	unset($header_pos[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/positionheaderimg.db", implode("", $header_pos));
    fputs ($db, $pos1."*|*".$pos1."");
	fclose($db);
	
		   $aparance = file("coffeelini_adm/db/aparance.db");
	$aparance1 = explode ("*|*", $aparance[1]);
		$ap_interfacecolor = $aparance1[0];
	$ap_hovercolor   = $aparance1[1];
	$ap_iconscolor = $aparance1[2];
	if($y == 1){ $img_app =  "img_pasc.png"; }else{ $img_app =  $aparance1[3]; }
	$color_pasce = $img_app;
	$colorunlink = "$uploaddir$img_app";

	$appdb=fopen("coffeelini_adm/db/aparance.db","a");
	unset($aparance[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/aparance.db", implode("", $aparance));
    fputs ($appdb, $ap_interfacecolor."*|*".$ap_hovercolor."*|*".$ap_iconscolor."*|*".$color_pasce."*|*");
	fclose($appdb);
	
   if($nounlink != 0){
   unlink($unlink);
   unlink($colorunlink);
   }
echo "1";
exit;
}
?>