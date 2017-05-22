<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################

   	$y = 0;
	
      $about = file("coffeelini_adm/db/about.db");
    $about1 = explode ("*|*", $about[1]);
	  $title = $about1[0];
	  $subtitle = $about1[1];
	$about_img = file("coffeelini_adm/db/about_img.db");
     $aboutlower_item = file("coffeelini_adm/db/about_lower_item.db");
	$aboutlower_item1 = explode ("*|*", $aboutlower_item[1]);
	$a = $aboutlower_item1[0];
	$aboutlower_itemtext = $aboutlower_item1[1];
			  	  	    $name_modul = file("coffeelini_adm/db/name_modul.db");
	$name_modul1 = explode ("*|*", $name_modul[1]);
	$modul1 = $name_modul1[0];
    $modul2 = $name_modul1[1];	
    $modul3 = $title;	
	$modul4 = $name_modul1[3];
	$modul5 = $name_modul1[4];
?>
<link href="/coffeelini_adm/css/about.css" rel="stylesheet" type="text/css" />

<? 
if(isset($_GET["line"])){
    $line1=$_GET["line"];
	$about_img1 = explode ("*|*", $about_img[$line1]);
	$about_img_title = $about_img1[0];
	$about_img_subtitle = $about_img1[1];
	$about_img_text = $about_img1[2];
	$about_img_img = $about_img1[3];
	

?>
<span id="text"><?=$modul3;?> <span>Change the items on the vertical construction on your website. </span></span>
<div class="menu_adm_block_a_line"></div>
<div class="pod_zagol"><i class="fa fa-list"></i> <span onClick="content('/header', 'content_adm')">Main modules</span>&nbsp;/&nbsp;<span onClick="content('/about', 'content_adm')"><?=$modul3;?></span>&nbsp;/&nbsp;One items</div>
<center>
<div style="text-align:left;width:70%;min-width:600px;">
<!-- Section 2 -->
<div style="margin:0px 0px 0px 0px; z-index:5; position:relative; text-align:center;">
<div class="about_img" id="abimg" style="margin:0 0 0 0;">
<img class="img_about" src="img/about/<?=$about_img_img;?>" alt="">
</div><BR/><BR/>
 &nbsp;&nbsp;&nbsp;<div id="upload" style="margin-top:10px;"><span>Choose file</span></div>&nbsp;&nbsp;&nbsp;<span id="files" ></span>
</div>
<!-- Section 2 -->
<!-- Section 1 -->
<div style="margin-top:20px;">
<div class="error" id="error_log" style="width:97%;"></div>
<div class="good" id="good_log"  style="width:97%;"></div><BR/>
<span id="title_inp">Title:</span>
<input  id="abtitle" class="form-control form-nas" maxlength="200" type="text" placeholder="Title" value="<?=$about_img_title;?>" />
<span id="title_inp" style="margin-top:25px;">Subtitle:</span>
<input  id="absubtitle" class="form-control form-nas" maxlength="200" type="text" placeholder="Subtitle" value="<?=$about_img_subtitle;?>" />
<span id="title_inp" style="margin-top:25px;">Text:</span>
<textarea id="abouttext" ><?=$about_img_text;?>&nbsp;</textarea><BR/>
<BR/><BR/>

<div class="input_sign inp_save" title="Save" onClick="aboutprojectsett(<?=$line1;?>), start_save()" >Save</div>
<div class="input_sign inp_save inp_bascs" title="Back" onClick="content('/about', 'content_adm'), start()" >Back</div>
</div>
<!-- Section 1 -->
<?}else{?>
<span id="text"><?=$modul3;?> <span>Change the items on the vertical construction on your website. </span></span>
<div class="menu_adm_block_a_line"></div>
<div class="pod_zagol"><i class="fa fa-list"></i> <span onClick="content('/header', 'content_adm')">Main modules</span>&nbsp;/&nbsp;<?=$modul3;?></div>
<center>
<div style="text-align:left;width:70%;min-width:600px;">
<!-- Section 1 -->
<div style="margin-top:0px;">
<div class="error" id="error_log" style="width:97%;"></div>
<div class="good" id="good_log"  style="width:97%;"></div><BR/>
<span id="title_inp">Title:</span>
<input  id="abtitle" class="form-control form-nas" maxlength="200" type="text" placeholder="Title" value="<?=$title;?>" />
<span id="title_inp" style="margin-top:25px;">Subtitle:</span>
<input  id="absubtitle" class="form-control form-nas" maxlength="200" type="text" placeholder="Subtitle" value="<?=$subtitle;?>" />
<BR/><BR/><div class="input_sign inp_save" title="Save" onClick="abouttitlesub(), aboutloweritem(), start_save()" >Save</div>
</div>
<!-- Section 1 -->

<!-- Section 2 -->
<div style="margin-top:70px; text-align:center;">
<div class="block_img_about" id="blockimgabout">
<?
     for ($i=1; $i<=count($about_img)-1; $i++) {
	   $line = $i;
	   $about_img1 = explode ("*|*", $about_img[$i]);
	   $img = $about_img1[3];
?>
<div class="about_img" id="about_img<?=$line;?>">
<div class="item_str_block" style="margin-left:-24px;">
<?if($line != 1){?>
<span class="str_item str_item_left" onClick="about_next_down('2', '<?=$line;?>');" ><i class="fa fa-arrow-left"></i></span>
<?}?>
<span class="item_preload" id="item_preload<?=$line;?>"></span>
<?if($line != (count($about_img)-1)){?>
<span class="str_item str_item_right" onClick="about_next_down('1', '<?=$line;?>');" ><i class="fa fa-arrow-right"></i></span>
<?}?>
</div>
<div title="To delete a project" class="unins" onClick="vopros_uns('about_uninsproject(<?=$line;?>), vopros_uns_close(), start()');"><i class="fa fa-remove"></i></div>
<div class="about-item_sett_sta" onClick="content('/aboutget<?=$line;?>', 'content_adm'), start()" ><div class="icon_sett"><i class="fa fa-pencil-square-o"></i></div></div>
<img class="img_about" src="img/about/<?=$img;?>" alt="">
</div>
<?}?>
</div>
</div>
<!-- Section 2 -->

<!-- Section 1 -->

<BR/><BR/>
<div class="input_sign inp_save" title="Add item" style="float:none;width:97.5%;"onClick="about_addproject(<?=count($about_img);?>), start()" >Add item</div>
<div style="margin-top:50px;">
<div class="error" id="error_log1" style="width:97%;"></div>
<div class="good" id="good_log1"  style="width:97%;"></div><BR/>
<span id="title_inp">Lower item:</span>
<table width="100%">
<tr>
<td width="80%">
<input  id="loweritem" class="form-control form-nas" maxlength="50" type="text" placeholder="Lower item" value="<?=$aboutlower_itemtext;?>" />
</td>
<td width="20%">
<div style="margin-top:-2px;"id="onoffbtn0" onClick="aboutonoff('0'), start_save()" class="cont_inp_raz<?if($a == $y){echo " cont_inp_raz_on";}else echo " cont_inp_raz_off";?>"><?if($a == $y){echo "<i class='fa fa-check'></i> ";}?>Lower item active</div>
</td>
</tr>
</table>
<BR/><BR/><div class="input_sign inp_save" title="Save" onClick="abouttitlesub(), aboutloweritem(), start_save()" >Save</div>
</div>
<!-- Section 1 -->	
<?}?>
</div>
</center>