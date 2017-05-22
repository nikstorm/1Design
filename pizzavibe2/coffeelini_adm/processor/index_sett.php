<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################

       $customfile = 'coffeelini_adm/db/customcode.db';
    $custom = file_get_contents($customfile);

       $contents = file("coffeelini_adm/db/contents.db");
    $contentsdat = explode ("*|*", $contents[0]);
	
	
     // ON
       $onoff = file("coffeelini_adm/db/onoff.db");
    $onoff1 = explode ("|", $onoff[1]);
    $y = 0;
	$onofa=$onoff1[0]; 
	$onofa1=$onoff1[1]; 
	$onofa2=$onoff1[2]; 
	$onofa3=$onoff1[3]; 
	$onofa4=$onoff1[4];  
	// OFF
	
	 // Header
	    $header_pos = file("coffeelini_adm/db/positionheaderimg.db");
    $header_pos1 = explode ("*|*", $header_pos[1]);
	$positionhead = $header_pos1[1];
	if($positionhead == 0){
	$fix = $header_pos1[0] - 45;
	if($fix < 0){ $fix1 = 0; }else{ $fix1 = $fix;}
	$dob = $fix1;
	}else{
	$dob = 0; 
	}
	
	$headimgpos = $header_pos1[0] + $dob;
	
	if($positionhead == 0){ $positionhead1 = "fixed"; }else{ $positionhead1 = "scroll";}
	   $header_set_onoff = file("coffeelini_adm/db/header_set_onoff.db");
    $headersetonoff = explode ("|", $header_set_onoff[1]);
	$headersetonoffa=$headersetonoff[0]; 
	$headersetonoffa1=$headersetonoff[1];
	$headersetonoffa2=$headersetonoff[2];
	
	    $header_set = file("coffeelini_adm/db/header_set.db");
    $header_set1 = explode ("*|*", $header_set[1]);
	$logo = $header_set1[0];
	$size_header_bac = getimagesize("img/$logo"); 
    $header_logo_width = $size_header_bac[0];
	$header_logo_height = $size_header_bac[1];
	$header_bac = $header_set1[1];
	$Headerlinecolor = $header_set1[2];
	$Menufontcolor = $header_set1[3];
	$Headersubtitle = $header_set1[4];
	$Headersubtitlecolor = $header_set1[5];
	$Headermaintitle = $header_set1[6];
	$Headermaintitlecolor = $header_set1[7];
	$Buttontext = $header_set1[8];
	$Buttongoesto = $header_set1[9];
	$Textbottomlovr = $header_set1[10];
	if($headersetonoffa2 == $y){
	if($Textbottomlovr == 1){ 
	$Textbottomlovrtop = "400px"; 
	$Textbottomlovrbottom = "100px"; 
	$Textbottomlovrtop1 = "125px"; 
	$Textbottomlovrbottom1 = "25px";
	}else{
    $Textbottomlovrtop = "300px"; 
	$Textbottomlovrbottom = "200px"; 
	$Textbottomlovrtop1 = "100px"; 
	$Textbottomlovrbottom1 = "50px";
	}
	}else{
	if($Textbottomlovr == 1){ 
	$Textbottomlovrtop = "520px"; 
	$Textbottomlovrbottom = "50px"; 
	$Textbottomlovrtop1 = "125px"; 
	$Textbottomlovrbottom1 = "25px";
	}else{
    $Textbottomlovrtop = "430px"; 
	$Textbottomlovrbottom = "140px"; 
	$Textbottomlovrtop1 = "190px"; 
	$Textbottomlovrbottom1 = "25px";
	}
	}
	// Header
	
	// Introduction
	  $introduction = file("coffeelini_adm/db/introduction.db");
      $introduction1 = explode ("*|*", $introduction[1]);
	  $introduction_Maintitle = $introduction1[0];
	  $introduction_Mainsubtitle = $introduction1[1];
		     $introduction_item1 = file("coffeelini_adm/db/introduction_item1.db");
      $introduction_item11 = explode ("*|*", $introduction_item1[1]);
	  $ico_item1 = $introduction_item11[0];
	  $Titleitem1 = $introduction_item11[1];
	  $Textitem1 = $introduction_item11[2];
	  	  $introduction_item2 = file("coffeelini_adm/db/introduction_item2.db");
      $introduction_item22 = explode ("*|*", $introduction_item2[1]);
	  $ico_item2 = $introduction_item22[0];
	  $Titleitem2 = $introduction_item22[1];
	  $Textitem2 = $introduction_item22[2];
	  	  $introduction_item3 = file("coffeelini_adm/db/introduction_item3.db");
      $introduction_item33 = explode ("*|*", $introduction_item3[1]);
	  $ico_item3 = $introduction_item33[0];
	  $Titleitem3 = $introduction_item33[1];
	  $Textitem3 = $introduction_item33[2];
	// Introduction 
	
	// Portfolio
	      $portfolio = file("coffeelini_adm/db/portfolio.db");
      $portfolio1 = explode ("*|*", $portfolio[1]);
	  $portfolio_title = $portfolio1[0];
	  $portfolio_subtitle = $portfolio1[1];
	  $portfolio_button_text = $portfolio1[2];
	    $portfolio_img = file("coffeelini_adm/db/portfolio_img.db");
	// Portfolio
	
	// About
	  $about = file("coffeelini_adm/db/about.db");
	$about1 = explode ("*|*", $about[1]);
	$about_title = $about1[0];
	$about_subtitle = $about1[1];
	  $about_img = file("coffeelini_adm/db/about_img.db");
	       $aboutlower_item = file("coffeelini_adm/db/about_lower_item.db");
	$aboutlower_item1 = explode ("*|*", $aboutlower_item[1]);
	  $aboutlower_itemonoff = $aboutlower_item1[0];
	$aboutlower_itemtext = $aboutlower_item1[1];
	
	// About
	
	// Item
	     $item = file("coffeelini_adm/db/item.db");
      $item1 = explode ("*|*", $item[1]);
	  $item_title = $item1[0];
	  $item_subtitle = $item1[1];
	  $item_text = $item1[2];
	$item_img = file("coffeelini_adm/db/item_img.db");
	
	// Item
	
	// contact
	$contact_us = file("coffeelini_adm/db/contact_us.db");
