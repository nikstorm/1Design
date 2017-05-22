<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################
$about_img = file("coffeelini_adm/db/about_img.db");
if(isset($_POST["downn"])){
    $li = $_POST["id"];
	$down = $_POST["downn"];
	$kol = count($about_img)-1;
	if($down == 2){$do = 0;}else{$do = $down;}
    if(($li - $down) >= 0 and ($li + $do) <= $kol){
	if($down == 2){ $lin1=$li; $lin2=$li+1; $line1=$li; $line2 = $line1 - 1;}
	else 
	if($down == 1){ $lin1=$li+2; $lin2=$li+1; $line1=$li; $line2 = $line1 + 1;}

    //    
	$line1_about_img1 = explode ("*|*", $about_img[$line1]);
	$line1_about_img_title = $line1_about_img1[0];
	$line1_about_img_subtitle = $line1_about_img1[1];
	$line1_about_img_text = $line1_about_img1[2];
	$line1_about_img_img = $line1_about_img1[3];
	
	$replace1 = "$line1_about_img_title*|*$line1_about_img_subtitle*|*$line1_about_img_text*|*$line1_about_img_img*|*"; # на что
	//
		//
	$line2_about_img1 = explode ("*|*", $about_img[$line2]);
	$line2_about_img_title = $line2_about_img1[0];
	$line2_about_img_subtitle = $line2_about_img1[1];
	$line2_about_img_text = $line2_about_img1[2];
	$line2_about_img_img = $line2_about_img1[3];
	$replace2 = "$line2_about_img_title*|*$line2_about_img_subtitle*|*$line2_about_img_text*|*$line2_about_img_img*|*"; # на что
	//
	$db=fopen("coffeelini_adm/db/about_img.db","w"); 
   for($i=0;$i<count($about_img);$i++) 
   { 
      if(($i+1)==$lin1){fwrite($db,$replace1."\n");} 
      else 
	  if(($i+1)==$lin2){fwrite($db,$replace2."\n");}
	  else
	  {fwrite($db,$about_img[$i]);} 
   }
   fclose($db);
   echo "1";
   return;
  }else echo "error";
  
  return;
}
?>

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