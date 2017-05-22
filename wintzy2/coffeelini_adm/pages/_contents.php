<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################
$file = 'coffeelini_adm/db/customcode.db';
$custom = file_get_contents($file);

    $data1 = file("coffeelini_adm/db/contents.db");
    $dat = explode ("*|*", $data1[0]);
	$onoff = file("coffeelini_adm/db/onoff.db");
    $onoff1 = explode ("|", $onoff[1]);
	$y = 0;
	$a=$onoff1[0]; 
	$a1=$onoff1[1]; 
	$a2=$onoff1[2]; 
	$a3=$onoff1[3]; 
	$a4=$onoff1[4];
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
?>
<span id="text">Contents <span> Here you can edit the main parameters of your website</span></span>
<div class="menu_adm_block_a_line"></div>
<div class="pod_zagol"><i class="fa fa-fw fa-edit"></i> Contents </div>
<center>
<div style="text-align:left;width:70%;min-width:600px;">
<div><span id="text" style="font-size:14px;"><font style="font-weight:700;">Enable and disable site's modules</font>&nbsp;&nbsp;&nbsp; Module is on </span>
<span style="display:inline-block;width:10px; height:10px; background: #0084ff;border: 1px solid #0077e6;"></span>
<span id="text" style="font-size:14px;"> Module is off </span>  
<span style="display:inline-block;width:10px; height:10px; background: #ddd;border: 1px solid #0077e6;"></span></div>
<table style="width:100%; text-align:center;">
<tr>
<td style="width:20%;"><span id="onoffbtn0" onClick="onoffsecti('0'), start_save()" class="cont_inp_raz <?if($a == $y){echo "cont_inp_raz_on";}else echo "cont_inp_raz_off";?>"><?if($a == $y){echo "<i class='fa fa-check'></i>";}?> <?=$modul1;?></span></td>
<td style="width:20%;"><span id="onoffbtn1" onClick="onoffsecti('1'), start_save()" class="cont_inp_raz <?if($a1 == $y){echo "cont_inp_raz_on";}else echo "cont_inp_raz_off";?>"><?if($a1 == $y){echo "<i class='fa fa-check'></i>";}?> <?=$modul2;?></span></td>
<td style="width:20%;"><span id="onoffbtn2" onClick="onoffsecti('2'), start_save()" class="cont_inp_raz <?if($a2 == $y){echo "cont_inp_raz_on";}else echo "cont_inp_raz_off";?>"><?if($a2 == $y){echo "<i class='fa fa-check'></i>";}?> <?=$modul3;?></span></td>
<td style="width:20%;"><span id="onoffbtn3" onClick="onoffsecti('3'), start_save()" class="cont_inp_raz <?if($a3 == $y){echo "cont_inp_raz_on";}else echo "cont_inp_raz_off";?>"><?if($a3 == $y){echo "<i class='fa fa-check'></i>";}?> <?=$modul4;?></span></td>
<td style="width:20%;"><span id="onoffbtn4" onClick="onoffsecti('4'), start_save()" class="cont_inp_raz <?if($a4 == $y){echo "cont_inp_raz_on";}else echo "cont_inp_raz_off";?>"><?if($a4 == $y){echo "<i class='fa fa-check'></i>";}?> <?=$modul5;?></span></td>
</tr>
</table>
<div class="good" id="good_log"  style="width:97%;margin-top:50px;"></div>
<div style="margin:50px 0px 0px 0px;">
<span id="title_inp">Website's Title:</span><BR/>
<input id="title" class="form-control form-nas" maxlength="200" type="text" placeholder="Title" value="<?=$dat[0];?>" />
</div>
<div style="margin-top:20px;">
<span id="title_inp">Website's Description:</span><BR/>
<input id="description" class="form-control form-nas" maxlength="200" type="text" placeholder="Description" value="<?=$dat[1];?>" />
</div>
<div style="margin-top:20px;">
<span id="title_inp">Website's Keywords:</span><BR/>
<input id="keywords" class="form-control form-nas" maxlength="200" type="text" placeholder="Keywords" value="<?=$dat[2];?>" />
<BR/><BR/><div class="input_sign inp_save" title="Save Contents" onClick="contentssav(), start_save()" >Save</div>
</div>
<div style="margin:70px 0px 50px 0px;">
<span id="title_inp">Favicon: &nbsp;&nbsp;&nbsp;</span>
<div id="upload" ><span>Choose file</span></div> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="files" ><img src="/favico/<?=$dat[3];?>" width="20px" height="20px"/></span>
</div>
<div>
<div class="good" id="good_log1"  style="width:97%;"></div><BR/><BR/>
<span id="title_inp" style="font-size:20px;">Your custom code to insert into the website<br/>
<font style="font-size:16px;">(for example Google Analytics, on-site chat, etc.):</font></span><BR/>
<textarea id="customcode" style="font-family: 'Open Sans', sans-serif;font-size:16px;color:#222;padding:10px;width:100%; max-width:100%; height:300px;" 
placeholder="Code"><?=$custom;?></textarea><BR/><BR/>
<div class="input_sign inp_save" title="Save Code" onClick="customcode(), start_save()" >Save</div>
</div>
</div>
</center>