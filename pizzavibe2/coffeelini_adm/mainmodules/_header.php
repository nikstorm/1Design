<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################
	    $header_pos = file("coffeelini_adm/db/positionheaderimg.db");
    $header_pos1 = explode ("*|*", $header_pos[1]);
	$headimgpos = $header_pos1[0];
	$positionhead = $header_pos1[1];
    $header_set = file("coffeelini_adm/db/header_set.db");
    $header_set1 = explode ("*|*", $header_set[1]);
	$logo = $header_set1[0];
	$uploadfile = "img/$logo";
	$header_bac = $header_set1[1];
	$Headerlinecolor = $header_set1[2];
	$Menufontcolor = $header_set1[3];
	$Headersubtitle = $header_set1[4];
	$Headersubtitlecolor = $header_set1[5];
	$Headermaintitle = $header_set1[6];
	$Headermaintitlecolor = $header_set1[7];
	$Buttontext = $header_set1[8];
	$Buttongoesto = $header_set1[9];
	
    $Buttongoesto_no = $func->Butgotono($Buttongoesto);

	$Textbottomlovr = $header_set1[10];
    $size_header_bac = getimagesize("img/$header_bac"); 
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
	$onoff = file("coffeelini_adm/db/onoff.db");
    $onoff1 = explode ("|", $onoff[1]);
    $y = 0;
	$onofa=$onoff1[0]; 
	$onofa1=$onoff1[1]; 
	$onofa2=$onoff1[2]; 
	$onofa3=$onoff1[3]; 
	$onofa4=$onoff1[4];
	$header_set_onoff = file("coffeelini_adm/db/header_set_onoff.db");
    $headersetonoff = explode ("|", $header_set_onoff[1]);
	$a=$headersetonoff[0]; 
	$a1=$headersetonoff[1];
	$a2=$headersetonoff[2];
	
		// Introduction
	  $introduction = file("coffeelini_adm/db/introduction.db");
      $introduction1 = explode ("*|*", $introduction[1]);
	  $introduction_Maintitle = $introduction1[0];
	  	// Portfolio
	      $portfolio = file("coffeelini_adm/db/portfolio.db");
      $portfolio1 = explode ("*|*", $portfolio[1]);
	  $portfolio_title = $portfolio1[0];
	  	// About
	  $about = file("coffeelini_adm/db/about.db");
	$about1 = explode ("*|*", $about[1]);
	$about_title = $about1[0];
		// Item
	     $item = file("coffeelini_adm/db/item.db");
         $item1 = explode ("*|*", $item[1]);
	     $item_title = $item1[0];
	  	// contact
	$contact_us = file("coffeelini_adm/db/contact_us.db");
    $contact_us1 = explode ("*|*", $contact_us[1]);
    $contact_us_title = $contact_us1[0];
	    $head_name_modul = file("coffeelini_adm/db/name_modul.db");
	$head_name_modul1 = explode ("*|*", $head_name_modul[1]);
	$modul1 = $introduction_Maintitle;
    $modul2 = $portfolio_title;	
    $modul3 = $about_title;	
	$modul4 = $item_title;
	$modul5 = $contact_us_title;
	
	if($Buttongoesto_no == 1){$Buttongoesto_name = $modul1;}
	if($Buttongoesto_no == 2){$Buttongoesto_name = $modul2;}
	if($Buttongoesto_no == 3){$Buttongoesto_name = $modul3;}
	if($Buttongoesto_no == 4){$Buttongoesto_name = $modul4;}
	if($Buttongoesto_no == 5){$Buttongoesto_name = $modul5;}

