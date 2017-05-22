<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################

if(isset($_POST["custom_code"])){
    $custom = $_POST["custom_code"];
	$ww=fopen("coffeelini_adm/db/customcode.db","w+");
	fputs ($ww, $custom."");
	fclose($ww);
	echo "1";
    exit;
};
Header("Location: /");
?>