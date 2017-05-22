<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################
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
$images = $contact_us1[19];

	    $header_pos = file("coffeelini_adm/db/positioncontactus.db");
    $header_pos1 = explode ("*|*", $header_pos[1]);
	$headimgpos = $header_pos1[0];
	$positionhead = $header_pos1[1];
    $size_header_bac = getimagesize("img/$images"); 
    $header_bac_width = $size_header_bac[0];
	$header_bac_height = $size_header_bac[1];
	if($header_bac_width < $header_bac_height){
	$w1per = $header_bac_width / 100;
	$h1 = $header_bac_height - $header_bac_width;
	$h2 = $h1 / $w1per;
	$h = 100 - $h2;
	$header_bac_top = ($headimgpos/100) * $h2;
	$header_bac_bottom = $headimgpos - $header_bac_top;
	}else{
	$h = 80;
	$h1 = "25%";
	$header_bac_top = $headimgpos/5;
	}
$data1 = file("coffeelini_adm/db/config.db");
    $dat = explode ("*|*", $data1[1]);
$Adminemail = $dat[1];
$name_modul = file("coffeelini_adm/db/name_modul.db");
	$name_modul1 = explode ("*|*", $name_modul[1]);
	$modul1 = $name_modul1[0];
    $modul2 = $name_modul1[1];	
    $modul3 = $name_modul1[2];	
	$modul4 = $name_modul1[3];
	$modul5 = $title;
?>
<span id="text" style="z-index:5; position:relative;"><?=$modul5;?> <span> Change all the aspects of your contact form </span></span>
<div class="menu_adm_block_a_line"></div>
<div class="pod_zagol" style="z-index:5; position:relative;"><i class="fa fa-list"></i> <span onClick="content('/header', 'content_adm')">Main modules</span> &nbsp;/&nbsp;&nbsp;<?=$modul5;?></div>
<center>
<div style="text-align:left;width:70%;min-width:600px;">

<div id="cont_img">
<span id="title_inp" style="z-index:200; position:relative;">Contact us background img: &nbsp;&nbsp;&nbsp;</span><BR/>

<div style="position:relative;">
<div id="imghead" style="z-index:2; position:relative; background:<?=$Background;?>; display:inline-block; max-width:70%;">
<? if($images > 0){ ?>
<div id="headerbc_vib_obl" class="blocc_head_bc" onMouseUp="positioncontactusimg(), start_save_bil()" style="top:<?=$header_bac_top;?>%;  height:<?=$h;?>%;">
<div style="cursor:auto; top:-<?=$h1;?>;position:absolute; z-index:4;width:100%; background:#FFFFFF; opacity:0.5; height:<?=$h1;?>;"></div>
<div style="position:absolute; z-index:4;width:99.4%; height:99.3%; border: red dashed 2px;"></div>
<div style="cursor:auto; bottom:-<?=$h1;?>;position:absolute; z-index:4;width:100%; background:#FFFFFF; opacity:0.5; height:<?=$h1;?>;"></div>
</div>
<?}?>
<img src="/img/<?=$images;?>" style='max-width:100%;' />
</div>
<div id="header_bc_txt" style="font-size:0px;color:#FFFFFF;background:none;"></div>
</div>

<div style="z-index:5; position:relative;">
<BR/>
<div id="upload" ><span>Choose file</span></div>&nbsp;&nbsp;&nbsp;<span id="files" ></span>
<div id="onoffbtn2" style="position:relative; width: 100px; margin-left:50px; top:-2px;" onClick="btnonoff('2', 'fixed'), contact_us_post_fixed_img()" class="cont_inp_raz<?if($fixed == 0){echo " cont_inp_raz_on";}else echo " cont_inp_raz_off";?>"><?if($fixed == 0){echo "<i class='fa fa-check'></i> ";}?>Fixed img</div>
<input id="fixed" type="hidden" value="<?=$fixed;?>" />
<div style="width:200px;" class="input_sign inp_save" title="The standard logo" onClick="standartimg();" >Solid color background</div> 
</div>
</div>

<table width="100%" style="margin-top:50px; z-index:5; position:relative;">
<tr><td width="70%">
<span id="title_inp">Contact us background color:</span>
<div id="Headerlinecolor" 
class=" " style="color:<?=$titlecolor;?>;font-weight:700; text-align:center; width:100%; padding:10px 0 10px 0; border-radius:5px; background:<?=$Background;?>;">
Contact us background color
</div>
</td>
<td width="30%">
<span id="title_inp">Background color:</span>
<input onClick="Headercolorline('Headerlinecolor')" onBlur="headerlinecolor('linecolor', 'Headerlinecolor', 'menufontcolor')" id="linecolor" class="form-control form-nas" maxlength="200" type="text" placeholder="Background color" value="<?=$Background;?>" />
</td>

