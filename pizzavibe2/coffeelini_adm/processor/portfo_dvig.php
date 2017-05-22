<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################
$portfolio_img = file("coffeelini_adm/db/portfolio_img.db");
if(isset($_POST["downn"])){
    $li = $_POST["id"];
	$down = $_POST["downn"];
	$kol = count($portfolio_img)-1;
	if($down == 2){$do = 0;}else{$do = $down;}
    if(($li - $down) >= 0 and ($li + $do) <= $kol){
	if($down == 2){ $lin1=$li; $lin2=$li+1; $line1=$li; $line2 = $line1 - 1;}
	else 
	if($down == 1){ $lin1=$li+2; $lin2=$li+1; $line1=$li; $line2 = $line1 + 1;}

    //    
	$line1_portfolio_img1 = explode ("*|*", $portfolio_img[$line1]);
	$line1_title = $line1_portfolio_img1[0];
	$line1_subtitle = $line1_portfolio_img1[1];
	$line1_portfolio_Inner_title = $line1_portfolio_img1[2];
	$line1_portfolio_Inner_subtitle = $line1_portfolio_img1[3];
	$line1_portfolio_Inner_text = $line1_portfolio_img1[4];
	$line1_portfolio_button_text = $line1_portfolio_img1[5];
	$line1_portfolio_Img_Big = $line1_portfolio_img1[6];
	$line1_portfolio_Img_Small = $line1_portfolio_img1[7];
	$line1_standtitl = $line1_portfolio_img1[8];
	
	$replace1 = "$line1_title*|*$line1_subtitle*|*$line1_portfolio_Inner_title*|*$line1_portfolio_Inner_subtitle*|*$line1_portfolio_Inner_text*|*$line1_portfolio_button_text*|*$line1_portfolio_Img_Big*|*$line1_portfolio_Img_Small*|*$line1_standtitl*|*"; # на что
	//
		//
	$line2_portfolio_img1 = explode ("*|*", $portfolio_img[$line2]);
	$line2_title = $line2_portfolio_img1[0];
	$line2_subtitle = $line2_portfolio_img1[1];
	$line2_portfolio_Inner_title = $line2_portfolio_img1[2];
	$line2_portfolio_Inner_subtitle = $line2_portfolio_img1[3];
	$line2_portfolio_Inner_text = $line2_portfolio_img1[4];
	$line2_portfolio_button_text = $line2_portfolio_img1[5];
	$line2_portfolio_Img_Big = $line2_portfolio_img1[6];
	$line2_portfolio_Img_Small = $line2_portfolio_img1[7];
	$line2_standtitl = $line2_portfolio_img1[8];
	$replace2 = "$line2_title*|*$line2_subtitle*|*$line2_portfolio_Inner_title*|*$line2_portfolio_Inner_subtitle*|*$line2_portfolio_Inner_text*|*$line2_portfolio_button_text*|*$line2_portfolio_Img_Big*|*$line2_portfolio_Img_Small*|*$line2_standtitl*|*"; # на что
	//
	$db=fopen("coffeelini_adm/db/portfolio_img.db","w"); 
   for($i=0;$i<count($portfolio_img);$i++) 
   { 
      if(($i+1)==$lin1){fwrite($db,$replace1."\n");} 
      else 
	  if(($i+1)==$lin2){fwrite($db,$replace2."\n");}
	  else
	  {fwrite($db,$portfolio_img[$i]);} 
   }
   fclose($db);
   echo "1";
   return;
  }else echo "error";
  
  return;
}
?>

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
                <div class="input_sign inp_save" title="Save" style="margin-top:10px;float:none;width:96%;"onClick="portfolio_img_title('<?=$line;?>'), start_save()" >Save</div>
				</div>
               </div>
			   
<?}?>




