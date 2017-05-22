<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################


   	$y = 0;
	
      $item = file("coffeelini_adm/db/item.db");
    $item1 = explode ("*|*", $item[1]);
	  $item_title = $item1[0];
	  $item_subtitle = $item1[1];
	  $item_text = $item1[2];
	$item_img = file("coffeelini_adm/db/item_img.db");
		   			  	  	    $name_modul = file("coffeelini_adm/db/name_modul.db");
	$name_modul1 = explode ("*|*", $name_modul[1]);
	$modul1 = $name_modul1[0];
    $modul2 = $name_modul1[1];	
    $modul3 = $name_modul1[2];	
	$modul4 = $item_title;
	$modul5 = $name_modul1[4];
if(isset($_GET["item_content"])){ //
     for ($i=1; $i<=count($item_img)-1; $i++) {
	   $line = $i;
	   $item_img1 = explode ("*|*", $item_img[$i]);
	   $img = $item_img1[0];

?>
<div class="item_img" id="item_bl<?=$line;?>">
<div>
<div class="item_str_block">
<?if($line != 1){?>
<span class="str_item str_item_left" onClick="blocc_next_down('2', '<?=$line;?>');" ><i class="fa fa-arrow-left"></i></span>
<?}?>
<span class="item_preload" id="item_preload<?=$line;?>"></span>
<?if($line != (count($item_img)-1)){?>
<span class="str_item str_item_right" onClick="blocc_next_down('1', '<?=$line;?>');" ><i class="fa fa-arrow-right"></i></span>
<?}?>
</div>
<div title="To delete a project" class="unins" onClick="vopros_uns('item_uninsproject(<?=$line;?>), vopros_uns_close(), start()');"><i class="fa fa-remove"></i></div>
<div class="about-item_sett_sta" onClick="content('/itemget<?=$line;?>', 'content_adm'), start()" ><div class="item_icon_sett"><i class="fa fa-pencil-square-o"></i></div></div>
<img class="img_about" src="img/team/<?=$img;?>" alt="">
</div>
</div>
<?}
return; exit;
}/// item_content?>