$contact_us1 = explode ("*|*", $contact_us[1]);
$contact_us_title = $contact_us1[0];
$contact_us_titlecolor = $contact_us1[1];
$contact_us_subtitle = $contact_us1[2];
$contact_us_subtitlecolor = $contact_us1[3];
$contact_us_Namecaption = $contact_us1[4];
$contact_us_Nameerror = $contact_us1[5];
$contact_us_Nameonoff = $contact_us1[6];
$contact_us_Phonecaption = $contact_us1[7];
$contact_us_Phoneerror = $contact_us1[8];
$contact_us_Phoneonoff = $contact_us1[9];
$contact_us_Emailcaption = $contact_us1[10];
$contact_us_Emailerror = $contact_us1[11];
$contact_us_Messagecaption = $contact_us1[12];
$contact_us_Messageerror = $contact_us1[13];
$contact_us_Messagesent = $contact_us1[14];
$contact_us_Buttontext = $contact_us1[15];
$contact_us_Timeout = $contact_us1[16];
$contact_us_Background = $contact_us1[17];
$contact_us_fixed = $contact_us1[18];
$contact_us_images = $contact_us1[19];
if($contact_us_fixed == 0){ $contactusfixed = "fixed"; }else{ $contactusfixed = "scroll"; }

	$contact_us_pos = file("coffeelini_adm/db/positioncontactus.db");
    $contact_us_pos1 = explode ("*|*", $contact_us_pos[1]);
	$contact_us_imgpos = $contact_us_pos1[0];
// contact
// footer
$footer = file("coffeelini_adm/db/footer.db");
$footer1 = explode ("*|*", $footer[1]);
$footer_Background = $footer1[0];
$footer_text = $footer1[1];
$footer_email = $footer1[2];
$footer_twit = str_replace(" ","",$footer1[3]);
$footer_face = str_replace(" ","",$footer1[4]);
$footer_ini = str_replace(" ","",$footer1[5]);
// footer

/// aparance

    $aparance = file("coffeelini_adm/db/aparance.db");
	$aparance1 = explode ("*|*", $aparance[1]);
	$ap_interfacecolor = $aparance1[0];
	$ap_hovercolor   = $aparance1[1];
	$ap_iconscolor = $aparance1[2];
	$ap_colorgood =  $aparance1[3];
	$ap_colorerror =  $aparance1[4];
	
// aparance

// name modules
	  	    $name_modul = file("coffeelini_adm/db/name_modul.db");
	$name_modul1 = explode ("*|*", $name_modul[1]);
	$modul1 = $introduction_Maintitle;
    $modul2 = $portfolio_title;	
    $modul3 = $about_title;	
	$modul4 = $item_title;
	$modul5 = $contact_us_title;

// name modules
?>
