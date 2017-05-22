<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################

     $data1 = file("coffeelini_adm/db/stats.db");
?>
<span id="text">Stats <span>Detailed statistics of your websit</span></span>
<div class="menu_adm_block_a_line"></div>
<div class="pod_zagol"><i class="fa fa-fw fa-table"></i> Stats</div>
<span id="text" style="font-size:25px;">Stats Table</span>
<table width="100%" cellpadding="0.5" cellspacing="0">
<tr>
<td class="stat_head">Date</td>
<td class="stat_head">New messages</td>
<td class="stat_head">New visitors</td>
<td class="stat_head">Overall visitors</td>
</tr>
<?
     for ($i=6; $i>=0; $i--) {
	 $dat = explode ("|", $data1[$i]);
	 $time = date("d.m.Y", $dat[3]);
	 $mes = $dat[0];
	 $visn = $dat[1];
	 $viss = $dat[2];
?>
<tr class="stat_tr">
<td class="stat_td"><?=$time;?></td>
<td class="stat_td"><?=$mes;?></td>
<td class="stat_td"><?=$visn;?></td>
<td class="stat_td"><?=$viss;?></td>
</tr>
<?}?>
<tr class="stat_tr">
<td class="stat_td"> </td>
<td class="stat_td"> </td>
<td class="stat_td"> </td>
<td class="stat_td"> </td>
</tr>
</table>