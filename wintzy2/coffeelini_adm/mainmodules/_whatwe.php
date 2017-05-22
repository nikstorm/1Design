<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################


  $whatwe = file("coffeelini_adm/db/icons.db");
      $introduction = file("coffeelini_adm/db/introduction.db");
    $introduction1 = explode ("*|*", $introduction[1]);
	  $Maintitle = $introduction1[0];
	  $Mainsubtitle = $introduction1[1];
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
	$name_modul = file("coffeelini_adm/db/name_modul.db");
	$name_modul1 = explode ("*|*", $name_modul[1]);
	$modul1 = $Maintitle;
    $modul2 = $name_modul1[1];	
    $modul3 = $name_modul1[2];	
	$modul4 = $name_modul1[3];
	$modul5 = $name_modul1[4];
?>


<span id="text"><?=$modul1;?> <span>Edit the three items with icons you see under the header. </span></span>
<div class="menu_adm_block_a_line"></div>
<div class="pod_zagol"><i class="fa fa-list"></i> <span onClick="content('/header', 'content_adm')">Main modules</span> &nbsp;/&nbsp;&nbsp;<?=$modul1;?></div>
<center>
<div style="text-align:left;width:70%;min-width:600px;">

<!-- Section 1 -->
<div style="margin-top:0px;">
<div class="error" id="error_log" style="width:97%;"></div>
<div class="good" id="good_log"  style="width:97%;"></div><BR/>
<span id="title_inp">Main title:</span>
<input  id="Maintitle" class="form-control form-nas" maxlength="200" type="text" placeholder="Main title" value="<?=$Maintitle;?>" />
<span id="title_inp" style="margin-top:25px;">Main subtitle:</span>
<input  id="Mainsubtitle" class="form-control form-nas" maxlength="200" type="text" placeholder="Main subtitle" value="<?=$Mainsubtitle;?>" />
<BR/><BR/><div class="input_sign inp_save" title="Save" onClick="introduction_item(1), introduction_item(2), introduction_item(3), introtitle(), start_save()" >Save</div>
</div>
<!-- Section 1 -->

<!-- Section 2 -->
<div style="margin-top:70px;">
<div class="error" id="error_log1" style="width:97%;"></div>
<div class="good" id="good_log1"  style="width:97%;"></div><BR/>
<span id="text" style="font-size:25px;">Item 1</span>
<table width="100%">
<tr>
<td width="70px" style="text-align:center;">
<div class="podnat_ico">
<span id="title_inp" >Icon</span>
<div id="item_ico1" class="item_ico">
<i class="<?=$ico_item1;?>"></i>
</div>
<input  id="ico_item1" type="hidden" value="<?=$ico_item1;?>" />
</div>
</td>
<td>
<div class="item_ico1">
<span id="title_inp">New icon:</span>
<div class="vnutri_blok_rec_head">
<?
     for ($i=1; $i<=722; $i++) {
	 $dat = explode ("*|*", $whatwe[$i]);
	 $icon = $dat[0];
?>
<div onClick="item_ico_vib('<?=$icon;?>', '1')" class="icon_vibor"  ><i class="<?=$icon;?>"></i></div>
<?}?>
</div>
</div>
</td>
</tr>
</table>
<span id="title_inp" style="margin-top:25px;">Title item:</span>
<input  id="Titleitem1" class="form-control form-nas" maxlength="200" type="text" placeholder="Title item" value="<?=$Titleitem1;?>" />
<span id="title_inp" style="margin-top:25px;">Text item:</span>
<textarea id="Textitem1" ><?=$Textitem1;?></textarea>
<BR/><BR/><div class="input_sign inp_save" title="Save" onClick="introtitle(), introduction_item(1), introduction_item(2), introduction_item(3), start_save()" >Save</div>
</div>
<!-- Section 2 -->

<!-- Section 2 -->
<div style="margin-top:70px;">
<div class="error" id="error_log2" style="width:97%;"></div>
<div class="good" id="good_log2"  style="width:97%;"></div><BR/>
<span id="text" style="font-size:25px;">Item 2</span>
<table width="100%">
<tr><td width="70px" style="text-align:center;">
<div class="podnat_ico">
<span id="title_inp">Icon</span>
<div id="item_ico2" class="item_ico">
<i class="<?=$ico_item2;?>"></i>
</div>
<input  id="ico_item2" type="hidden" value="<?=$ico_item2;?>" />
</div>
</td>
<td>
<div class="item_ico1">
<span id="title_inp">New icon:</span>
<div class="vnutri_blok_rec_head">
<?
     for ($i=1; $i<=722; $i++) {
	 $dat = explode ("*|*", $whatwe[$i]);
	 $icon = $dat[0];
?>
<div onClick="item_ico_vib('<?=$icon;?>', '2')" class="icon_vibor"  ><i class="<?=$icon;?>"></i></div>
<?}?>
</div>
</div>
</td>
</tr>
</table>
<span id="title_inp" style="margin-top:25px;">Title item:</span>
<input  id="Titleitem2" class="form-control form-nas" maxlength="200" type="text" placeholder="Title item" value="<?=$Titleitem2;?>" />
<span id="title_inp" style="margin-top:25px;">Text item:</span>
<textarea id="Textitem2" ><?=$Textitem2;?></textarea>
<BR/><BR/><div class="input_sign inp_save" title="Save" onClick="introtitle(), introduction_item(1), introduction_item(2), introduction_item(3), start_save()" >Save</div>
</div>
<!-- Section 2 -->

<!-- Section 2 -->
<div style="margin-top:70px;">
<div class="error" id="error_log3" style="width:97%;"></div>
<div class="good" id="good_log3"  style="width:97%;"></div><BR/>
<span id="text" style="font-size:25px;">Item 3</span>
<table width="100%">
<tr><td width="70px" style="text-align:center;">
<div class="podnat_ico">
<span id="title_inp">Icon</span>
<div id="item_ico3" class="item_ico">
<i class="<?=$ico_item3;?>"></i>
</div>
<input  id="ico_item3" type="hidden" value="<?=$ico_item3;?>" />
</div>
</td>
<td>
<div class="item_ico1">
<span id="title_inp">New icon:</span>
<div class="vnutri_blok_rec_head">
<?
     for ($i=1; $i<=722; $i++) {
	 $dat = explode ("*|*", $whatwe[$i]);
	 $icon = $dat[0];
?>
<div onClick="item_ico_vib('<?=$icon;?>', '3')" class="icon_vibor"  ><i class="<?=$icon;?>"></i></div>
<?}?>
</div>
</div>
</td>
</tr>
</table>
<span id="title_inp" style="margin-top:25px;">Title item:</span>
<input  id="Titleitem3" class="form-control form-nas" maxlength="200" type="text" placeholder="Title item" value="<?=$Titleitem3;?>" />
<span id="title_inp" style="margin-top:25px;">Text item:</span>
<textarea id="Textitem3" ><?=$Textitem3;?></textarea>
<BR/><BR/><div class="input_sign inp_save" title="Save" onClick="introtitle(), introduction_item(1), introduction_item(2), introduction_item(3), start_save()" >Save</div>
</div>
<!-- Section 2 -->
</div>
</center>