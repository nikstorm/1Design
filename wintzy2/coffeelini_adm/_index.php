
<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################

    $data1 = file("coffeelini_adm/db/stats.db");
    $dat = explode ("|", $data1[0]);
	$dat1 = explode ("|", $data1[1]);
	$dat2 = explode ("|", $data1[2]);
	$dat3 = explode ("|", $data1[3]);
	$dat4 = explode ("|", $data1[4]);
	$dat5 = explode ("|", $data1[5]);
	$dat6 = explode ("|", $data1[6]);
	$time = date("Y, m, d", $dat[3]);
	$time1 = date("Y, m, d", $dat1[3]);
	$time2 = date("Y, m, d", $dat2[3]);
	$time3 = date("Y, m, d", $dat3[3]);
	$time4 = date("Y, m, d", $dat4[3]);
	$time5 = date("Y, m, d", $dat5[3]);
	$time6 = date("Y, m, d", $dat6[3]);
	$mes = $dat[0];
	$mes1 = $dat1[0];
	$mes2 = $dat2[0];
	$mes3 = $dat3[0];
	$mes4 = $dat4[0];
	$mes5 = $dat5[0];
	$mes6 = $dat6[0];
	$visn = $dat[1];
	$visn1 = $dat1[1];
	$visn2 = $dat2[1];
	$visn3 = $dat3[1];
	$visn4 = $dat4[1];
	$visn5 = $dat5[1];
	$visn6 = $dat6[1];
$dat1 = "[Date.UTC($time), $mes], [Date.UTC($time1), $mes1], [Date.UTC($time2), $mes2], [Date.UTC($time3), $mes3], [Date.UTC($time4), $mes4], [Date.UTC($time5), $mes5], [Date.UTC($time6), $mes6] ";
$dat2 = "[Date.UTC($time), $visn], [Date.UTC($time1), $visn1], [Date.UTC($time2), $visn2], [Date.UTC($time3), $visn3], [Date.UTC($time4), $visn4], [Date.UTC($time5), $visn5], [Date.UTC($time6), $visn6] ";
?>

<span id="text">Dashboard <span> Here you can see some statistic parameters of your website</span></span>
<div class="menu_adm_block_a_line"></div>
<div class="pod_zagol"><i class="fa fa-fw fa-dashboard"></i> Dashboard</div>
<div class="dash_blok_stat" >
<div class="dash_blok_vn dash_blok_vn1">
<div class="dash_blok_vn_st dash_blok_vn_st1">
<i class="dash_blok_ico fa fa-comments fa-5x"></i>
<div class="dash_blok_vn_text"><div><?=$mes6;?><div>New messages</div></div></div>
</div>
<div class="dash_blok_vn_st">
<div class="dash_blok_vn_pod dash_blok_vn_pod1" onClick="content('/stats', 'content_adm'), start()">View Details <span><i class="fa fa-arrow-circle-right"></i></span></div>
</div>
</div>
<div class="dash_blok_vn dash_blok_vn2">
<div class="dash_blok_vn_st dash_blok_vn_st2">
<i class="dash_blok_ico fa fa-tasks fa-5x"></i>
<div class="dash_blok_vn_text"><div><?=$visn6;?><div>New visitors</div></div></div>
</div>
<div class="dash_blok_vn_st">
<div class="dash_blok_vn_pod dash_blok_vn_pod2" onClick="content('/stats', 'content_adm'), start()">View Details <span><i class="fa fa-arrow-circle-right"></i></span></div>
</div>
</div>
<div class="dash_blok_vn dash_blok_vn3">
<div class="dash_blok_vn_st dash_blok_vn_st3">
<i class="dash_blok_ico fa fa-tasks fa-5x"></i>
<div class="dash_blok_vn_text"><div><?=$dat6[2];?><div>Overall visitors</div></div></div>
</div>
<div class="dash_blok_vn_st">
<div class="dash_blok_vn_pod dash_blok_vn_pod3" onClick="content('/stats', 'content_adm'), start()">View Details <span><i class="fa fa-arrow-circle-right"></i></span></div>
</div>
</div>
</div>

<script type="text/javascript" src="/coffeelini_adm/js/highcharts.js"></script>

<div class="charts">
<div class="charts_head" ><i class="fa fa-bar-chart-o fa-fw"></i>  Area Chart</div>
<div id="container" style="min-width: 10px; height: 400px; margin:5px;"></div>
</div>
<script>

$(function () {
    $('#container').highcharts({
        chart: {
            type: 'areaspline'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
       xAxis: {
            type: 'datetime',
            allowDecimals: false,
			maxPadding: 0,
			minPadding: 0
        },
        yAxis: {
		    maxPadding: 0.2,
            title: false,
            labels: {
                formatter: function () {
                    return this.value / 1;
                }
            }
        },

        plotOptions: {
            area: {
                stacking: 'normal',
                lineColor: '#666666',
                lineWidth: 1,
                marker: { 
                  radius: 3
                }
            }
        },
        series: [{
		    name: 'New visitors',
			color:'#5cb85c',
            data: [<?=$dat2;?>]
        }, {
            name: 'New messages',
			color:'#337ab7',
            data: [<?=$dat1;?>]
        }]
    });
});

</script>