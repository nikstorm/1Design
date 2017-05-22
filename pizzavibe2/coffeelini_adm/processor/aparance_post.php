<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################

if(isset($_POST["interfacecolor"])){
    $aparance = file("coffeelini_adm/db/aparance.db");
	
	$ap_interfacecolor = $_POST["interfacecolor"];
	$ap_hovercolor   = $_POST["hovercolor"];
	$ap_iconscolor = $_POST["iconscolor"];
	$aparance1 = explode ("*|*", $aparance[1]);
    $color_pasce = $aparance1[3];
	
	$db=fopen("coffeelini_adm/db/aparance.db","a");
	unset($aparance[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/aparance.db", implode("", $aparance));
    fputs ($db, $ap_interfacecolor."*|*".$ap_hovercolor."*|*".$ap_iconscolor."*|*".$color_pasce."*|*");
	fclose($db);
   echo "1";
   exit;
}

?>