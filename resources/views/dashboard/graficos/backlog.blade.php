
<div id="backlog_chart" style="min-width: 450px; height: 600px"></div>



@section('javascript_backlog')
	<!-- backlog -->

	<script type="text/javascript">
		var metaBackLog = [0,40,34,29,25,21,20,20,2,20,20,20];
		function getTotalBacklog()
		{
			var r = new XMLHttpRequest();
			var data = new Date();

			r.open("GET", "api/get-total-backlog", true);
			r.onreadystatechange = function () {
			  if (r.readyState != 4 || r.status != 200) return;
			  	var meta = metaBackLog[data.getMonth()];
				geraCharBar(parseInt(r.responseText), meta);	
			};

			r.send();
		}

		function geraCharBar(atual, meta){
			$('#backlog_chart').highcharts({
				        chart: {
				            type: 'column'
				        },
				        title:{text:'BackLog'},

				        yAxis: {
				           	visible: false
				        },

				        xAxis:{
				        	visible: false
				        },

				        legend: {
				            enabled: true
				        },

				        tooltip: {
				            pointFormat: '<tr><td style="color:{series.color}">{series.name}: {point.y} chamados</td></tr>',
				            footerFormat: '</table>',
				            shared: true,
				            useHTML: true
				        },
				        plotOptions: {
				            column: {
				                pointPadding: 0.05,
				                borderWidth: 0
				            },
				            series: {
				                borderWidth: 0,
				                dataLabels: {
				                    enabled: true,
				                    format: '{point.y}'
				                }
				            }
				        },
				        series: [{
				            name: 'Atual',
				            data: [atual]

				        }, {
				            name: 'Meta',
				            data: [meta]

				        }]
				    });
		}


		getTotalBacklog();

		
	</script>
@endsection