<span id="text"><?=$modul4;?> <span>Add and edit your team members. You can add up to 5, only the first 3 are seen</span></span>
<div class="menu_adm_block_a_line"></div>
<div class="pod_zagol"><i class="fa fa-list"></i> <span onClick="content('/header', 'content_adm')">Main modules</span> &nbsp;/&nbsp;
<? if(isset($_GET["line"])){?><span onClick="content('/team', 'content_adm'), start()"><?=$modul4;?></span> &nbsp;/&nbsp; One team member<?}else{?><?=$modul4;?><?}?></div>
<center>
<div style="text-align:left;width:70%;min-width:600px;">
<? if(isset($_GET["line"])){
    $line1=$_GET["line"];
	$item_img1 = explode ("*|*", $item_img[$line1]);
	$item_img_img = $item_img1[0];
	$item_img_name = $item_img1[1];
	$item_img_prof = $item_img1[2];
	$item_img_twit = $item_img1[3];
	$item_img_fase = $item_img1[4];
	$item_img_in = $item_img1[5];
	
	

?>
<!-- Section 2 -->
<div style="margin:0px 0px 0px 0px; z-index:5; position:relative; text-align:center;">
<div class="item_img" id="abimg" style="margin:0 0 0 0;">
<img class="img_about" src="img/team/<?=$item_img_img;?>" alt="">
</div><BR/><BR/>
 &nbsp;&nbsp;&nbsp;<div id="upload" style="margin-top:10px;"><span>Choose file</span></div>&nbsp;&nbsp;&nbsp;<span id="files" ></span>
</div>
<!-- Section 2 -->
<!-- Section 1 -->
<div style="margin-top:20px;">
<div class="error" id="error_log" style="width:97%;"></div>
<div class="good" id="good_log"  style="width:97%;"></div><BR/>
<span id="title_inp">Name:</span>
<input  id="Name" class="form-control form-nas" maxlength="200" type="text" placeholder="Name" value="<?=$item_img_name;?>" />
<span id="title_inp" style="margin-top:25px;">Profession:</span>
<input  id="Profession" class="form-control form-nas" maxlength="200" type="text" placeholder="Profession" value="<?=$item_img_prof;?>" />
<span id="title_inp" style="margin-top:25px;">Twitter:</span>
<input  id="Twitter" class="form-control form-nas" maxlength="200" type="text" placeholder="Twitter" value="<?=$item_img_twit;?>" />
<span id="title_inp" style="margin-top:25px;">Facebook:</span>
<input  id="Facebook" class="form-control form-nas" maxlength="200" type="text" placeholder="Facebook" value="<?=$item_img_fase;?>" />
<span id="title_inp" style="margin-top:25px;">Linkedin:</span>
<input  id="Instagram" class="form-control form-nas" maxlength="200" type="text" placeholder="linkedin" value="<?=$item_img_in;?>" />
<BR/><BR/>
<div class="input_sign inp_save" title="Save" onClick="itemimgsett(<?=$line1;?>), start_save()" >Save</div>
<div class="input_sign inp_save inp_bascs" style="margin-right:20px;" title="Back" onClick="content('/team', 'content_adm'), start()" >Back</div>
</div>
<!-- Section 1 -->
<?}else{?>

<!-- Section 1 -->
<div style="margin-top:0px;">
<div class="error" id="error_log" style="width:97%;"></div>
<div class="good" id="good_log"  style="width:97%;"></div><BR/>
<span id="title_inp">Title:</span>
<input  id="Title" class="form-control form-nas" maxlength="200" type="text" placeholder="Title" value="<?=$item_title;?>" />
<span id="title_inp" style="margin-top:25px;">Subtitle:</span>
<input  id="Subtitle" class="form-control form-nas" maxlength="200" type="text" placeholder="Subtitle" value="<?=$item_subtitle;?>" />
<span id="title_inp" style="margin-top:25px;">Text:</span><BR/>
<textarea id="itemtext" ><?=$item_text;?></textarea><BR/>
<BR/><BR/><div class="input_sign inp_save" title="Save" onClick="itemprojectsett(), start_save()" >Save</div>
</div>
<!-- Section 1 -->

<!-- Section 2 -->
<div style="margin-top:100px;">
<div class="block_img_about" id="item_content" style="text-align:center;">
<?
     for ($i=1; $i<=count($item_img)-1; $i++) {
	   $line = $i;
	   $item_img1 = explode ("*|*", $item_img[$i]);
	   $img = $item_img1[0];
?>
<div class="item_img" id="item_bl<?=$line;?>">
<div>
<div class="item_str_block">
<?if($line != 1){?>
<span class="str_item str_item_left" onClick="blocc_next_down('2', '<?=$line;?>');" ><i class="fa fa-arrow-left"></i></span>
<?}?>
<span class="item_preload" id="item_preload<?=$line;?>"></span>
<?if($line != (count($item_img)-1)){?>
<span class="str_item str_item_right" onClick="blocc_next_down('1', '<?=$line;?>');" ><i class="fa fa-arrow-right"></i></span>
<?}?>
</div>
<div title="To delete a project" class="unins" onClick="vopros_uns('item_uninsproject(<?=$line;?>), vopros_uns_close(), start()');"><i class="fa fa-remove"></i></div>
<div class="about-item_sett_sta" onClick="content('/itemget<?=$line;?>', 'content_adm'), start()" ><div class="item_icon_sett"><i class="fa fa-pencil-square-o"></i></div></div>
<img class="img_about" src="img/team/<?=$img;?>" alt="">
</div>
</div>
<?}?>
</div>
</div>

<BR/><BR/><BR/>
<div class="input_sign inp_save" title="Add item" style="float:none; width:97.5%;
<?if(count($item_img)-1 >= 5){ echo "background:#DDD; border:none; cursor:default;";}?>" <?if(count($item_img)-1 < 5){?>onClick="item_addproject(<?=count($item_img);?>), start()"<?}?> >
<?if(count($item_img)-1 >= 5){ echo "Maximum team members";}else{?>Add team member<?}?></div>
<!-- Section 2 -->
<?}?>
</div>
</center>