$(function () {
    loadChart($('.chart-mw-kd'));
    loadChart($('.chart-sg-kd'));
    loadChart($('.chart-sw-kd'));
    loadChart($('.chart-ws-kd'));

    loadGraph($('.graph-mw-coins'))
    loadGraph($('.graph-sw-coins'))
    loadGraph($('.graph-sg-coins'))
});
function loadChart(selector) {
    selector.highcharts({
        chart: {
            type: 'pie',
        },
        title: {
            text: ''
        },
        exporting: {enabled: false},
        credits: {
            enabled: false
        },
        plotOptions: {
            pie: {
                allowPointSelect: false,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '<b>{point.total}</b>'
                },
            }
        },

        series: [{
            type: 'pie',
            innerSize: '85%',
            data: [
                {name: 'Kills', y: 44, color: '#5FBEAA'},
                {name: 'Deaths', y: 55, color: '#EBEFF2'},
            ]
        }]
    });
}
function loadGraph(selector) {
    selector.highcharts({
        chart: {
            type: 'area',
        },
        exporting: {
            enabled: false
        },
        title: {
            text: ''
        },
        legend: {
            enabled: false,
        },
        xAxis: {
            categories: ['12-12-2016', '13-12-2016', '14-12-2016', '15-12-2016', '16-12-2016', '17-12-2016', '18-12-2016', '19-12-2016'],
            visible: false,
            min: 0.5,
            max: 5.5,
            labels: {
                enabled: false
            },
            title: {
                enabled: false
            },

        },
        yAxis: {
            gridLineColor: 'transparent',
            gridLineWidth: 0,
            lineColor: 'transparent',
            lineWidth: 0,
            labels: {
                enabled: false
            },
            title: {
                enabled: false
            },
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.y + '</b> ' + this.series.name + ' <br><b>on: </b>' + this.x;
            }
        },
        plotOptions: {
            area: {
                fillOpacity: 0.5
            },
            series: {
                marker: {
                    enabled: false
                },
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Kills',
            data: [0, 23, 26, 24, 25, 32, 30, 42,19],
            color: '#C5E7F4',
            borderColor: '#90D1E9'

        }, {
            name: 'Deaths',
            data: [25, 23, 43, 35, 44, 45, 56, 37,40],
            color: '#B3E8E2',
            borderColor: '#3EC4B5'
        }]
    });
}
