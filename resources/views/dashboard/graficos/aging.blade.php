<div id="aging_chart" style="min-width: 400px; height: 600px"></div>

@section('javascript_aging')
<!-- aging -->
<script type="text/javascript">

		var metaAging = [39,39,39,35,35,35,31,31,28,28,25,25];

		function getAging()
		{
			var r = new XMLHttpRequest();
			
			r.open("GET", "api/get-aging", true);
			r.onreadystatechange = function () {
			  if (r.readyState != 4 || r.status != 200) return;
			  	var meta = metaAging[0];
			  	var data =  JSON.parse(r.response);
			  	var categorias = [];
			  	var agings = [];
			  	var metas = [];
			  	var ano_mes = null;
			  	var mes = 0;

			  	for(var k in data)
			  	{
			  		categorias.push(data[k].ano_mes);
			  		agings.push(parseInt(data[k].aging));
			  		ano_mes = data[k].ano_mes;
			  		mes = parseInt(ano_mes.substr(5,2))-1;
			  		metas.push(metaAging[mes]);
			  	}

				geraAgingChar(categorias, agings, metas);
				
			};

			r.send();
		}

		function geraAgingChar(categorias, agings, metas){
			$('#aging_chart').highcharts({
				        chart: {
				            type: 'column'
				        },
				        title:{text:'Aging'},

				        yAxis: {
				           	visible: false
				        },

				        xAxis:{
				        	categories: categorias
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
				                pointPadding: 0.0,
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
				            name: 'Aging',
				            data: agings
				        }, {
				            name: 'Meta',
				            data: metas
				        }]
				    });
		}

		getAging();
	</script>
	
@stop