<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################
      $portfolio = file("coffeelini_adm/db/portfolio.db");
       $portfolio1 = explode ("*|*", $portfolio[1]);
	  $portfolio_title = $portfolio1[0];
	  $portfolio_subtitle = $portfolio1[1];
	  $portfolio_button_text = $portfolio1[2];
	  $portfolio_img = file("coffeelini_adm/db/portfolio_img.db");
	  	  	    $name_modul = file("coffeelini_adm/db/name_modul.db");
	$name_modul1 = explode ("*|*", $name_modul[1]);
	$modul1 = $name_modul1[0];
    $modul2 = $portfolio_title;	
    $modul3 = $name_modul1[2];	
	$modul4 = $name_modul1[3];
	$modul5 = $name_modul1[4];
	  
?>
<span id="text"><?=$modul2;?> <span>Add and edit photos and their descriptions and titles</span></span>
<div class="menu_adm_block_a_line"></div>
<div class="pod_zagol"><i class="fa fa-list"></i> <span onClick="content('/header', 'content_adm')">Main modules</span> &nbsp;/&nbsp;&nbsp;<?=$modul2;?></div>
<center>
<div style="text-align:left;width:70%;min-width:730px;">
<!-- Section 1 -->
<div style="margin-top:40px;">
<div class="error" id="error_log" style="width:97%;"></div>
<div class="good" id="good_log"  style="width:97%;"></div><BR/>
<span id="title_inp">Title:</span>
<input  id="Title" class="form-control form-nas" maxlength="200" type="text" placeholder="Title" value="<?=$portfolio_title;?>" />
<span id="title_inp" style="margin-top:25px;">Subtitle:</span>
<input  id="Subtitle" class="form-control form-nas" maxlength="200" type="text" placeholder="Subtitle" value="<?=$portfolio_subtitle;?>" />
<span id="title_inp" style="margin-top:20px;">Inner Button text:</span>
<input  id="Innerbuttontext" class="form-control form-nas" maxlength="200" type="text" placeholder="Button text" value="<?=$portfolio_button_text;?>" />
<BR/><BR/><div class="input_sign inp_save" title="Save" onClick="portfolio_img_title('<?=count($portfolio_img)-1;?>', '<?=count($portfolio_img)-1;?>'), portfoliotitle(), start_save()" >Save</div>
</div>
<!-- Section 1 -->
<div style="margin-top:70px; position:relative; margin-right:-30px; margin-left:-2px;">
<div class="bll_porf" id="bll_porf" >
<?
     for ($i=1; $i<=count($portfolio_img)-1; $i++) {
	   $line = $i;
	   $portfolio_img1 = explode ("*|*", $portfolio_img[$i]);
	 $portfolio_img_title = $portfolio_img1[0];
	 $portfolio_img_subtitle = $portfolio_img1[1];
	 $portfolio_Inner_title = $portfolio_img1[2];
	 $portfolio_Inner_subtitle = $portfolio_img1[3];
	 $portfolio_Inner_text = $portfolio_img1[4];
	 $portfolio_Img_Big = $portfolio_img1[6];
	 $portfolio_Img_Small = $portfolio_img1[7];
?>
              <div class="portfolio-item" id="portfolio-item<?=$line;?>" >
<div class="item_str_block" style="margin-left:70px;" >
<?if($line != 1){?>
<span class="str_item str_item_left" onClick="portfo_next_down('2', '<?=$line;?>');" ><i class="fa fa-arrow-left"></i></span>
<?}?>
<span class="item_preload" id="item_preload<?=$line;?>"></span>
<?if($line != (count($portfolio_img)-1)){?>
<span class="str_item str_item_right" onClick="portfo_next_down('1', '<?=$line;?>');" ><i class="fa fa-arrow-right"></i></span>
<?}?>
</div>
			     <div class="error good_portfo" id="error_log<?=$line;?>"></div>
                 <div class="good good_portfo" id="good_log<?=$line;?>"></div>
				 <div title="To delete a project" class="unins" onClick="vopros_uns('portfo_uninsproject(<?=$line;?>), vopros_uns_close(), start()');"><i class="fa fa-remove"></i></div>
			     <div class="portfolio-item_sett_sta" onClick="content('/portfolioget<?=$line;?>', 'content_adm'), start()" ><div class="icon_sett"><i class="fa fa-pencil-square-o"></i></div></div>
                 <img src="img/portfolio/<?=$portfolio_Img_Small;?>" class="img-responsive" alt="">
                <div class="portfolio_img_title_post">
				<input  style="margin-top:10px;" id="img_title<?=$line;?>" class="form-control form-nas" maxlength="200" type="text" placeholder="External title" value="<?=$portfolio_img_title;?>" />
				<input  style="margin-top:10px;" id="img_subtitle<?=$line;?>" class="form-control form-nas" maxlength="200" type="text" placeholder="External subtitle" value="<?=$portfolio_img_subtitle;?>" />
                <div class="input_sign inp_save" title="Save" style="margin-top:10px;float:none;width:96%;"onClick="portfoliotitle(), portfolio_img_title('<?=$line;?>', '<?=count($portfolio_img)-1;?>'), start_save()" >Save</div>
				</div>
               </div>
			   
<?}?>
</div>
</div>	
<BR/><BR/><BR/><BR/>
<div class="input_sign inp_save" title="Add image" style="float:none;width:97.5%;"onClick="portfo_addproject(<?=count($portfolio_img);?>), start()" >Add image</div>		   

<BR/><BR/><BR/><BR/>
</div>
</center>