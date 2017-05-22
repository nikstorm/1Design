<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################


if(isset($_POST["positionheaderimg"])){
    $pos = $_POST["positionheaderimg"];
	if($pos == "" || $pos == "NaN"){ $pos1 = $y; }else{ $pos1 = $pos; }
    $header_pos = file("coffeelini_adm/db/positioncontactus.db");
    $header_pos1 = explode ("*|*", $header_pos[1]);
	$position = $header_pos1[1];
	$db=fopen("coffeelini_adm/db/positioncontactus.db","a");
	unset($header_pos[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/positioncontactus.db", implode("", $header_pos));
    fputs ($db, $pos1."*|*".$position."");
	fclose($db);
   echo "1";
exit;
}

if(isset($_POST["standartimg"])){
   	$contact_us = file("coffeelini_adm/db/contact_us.db");
$contact_us1 = explode ("*|*", $contact_us[1]);
$title = $contact_us1[0];
$titlecolor = $contact_us1[1];
$subtitle = $contact_us1[2];
$subtitlecolor = $contact_us1[3];
$Namecaption = $contact_us1[4];
$Nameerror = $contact_us1[5];
$Nameonoff = $contact_us1[6];
$Phonecaption = $contact_us1[7];
$Phoneerror = $contact_us1[8];
$Phoneonoff = $contact_us1[9];
$Emailcaption = $contact_us1[10];
$Emailerror = $contact_us1[11];
$Messagecaption = $contact_us1[12];
$Messageerror = $contact_us1[13];
$Messagesent = $contact_us1[14];
$Buttontext = $contact_us1[15];
$Timeout = $contact_us1[16];
$Background = $contact_us1[17];
$fixed = $contact_us1[18];
$images = "map-imagee.png";

	$db=fopen("coffeelini_adm/db/contact_us.db","a");
	unset($contact_us[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/contact_us.db", implode("", $contact_us));
    fputs ($db, $title."*|*".$titlecolor."*|*".$subtitle."*|*".$subtitlecolor."*|*".$Namecaption."*|*".$Nameerror."*|*".$Nameonoff."*|*".$Phonecaption."*|*".$Phoneerror."*|*".$Phoneonoff."*|*".$Emailcaption."*|*".$Emailerror."*|*".$Messagecaption."*|*".$Messageerror."*|*".$Messagesent."*|*".$Buttontext."*|*".$Timeout."*|*".$Background."*|*".$fixed."*|*".$images."*|*");
	fclose($db);
   echo "<img src='/img/map-imagee.png' alt='' style='max-width:100%;' />";
   exit;
}
if(isset($_POST["title"])){

$Adminemail = $func->IsMail($_POST["Adminemail"]);
if($Adminemail !== false){
$contact_us = file("coffeelini_adm/db/contact_us.db");
$contact_us1 = explode ("*|*", $contact_us[1]);

$title = $_POST["title"];
$titlecolor = $_POST["titlecolor"];
$subtitle = $_POST["subtitle"];
$subtitlecolor = $_POST["subtitlecolor"];
$Namecaption = $_POST["Namecaption"];
$Nameerror = $_POST["Nameerror"];
$Nameonoff = $_POST["Nameonoff"];
$Phonecaption = $_POST["Phonecaption"];
$Phoneerror = $_POST["Phoneerror"];
$Phoneonoff = $_POST["Phoneonoff"];
$Emailcaption = $_POST["Emailcaption"];
$Emailerror = $_POST["Emailerror"];
$Messagecaption = $_POST["Messagecaption"];
$Messageerror = $_POST["Messageerror"];
$Messagesent = $_POST["Messagesent"];
$Buttontext = $_POST["Buttontext"];
$Timeout = $_POST["Timeout"];
$Background = $_POST["Background"];
$fixed = $_POST["fixed"];
$images = $contact_us1[19];

	$db=fopen("coffeelini_adm/db/contact_us.db","a");
	unset($contact_us[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/contact_us.db", implode("", $contact_us));
    fputs ($db, $title."*|*".$titlecolor."*|*".$subtitle."*|*".$subtitlecolor."*|*".$Namecaption."*|*".$Nameerror."*|*".$Nameonoff."*|*".$Phonecaption."*|*".$Phoneerror."*|*".$Phoneonoff."*|*".$Emailcaption."*|*".$Emailerror."*|*".$Messagecaption."*|*".$Messageerror."*|*".$Messagesent."*|*".$Buttontext."*|*".$Timeout."*|*".$Background."*|*".$fixed."*|*".$images."*|*");
	fclose($db);
	$data1 = file("coffeelini_adm/db/config.db");
    $dat = explode ("*|*", $data1[1]);
	$dat_login = $dat[0];
	$dat_pass = $dat[2];
		$db1=fopen("coffeelini_adm/db/config.db","a");
	    unset($data1[1]);
        file_put_contents("coffeelini_adm/db/config.db", implode("", $data1));
        fputs ($db1, $dat_login."*|*".$Adminemail."*|*".$dat_pass."");
	    fclose($db1);
   echo "1";
   exit;
 }else echo "Admin Email has incorrect format";
}
if(isset($_POST["footertext"])){
$footer = file("coffeelini_adm/db/footer.db");
$email = $func->IsMail($_POST["email"]);
if($email !== false){
$footertext = $_POST["footertext"];
$Background = $_POST["Background"];
$twit = $func->Butgoto($_POST["Twitter"]);
$fase = $func->Butgoto($_POST["Facebook"]);
$in = $func->Butgoto($_POST["linkedin"]); 

	$db=fopen("coffeelini_adm/db/footer.db","a");
	unset($footer[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/footer.db", implode("", $footer));
    fputs ($db, $Background."*|*".$footertext."*|*".$email."*|*".$twit."*|*".$fase."*|*".$in."*|*");
	fclose($db);
   echo "1";
   exit;
}else echo "Email has incorrect format";
}

if(isset($_POST["fixedimg"])){

   	$contact_us = file("coffeelini_adm/db/contact_us.db");
$contact_us1 = explode ("*|*", $contact_us[1]);
$title = $contact_us1[0];
$titlecolor = $contact_us1[1];
$subtitle = $contact_us1[2];
$subtitlecolor = $contact_us1[3];
$Namecaption = $contact_us1[4];
$Nameerror = $contact_us1[5];
$Nameonoff = $contact_us1[6];
$Phonecaption = $contact_us1[7];
$Phoneerror = $contact_us1[8];
$Phoneonoff = $contact_us1[9];
$Emailcaption = $contact_us1[10];
$Emailerror = $contact_us1[11];
$Messagecaption = $contact_us1[12];
$Messageerror = $contact_us1[13];
$Messagesent = $contact_us1[14];
$Buttontext = $contact_us1[15];
$Timeout = $contact_us1[16];
$Background = $contact_us1[17];
$fixed = $_POST["fixedimg"];
$images = $contact_us1[19];

	$db=fopen("coffeelini_adm/db/contact_us.db","a");
	unset($contact_us[1]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/contact_us.db", implode("", $contact_us));
    fputs ($db, $title."*|*".$titlecolor."*|*".$subtitle."*|*".$subtitlecolor."*|*".$Namecaption."*|*".$Nameerror."*|*".$Nameonoff."*|*".$Phonecaption."*|*".$Phoneerror."*|*".$Phoneonoff."*|*".$Emailcaption."*|*".$Emailerror."*|*".$Messagecaption."*|*".$Messageerror."*|*".$Messagesent."*|*".$Buttontext."*|*".$Timeout."*|*".$Background."*|*".$fixed."*|*".$images."*|*");
	fclose($db);
   echo "<img src='/img/map-image.png' alt='' style='max-width:100%;' />";
   exit;
}
?>