?>
<span id="text">Header <span>Change what appears in the header of your website</span></span>
<div class="menu_adm_block_a_line"></div>
<div class="pod_zagol"><i class="fa fa-list"></i> Main modules &nbsp;/&nbsp;&nbsp;Header</div>
<center>
<div style="text-align:left;width:70%;min-width:600px; z-index:5; position:relative;">
<div><span id="text" style="font-size:14px;"><font style="font-weight:700;">Enable and disable text or button</font>&nbsp;&nbsp;&nbsp; Is on </span>
<span style="display:inline-block;width:10px; height:10px; background: #0084ff;border: 1px solid #0077e6;"></span>
<span id="text" style="font-size:14px;"> Is off </span>  
<span style="display:inline-block;width:10px; height:10px; background: #ddd;border: 1px solid #0077e6;"></span></div>
<table style="width:100%; text-align:center;">
<tr>
<td style="width:33%;"><div id="onoffbtn0" onClick="headersetonoff('0'), start_save()" class="cont_inp_raz<?if($a == $y){echo " cont_inp_raz_on";}else echo " cont_inp_raz_off";?>"><?if($a == $y){echo "<i class='fa fa-check'></i> ";}?>Small title</div></td>
<td style="width:33%;"><div id="onoffbtn1" onClick="headersetonoff('1'), start_save()" class="cont_inp_raz<?if($a1 == $y){echo " cont_inp_raz_on";}else echo " cont_inp_raz_off";?>"><?if($a1 == $y){echo "<i class='fa fa-check'></i> ";}?>Big title</div></td>
<td style="width:33%;"><div id="onoffbtn2" onClick="headersetonoff('2'), start_save()" class="cont_inp_raz<?if($a2 == $y){echo " cont_inp_raz_on";}else echo " cont_inp_raz_off";?>"><?if($a2 == $y){echo "<i class='fa fa-check'></i> ";}?>Button</div></td>
</tr>
</table>

<!-- Section 1 -->
<div style="margin-top:30px; z-index:5; position:relative;">
<div class="error" id="error_log" style="width:97%;"></div>
<div class="good" id="good_log"  style="width:97%;"></div><BR/>
<table width="100%">
<tr><td width="50%">
<span id="title_inp">Header line color:</span>
<div id="Headerlinecolor" 
class=" " style="color:<?=$Menufontcolor;?>;font-weight:700; text-align:center; width:100%; padding:10px 0 10px 0; border-radius:5px; background:<?=$Headerlinecolor;?>;">
HEADER LINE COLOR
</div>
</td>
<td width="25%" >
<span id="title_inp">Line color:</span>
<input onClick="Headercolorline('Headerlinecolor')" onBlur="headerlinecolor('linecolor', 'Headerlinecolor', 'menufontcolor')" id="linecolor" class="form-control form-nas" maxlength="200" type="text" placeholder="Line color" value="<?=$Headerlinecolor;?>" />
</td>
<td width="25%" >
<span id="title_inp">Menu font color:</span>
<input onClick="Headercolorline('menufontcolor')" onBlur="headerlinecolor('linecolor', 'Headerlinecolor', 'menufontcolor');" id="menufontcolor" class="form-control form-nas" maxlength="200" type="text" placeholder="Font color" value="<?=$Menufontcolor;?>" />
</td>
</tr>
</table>
<BR/><div class="input_sign inp_save" title="Save" onClick="headersubtitle(), headerlinecolorsave(), start_save()" >Save</div>
</div>
<!-- Section 1 -->


<!-- Section 2 -->
<div style="margin-top:70px; z-index:5; position:relative;">
<div class="error" id="error_log1" style="width:97%;"></div>
<div class="good" id="good_log1"  style="width:97%;"></div><BR/>
<div >
<table width="100%">
<tr><td width="70%">
<span id="title_inp">Header subtitle:</span>
<input id="subtitle" class="form-control form-nas" maxlength="200" type="text" placeholder="Header subtitle" value="<?=$Headersubtitle;?>" />
</td>
<td width="30%" >
<span id="title_inp">Font color:</span>
<input onClick=" Headercolorline('no')" id="subtitlecolor" class="form-control form-nas" maxlength="200" type="text" placeholder="Font color" value="<?=$Headersubtitlecolor;?>" />
</td>
</tr>
</table>
</div>
<div style="margin-top:10px;">
<table width="100%">
<tr><td width="70%">
<span id="title_inp">Header main title:</span>
<input id="maintitle" class="form-control form-nas" maxlength="200" type="text" placeholder="Header main title" value="<?=$Headermaintitle;?>" />
</td>
<td width="30%" >
<span id="title_inp">Font color:</span>
<input onClick=" Headercolorline('no')" id="maintitlecolor" class="form-control form-nas" maxlength="200" type="text" placeholder="Font color" value="<?=$Headermaintitlecolor;?>" />
</td>
</tr>
</table>
</div>
<div style="margin-top:10px;">
<table width="100%">
<tr>
<td width="70%">
<span id="title_inp">Button text:</span>
<input id="buttontext" class="form-control form-nas" maxlength="200" type="text" placeholder="Button text" value="<?=$Buttontext;?>" />
</td>
<td width="30%" >
<span id="title_inp">Button goes to:</span>
<select id="butgoesto" class="form-control form-nas">
<option <? if($Buttongoesto_no == 1){?>selected<?}?> value="#services"><?=$modul1;?></option>
<option <? if($Buttongoesto_no == 2){?>selected<?}?> value="#portfolio"><?=$modul2;?></option>
<option <? if($Buttongoesto_no == 3){?>selected<?}?> value="#about"><?=$modul3;?></option>
<option <? if($Buttongoesto_no == 4){?>selected<?}?> value="#team"><?=$modul4;?></option>
<option <? if($Buttongoesto_no == 5){?>selected<?}?> value="#contact"><?=$modul5;?></option>
</select>
</td>
</tr>
</table><BR/>
<div style="width:99%; margin-left:3px; " id="onoffbtn3" onClick="Textbottomlovr('3'), start_save()" class="cont_inp_raz<?if($Textbottomlovr == 1){echo " cont_inp_raz_on";}else echo " cont_inp_raz_off";?>"><?if($Textbottomlovr == 1){echo "<i class='fa fa-check'></i> ";}?>Texts and button lower (to see the photo)</div>
<BR/><BR/><div class="input_sign inp_save" title="Save" onClick="headersubtitle(), headerlinecolorsave(), start_save()" >Save</div>
</div>
</div>
<!-- Section 2 -->