</tr>
</table>
<table width="100%">
<tr><td width="70%">
<span id="title_inp" style="margin-top:25px;">Title:</span>
<input id="title" class="form-control form-nas" maxlength="200" type="text" placeholder="Title" value="<?=$title;?>" />
</td>
<td width="30%" >
<span id="title_inp" style="margin-top:25px;">Font color:</span>
<input onClick="Headercolorline('menufontcolor')" onBlur="headerlinecolor('linecolor', 'Headerlinecolor', 'menufontcolor');" id="menufontcolor" class="form-control form-nas" maxlength="200" type="text" placeholder="Font color" value="<?=$titlecolor;?>" />
</td>
</tr>
<tr><td width="70%">
<span id="title_inp" style="margin-top:25px;">Subtitle:</span>
<input id="subtitle" class="form-control form-nas" maxlength="200" type="text" placeholder="Subtitle" value="<?=$subtitle;?>" />
</td>
<td width="30%" >
<span id="title_inp" style="margin-top:25px;">Font color:</span>
<input onClick="Headercolorline('no')" id="subtitlecolor" class="form-control form-nas" maxlength="200" type="text" placeholder="Font color" value="<?=$subtitlecolor;?>" />
</td>
</tr>
</table>

<span id="title_inp" style="margin-top:25px;">Name field caption:</span>
<input id="Namecaption" class="form-control form-nas" maxlength="200" type="text" placeholder="Name field caption" value="<?=$Namecaption;?>" />
<table width="100%">
<tr>
<td width="80%">
<span id="title_inp" style="margin-top:25px;">Name field error text:</span>
<input id="Nameerror" class="form-control form-nas" maxlength="200" type="text" placeholder="Name field error text" value="<?=$Nameerror;?>" />
</td>
<td width="20%">
<div id="onoffbtn0" style="margin-top:55px;" onClick="btnonoff('0', 'Nameonoff')" class="cont_inp_raz<?if($Nameonoff == 0){echo " cont_inp_raz_on";}else echo " cont_inp_raz_off";?>"><?if($Nameonoff == 0){echo "<i class='fa fa-check'></i> ";}?>Obligatory</div>
<input id="Nameonoff" type="hidden" value="<?=$Nameonoff;?>" />
</td>
</tr>
</table>
<span id="title_inp" style="margin-top:25px;">Phone field caption:</span>
<input id="Phonecaption" class="form-control form-nas" maxlength="200" type="text" placeholder="Phone field caption" value="<?=$Phonecaption;?>" />
<table width="100%">
<td width="80%">
<span id="title_inp" style="margin-top:25px;">Phone field error text:</span>
<input id="Phoneerror" class="form-control form-nas" maxlength="200" type="text" placeholder="Phone field error text" value="<?=$Phoneerror;?>" />
</td>
<td width="20%">
<div id="onoffbtn1" style="margin-top:55px;" onClick="btnonoff('1', 'Phoneonoff')" class="cont_inp_raz<?if($Phoneonoff == 0){echo " cont_inp_raz_on";}else echo " cont_inp_raz_off";?>"><?if($Phoneonoff == 0){echo "<i class='fa fa-check'></i> ";}?>Obligatory</div>
<input id="Phoneonoff" type="hidden" value="<?=$Phoneonoff;?>" />
</td>
</tr>
</table>

<span id="title_inp" style="margin-top:25px;">Email field caption:</span>
<input id="Emailcaption" class="form-control form-nas" maxlength="200" type="text" placeholder="Email field caption" value="<?=$Emailcaption;?>" />

<span id="title_inp" style="margin-top:25px;">Email field error text:</span>
<input id="Emailerror" class="form-control form-nas" maxlength="200" type="text" placeholder="Email field error text" value="<?=$Emailerror;?>" />

<span id="title_inp" style="margin-top:25px;">Message caption:</span>
<input id="Messagecaption" class="form-control form-nas" maxlength="200" type="text" placeholder="Message caption" value="<?=$Messagecaption;?>" />

<span id="title_inp" style="margin-top:25px;">Message error text:</span>
<input id="Messageerror" class="form-control form-nas" maxlength="200" type="text" placeholder="Message error text" value="<?=$Messageerror;?>" />

<span id="title_inp" style="margin-top:25px;">Message sent text:</span>
<input id="Messagesent" class="form-control form-nas" maxlength="200" type="text" placeholder="Message sent text" value="<?=$Messagesent;?>" />
<table width="100%">
<tr>
<td width="75%">
<span id="title_inp" style="margin-top:25px;">Button text:</span>
<input id="Buttontext" class="form-control form-nas" maxlength="200" type="text" placeholder="Button text" value="<?=$Buttontext;?>" />
</td>
<td width="25%">
<span id="title_inp" style="margin-top:25px;">Timeout second:</span>
<input onKeyup="proverkasecond('#Timeout')" onKeypress="proverkasecond('#Timeout')" id="Timeout" class="form-control form-nas" maxlength="11" type="text" placeholder="Timeout second" value="<?=$Timeout;?>" />
</td>
</tr>
</table>
<table width="100%">
<tr>
<td width="100%">
<span id="title_inp" style="margin-top:25px;">Admin email:</span>
<input id="Adminemail" class="form-control form-nas" maxlength="200" type="text" placeholder="Admin email" value="<?=$Adminemail;?>" />
</td>
</tr>
</table><BR/>
<div class="error" id="error_log" style="width:97%;"></div>
<div class="good" id="good_log"  style="width:97%;"></div>
<BR/><BR/><div class="input_sign inp_save" title="Save" onClick="contact_us_post(), start_save()" >Save</div>
</div>
</center>