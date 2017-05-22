$(function () {
    $('#container').highcharts({
        chart: {
            type: 'area'
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
                lineWidth: 0.5,
                marker: { 
                    lineWidth: 0.5,
                    lineColor: '#666666'
                }
            }
        },
        series: [{
            name: 'New messages',
			color:'#337ab7',
            data: []
        }]
    });
});