<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################
    $aparance = file("coffeelini_adm/db/aparance.db");
	$aparance1 = explode ("*|*", $aparance[1]);
	$ap_interfacecolor = $aparance1[0];
	$ap_hovercolor   = $aparance1[1];
	$ap_iconscolor = $aparance1[2];
	$img =  $aparance1[3];
	
	    $header_set = file("coffeelini_adm/db/header_set.db");
    $header_set1 = explode ("*|*", $header_set[1]);
		$Headerlinecolor = $header_set1[2];
	$Menufontcolor = $header_set1[3];
?>
<span id="text">Appearance <span> Change the main colors (like those of the buttons, of the links, etc.)</span></span>
<div class="menu_adm_block_a_line"></div>
<div class="pod_zagol"><i class="fa fa-fw fa-desktop"></i> Appearance</div>
<center>

<div style="text-align:left;width:70%;min-width:600px;">
<div class="apparen_bloc_img">
<img src="/img/<?=$img;?>" alt="" class="apparence_color_img" id="test2" />
</div>
<table style="margin-left:-3px;width:605;">
<tr>
<td width="50%">
<div id="onoffbtn1" onClick="color_btn_vib('1'), img_color_pere('Headerlinecolor', 'interfacecolor')" class="cont_inp_raz cont_inp_raz_on"><i class='fa fa-check'></i>Main interface color</div>
</td>
<td width="50%">
<div id="onoffbtn2" onClick="color_btn_vib('2'), img_color_pere('backg2', 'interfacehovercolor')" class="cont_inp_raz cont_inp_raz_off">Main interface hover color</div>
</td>
</tr>
<tr>
<td width="50%">
<div id="onoffbtn3" onClick="color_btn_vib('3'), img_color_pere('backg3', 'iconscolor')" class="cont_inp_raz cont_inp_raz_off">Social icons color</div>
</td>
<td width="50%">
<div id="onoffbtn4" onClick="color_btn_vib('4'), img_color_pere('Headerlinecolor1', 'linecolor')" class="cont_inp_raz cont_inp_raz_off">Header line color</div>
</td>
</tr>
</table>
<BR/><BR/>
<table width="100%">
<tr><td width="70%">
<span id="title_inp">Main interface color:</span>
<div id="Headerlinecolor" 
class="" style="color:#FFF;font-weight:700; text-align:center; width:100%; padding:10px 0 10px 0; border-radius:5px; background:<?=$ap_interfacecolor;?>;">
Main interface color
</div>
</td>
<td width="30%">
<span id="title_inp">Color:</span>
<input onClick=" Headercolorline('Headerlinecolor')" id="interfacecolor" class="form-control form-nas" maxlength="200" type="text" placeholder="Color" value="<?=$ap_interfacecolor;?>" />
</td>
</tr>
</table>
<BR/>
<table width="100%">
<tr><td width="70%">
<span id="title_inp">Main interface hover color:</span>
<div id="backg2" 
class=" " style="color:#FFF;font-weight:700; text-align:center; width:100%; padding:10px 0 10px 0; border-radius:5px; background:<?=$ap_hovercolor;?>;">
Main interface hover color
</div>
</td>
<td width="30%">
<span id="title_inp">Color:</span>
<input onClick=" Headercolorline('backg2')" id="interfacehovercolor" class="form-control form-nas" maxlength="200" type="text" placeholder="Color" value="<?=$ap_hovercolor;?>" />
</td>
</tr>
</table>
<BR/>
<table width="100%">
<tr><td width="70%">
<span id="title_inp">Social icons color:</span>
<div id="backg3" 
class=" " style="color:#FFF;font-weight:700; text-align:center; width:100%; padding:10px 0 10px 0; border-radius:5px; background:<?=$ap_iconscolor;?>;">
Social icons color
</div>
</td>
<td width="30%">
<span id="title_inp">Color:</span>
<input onClick=" Headercolorline('backg3')" id="iconscolor" class="form-control form-nas" maxlength="200" type="text" placeholder="Color" value="<?=$ap_iconscolor;?>" />
</td>
</tr>
</table>
<BR/><BR/><div class="input_sign inp_save" title="Save" onClick="headerlinecolorsave(), aparance_post(), start_save()" >Save</div>
<!-- Section 1 -->
<div style="margin-top:70px; z-index:5; position:relative;">
<div class="error" id="error_log" style="width:97%;"></div>
<div class="good" id="good_log"  style="width:97%;"></div><BR/>
<table width="100%">
<tr><td width="50%">
<span id="title_inp">Header line color:</span>
<div id="Headerlinecolor1" 
class="" style="color:<?=$Menufontcolor;?>;font-weight:700; text-align:center; width:100%; padding:10px 0 10px 0; border-radius:5px; background:<?=$Headerlinecolor;?>;">
HEADER LINE COLOR
</div>
</td>
<td width="25%" >
<span id="title_inp">Line color:</span>
<input onClick="Headercolorline('Headerlinecolor1')" id="linecolor" class="form-control form-nas" maxlength="200" type="text" placeholder="Line color" value="<?=$Headerlinecolor;?>" />
</td>
<td width="25%" >
<span id="title_inp">Menu font color:</span>
<input onClick="Headercolorline('menufontcolorset')" id="menufontcolor" class="form-control form-nas" maxlength="200" type="text" placeholder="Font color" value="<?=$Menufontcolor;?>" />
</td>
</tr>
</table>
<BR/><BR/><div class="input_sign inp_save" title="Save" onClick="aparance_post(), headerlinecolorsave(), start_save()" >Save</div>
</div>
</center>
</div>