
<div id="backlog_chart" style="min-width: 350px; height: 600px"></div>



@section('javascript_pesquisa')
	<!-- pesquisa -->

	<script type="text/javascript">

		function getPesquisa()
		{
			var r = new XMLHttpRequest();

			r.open("GET", "api/get-pesquisa-satisfacao", true);
			r.onreadystatechange = function () {
			  if (r.readyState != 4 || r.status != 200) return;
			  	var data = [];
			  	var resp = JSON.parse(r.response);

			  	for(k in resp)
			  	{
			  		data.push({name:resp[k].descricao_pesquisa, y:parseInt(resp[k].qtde_avaliacoes)});
			  	}
				geraPesquisaChart(data);	
			};

			r.send();
	
		}

		function geraPesquisaChart(data){

			$('#pesquisa_chart').highcharts({
				        chart: {
				            plotBackgroundColor: null,
			                plotBorderWidth: null,
			                plotShadow: false,
			                type: 'pie'
				        },
				        title:{text:'Pesquisa de Satisfação'},

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
				            pointFormat: '<tr><td style="color:{series.color}">{series.name}: {point.y}</td></tr>',
				            footerFormat: '</table>',
				            shared: true,
				            useHTML: true
				        },
				        plotOptions: {
				            pie: {
				                allowPointSelect: true,
			                    cursor: 'pointer',
			                    dataLabels: {
			                        enabled: true,
			                        format: '{point.y}',
			                    },
			                    showInLegend: true
				            },
				            
				        },
				        series: [{
				            name: 'Pesquisa',
				            data: data
				        }]
				    });
		}


		getPesquisa();

		
	</script>
@endsection