<!-- Section 3 -->
<div style="margin:70px 0px 50px 0px; z-index:5; position:relative;">
<span id="title_inp">Logo: &nbsp;&nbsp;&nbsp;</span><BR/>
<div id="imglogo" style="display:inline-block; max-width:100%; background:#ebebeb;padding:5px;"><img src="/img/<?=$logo;?>" style="max-width:100%;" /></div><BR/><BR/>
<div id="upload" ><span>Choose file</span></div>&nbsp;&nbsp;&nbsp;<span id="files" ></span>
<div class="input_sign inp_save" title="The standard logo" onClick="recoveryimg('0');" >Transparent logo</div> 
</div>

<!-- Section 3 -->

<!-- Section 4 -->
<div >
<span id="title_inp"  style="z-index:5; position:relative;">Main background image:<BR/><font style="font-size:16px;">(drag to adjust if the image is high)</font></span><BR/>
<div style="position:relative;">
<div id="imghead" style="z-index:2; position:relative; display:inline-block; background:<?=$Headerlinecolor;?>; max-width:70%;">
<? if($header_bac > 0){ ?>
<div id="headerbc_vib_obl" class="blocc_head_bc" onMouseUp="positionheaderimg(), start_save_bil()" style="top:<?=$header_bac_top;?>%;  height:<?=$h;?>%;">
<div style="cursor:auto; top:-<?=$h1;?>;position:absolute; z-index:4;width:100%; background:#FFFFFF; opacity:0.5; height:<?=$h1;?>;"></div>
<div style="position:absolute; z-index:4;width:99.4%; height:99.3%; border: red dashed 2px;"></div>
<div style="cursor:auto; bottom:-<?=$h1;?>;position:absolute; z-index:4;width:100%; background:#FFFFFF; opacity:0.5; height:<?=$h1;?>;"></div>
</div>
<?}?>
<img src="/img/<?=$header_bac;?>" style='max-width:100%;' />
</div>
<div id="header_bc_txt" style="font-size:0px;color:#FFFFFF;background:none;"></div>
</div>
<div style="z-index:5; position:relative;">
<BR/><BR/>
<div id="upload1" ><span>Choose file</span></div>&nbsp;&nbsp;&nbsp;<span id="files1" ></span>
<div id="onoffbtn4" style="margin-left:70px;position:relative;width:150px;top:-2px;"onClick="headerposition('4'), start_save_bil()" class="cont_inp_raz<?if($positionhead == $y){echo " cont_inp_raz_on";}else echo " cont_inp_raz_off";?>"><?if($positionhead == $y){echo "<i class='fa fa-check'></i> ";}?>Fixed image</div>&nbsp;&nbsp;&nbsp;
<div style="width:200px;"class="input_sign inp_save" title="Standard Main background image" onClick="recoveryimg('1');" >Solid color background</div>
</div>
</div>
<!-- Section 4 -->
</div>
</center>



