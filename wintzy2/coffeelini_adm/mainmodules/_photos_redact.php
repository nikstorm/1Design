<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################
if(isset($_GET["line"])){
	  
    $line1=$_GET["line"];
	      $portfolio = file("coffeelini_adm/db/portfolio.db");
       $portfolio1 = explode ("*|*", $portfolio[1]);
    $portfolio_img = file("coffeelini_adm/db/portfolio_img.db");
	$portfolio_img1 = explode ("*|*", $portfolio_img[$line1]);
		  $portfolio_title = $portfolio_img1[0];
	  $portfolio_subtitle = $portfolio_img1[1];
	$portfolio_Inner_title = $portfolio_img1[2];
	$portfolio_Inner_subtitle = $portfolio_img1[3];
	$portfolio_Inner_text = $portfolio_img1[4];
	$portfolio_button_text = $portfolio_img1[5];
	$portfolio_Img_Big = $portfolio_img1[6];
	$standtitl = $portfolio_img1[8];
	
		  	  	    $name_modul = file("coffeelini_adm/db/name_modul.db");
	$name_modul1 = explode ("*|*", $name_modul[1]);
	$modul1 = $name_modul1[0];
    $modul2 = $portfolio_title;	
    $modul3 = $name_modul1[2];	
	$modul4 = $name_modul1[3];
	$modul5 = $name_modul1[4];
?>
<link href="/coffeelini_adm/css/portfolio.css" rel="stylesheet" type="text/css" />
<span id="text"><?=$modul2;?> <span>Add and edit photos and their descriptions and titles</span></span>
<div class="menu_adm_block_a_line"></div>
<div class="pod_zagol"><i class="fa fa-list"></i> <span onClick="content('/header', 'content_adm')">Main modules</span>&nbsp;/&nbsp;<span onClick="content('/photos', 'content_adm'), start()"><?=$portfolio1[0];?></span>&nbsp;/&nbsp;One team member</div>
<center>
<div style="width:70%;min-width:600px;">
<!-- Section 1 -->
<div style="margin-top:0px;text-align:left;">
<div class="error" id="error_log" style="width:97%;"></div>
<div class="good" id="good_log"  style="width:97%;"></div><BR/>
<span id="title_inp">Title:</span>
<input  id="Innertitle" <?if($standtitl == 0){?>disabled="disabled" style="background:#f5f5f5;"<?}?> class="form-control form-nas" maxlength="200" type="text" placeholder="Title" value="<?=$portfolio_Inner_title;?>" />
<span id="title_inp" style="margin-top:25px;">Subtitle:</span>
<input  id="Innersubtitle" <?if($standtitl == 0){?>disabled="disabled" style="background:#f5f5f5;"<?}?> class="form-control form-nas" maxlength="200" type="text" placeholder="Subtitle" value="<?=$portfolio_Inner_subtitle;?>" />
<input type="hidden" id="standarttitle" value="<?=$portfolio_title;?>" />
<input type="hidden" id="standartsubtitle" value="<?=$portfolio_subtitle;?>" />
<input type="hidden" id="innersubtitlestandart" value="<?=$standtitl;?>" />
<BR/><BR/>
<div id="onoffbtn0" onClick="portf_standarttitle(<?=$line1;?>)" class="cont_inp_raz<?if($standtitl == 0){echo " cont_inp_raz_on";}else echo " cont_inp_raz_off";?>"><?if($standtitl == 0){echo "<i class='fa fa-check'></i> ";}?>The same as the external ones</div>
<BR/><BR/><div class="input_sign inp_save" title="Save" onClick=" portfo_innertext(<?=$line1;?>), portfo_innertitle(<?=$line1;?>), start_save()" >Save</div>
<div class="input_sign inp_save inp_bascs" title="Back" onClick="content('/photos', 'content_adm'), start()" >Back</div>
</div>
<!-- Section 1 -->
<!-- Section 2 -->
<div id="imglogo" style="margin-top:70px; max-width:800px;">
<img class="img-responsive" src="img/portfolio/<?=$portfolio_Img_Big;?>" alt="">
</div>
<BR/><BR/>
<div id="upload" ><span>Choose file</span></div>&nbsp;&nbsp;&nbsp;<span id="files" ></span>

<!-- Section 2 -->
<div style="margin-top:50px;text-align:left;" >
<div class="error" id="error_log1" style="width:97%;"></div>
<div class="good" id="good_log1"  style="width:97%;"></div><BR/>
<span id="title_inp" style="margin-top:25px;">Photo description:</span>
<textarea id="Innertext" ><?=$portfolio_Inner_text;?>&nbsp;</textarea><BR/>
<BR/><BR/>

<div class="input_sign inp_save" title="Save" onClick="portfo_innertitle(<?=$line1;?>), portfo_innertext(<?=$line1;?>), start_save()" >Save</div>
<div class="input_sign inp_save inp_bascs" title="Back" onClick="content('/photos', 'content_adm'), start()" >Back</div>
</div>
</div>
</center>
<?}else echo "Error no pages";?>