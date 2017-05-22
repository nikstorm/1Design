<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################

if(isset($_POST["title"])){
$title = $_POST["title"];
$description = $_POST["description"];
$keywords = $_POST["keywords"];

    $data1 = file("coffeelini_adm/db/contents.db");
    $dat = explode ("*|*", $data1[0]);
	$retitle = $dat[0];
    $redescription = $dat[1];
    $rekeywords = $dat[2];
	$reicon = $dat[3];
    $ww=fopen("coffeelini_adm/db/contents.db","w+");
	fputs ($ww, $title."*|*".$description."*|*".$keywords."*|*".$reicon."\r\n");
	fclose($ww);
	echo "1";
}
if(isset($_POST["onoff"])){
    $chto = $_POST["onoff"];
	$onoff = file("coffeelini_adm/db/onoff.db");
    $onoff1 = explode ("|", $onoff[1]);
	$a=$onoff1[0]; 
	$a1=$onoff1[1]; 
	$a2=$onoff1[2]; 
	$a3=$onoff1[3]; 
	$a4=$onoff1[4];
	$db=fopen("coffeelini_adm/db/onoff.db","a");
	if($chto == 0){
	if($a == 0){ $y = 1;}else{ $y =0;}
	unset($onoff[1]);
	file_put_contents("coffeelini_adm/db/onoff.db", implode("", $onoff));
    fputs ($db, $y."|".$a1."|".$a2."|".$a3."|".$a4."");
	}else if($chto == 1){
	if($a1 == 0){ $y = 1;}else{ $y =0;}
	unset($onoff[1]);
	file_put_contents("coffeelini_adm/db/onoff.db", implode("", $onoff));
    fputs ($db, $a."|".$y."|".$a2."|".$a3."|".$a4."");
	}else if($chto == 2){
	if($a2 == 0){ $y = 1;}else{ $y =0;}
	unset($onoff[1]);
	file_put_contents("coffeelini_adm/db/onoff.db", implode("", $onoff));
    fputs ($db, $a."|".$a1."|".$y."|".$a3."|".$a4."");
	}else if($chto == 3){
	if($a3 == 0){ $y = 1;}else{ $y =0;}
	unset($onoff[1]);
	file_put_contents("coffeelini_adm/db/onoff.db", implode("", $onoff));
    fputs ($db, $a."|".$a1."|".$a2."|".$y."|".$a4."");
	}else if($chto == 4){
	if($a4 == 0){ $y = 1;}else{ $y =0;}
	unset($onoff[1]);
	file_put_contents("coffeelini_adm/db/onoff.db", implode("", $onoff));
    fputs ($db, $a."|".$a1."|".$a2."|".$a3."|".$y."");
	}
    fclose($db);
	echo "1";
	exit;
}
?>