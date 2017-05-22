<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################
if(isset($_POST["namemodules"])){
    $modul = $_POST["namemodules"];
	$id = $_POST["namemodulesid"];
    $name_modul = file("coffeelini_adm/db/name_modul.db");
	$name_modul1 = explode ("*|*", $name_modul[1]);
	if($id == 0){ $modul1 = $modul; }else{ $modul1 = $name_modul1[0]; };
    if($id == 1){ $modul2 = $modul; }else{ $modul2 = $name_modul1[1]; };	
    if($id == 2){ $modul3 = $modul; }else{ $modul3 = $name_modul1[2]; };	
	if($id == 3){ $modul4 = $modul; }else{ $modul4 = $name_modul1[3]; };
	if($id == 4){ $modul5 = $modul; }else{ $modul5 = $name_modul1[4]; };
	$db=fopen("coffeelini_adm/db/name_modul.db","a");
	unset($name_modul[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/name_modul.db", implode("", $name_modul));
    fputs ($db, $modul1."*|*".$modul2."*|*".$modul3."*|*".$modul4."*|*".$modul5."");
	fclose($db);
   echo "1";
   exit;
}
if(isset($_POST["maintitle"])){
    $Maintitle = $_POST["maintitle"];
	$Mainsubtitle = $_POST["mainsubtitle"];
    $introduction = file("coffeelini_adm/db/introduction.db");
	$db=fopen("coffeelini_adm/db/introduction.db","a");
	unset($introduction[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/introduction.db", implode("", $introduction));
    fputs ($db, $Maintitle."*|*".$Mainsubtitle."");
	fclose($db);
   echo "1";
   exit;
}
if(isset($_POST["item"])){
    $chto = $_POST["item"];
    $icon = $_POST["ico_item"];
	$Titleitem = $_POST["titleitem"];
	$Textitem = $func->text_wizwi($_POST["textitem"]);
if($chto == 1){
    $item = file("coffeelini_adm/db/introduction_item1.db");
	$db=fopen("coffeelini_adm/db/introduction_item1.db","a");
	unset($item[1]);
    file_put_contents("coffeelini_adm/db/introduction_item1.db", implode("", $item));
}
if($chto == 2){
	$item = file("coffeelini_adm/db/introduction_item2.db");
	$db=fopen("coffeelini_adm/db/introduction_item2.db","a");
	unset($item[1]);
    file_put_contents("coffeelini_adm/db/introduction_item2.db", implode("", $item));
}
if($chto == 3){
	$item = file("coffeelini_adm/db/introduction_item3.db");
	$db=fopen("coffeelini_adm/db/introduction_item3.db","a");
	unset($item[1]);
    file_put_contents("coffeelini_adm/db/introduction_item3.db", implode("", $item));
}
    fputs ($db, $icon."*|*".$Titleitem."*|*".$Textitem."");
	fclose($db);
   echo "1";
   exit;
}
?>