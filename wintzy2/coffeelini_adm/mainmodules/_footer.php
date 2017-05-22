<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################


$footer = file("coffeelini_adm/db/footer.db");
$footer1 = explode ("*|*", $footer[1]);
$Background = $footer1[0];
$footertext = $footer1[1];
$email = $footer1[2];
$twit = $footer1[3];
$face = $footer1[4];
$ini = $footer1[5];
?>
<span id="text">Footer <span> Change what appears in the lowest part of your website</span> </span>
<div class="menu_adm_block_a_line"></div>
<div class="pod_zagol"><i class="fa fa-list"></i> <span onClick="content('/header', 'content_adm')">Main modules</span> &nbsp;/&nbsp;&nbsp;Footer</div>
<center>
<div style="text-align:left;width:70%;min-width:600px;">
<div style="">

</div>
<table width="100%" align="center">
<tr><td width="50%">
<span id="title_inp">Footer background color:</span>
<div id="Headerlinecolor" 
class=" " style="border:1px solid #ddd; color:#545454;font-weight:700; text-align:center; width:100%; padding:10px 0 10px 0; border-radius:5px; background:<?=$Background;?>;">
background color
</div>
</td>
<td width="30%">
<span id="title_inp">color:</span>
<input onClick="Headercolorline('Headerlinecolor')" onBlur="headerlinecolor('linecolor', 'Headerlinecolor')" id="linecolor" class="form-control form-nas" maxlength="200" type="text" placeholder="Background color" value="<?=$Background;?>" />
</td>
</tr>
</table>
<span id="title_inp" style="margin-top:25px;">Copyright text:</span>
<input id="foottext" class="form-control form-nas" maxlength="200" type="text" placeholder="Copyright text" value="<?=$footertext;?>" />
<span id="title_inp" style="margin-top:25px;">Footer email:</span>
<input id="email" class="form-control form-nas" maxlength="200" type="text" placeholder="Footer email" value="<?=$email;?>" />
<span id="title_inp" style="margin-top:25px;">Twitter:</span>
<input id="Twitter" class="form-control form-nas" maxlength="200" type="text" placeholder="Twitter" value="<?=$twit;?>" />
<span id="title_inp" style="margin-top:25px;">Facebook:</span>
<input id="Facebook" class="form-control form-nas" maxlength="200" type="text" placeholder="Facebook" value="<?=$face;?>" />
<span id="title_inp" style="margin-top:25px;">Linkedin:</span>
<input id="linkedin" class="form-control form-nas" maxlength="200" type="text" placeholder="linkedin" value="<?=$ini;?>" />
<BR/><BR/>
<div class="error" id="error_log" style="width:97%;"></div>
<div class="good" id="good_log"  style="width:97%;"></div>
<BR/><div class="input_sign inp_save" title="Save" onClick="footer_post(), start_save()" >Save</div>