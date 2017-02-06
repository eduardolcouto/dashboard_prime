<div class="panel panel-default">
	<div class="panel-heading">Metas</div>
	<div class="panel-body">
		<!--<canvas id="myChart" height="300"></canvas>-->
		

		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >


		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		    <div class="item active">
		      <div id="backlog" style="min-width: 310px; height: 600px; margin: 0 auto">
		        @include('dashboard.graficos.backlog')
		      	
		      </div>
		    </div>
		    <div class="item">
		      <div id="aging" style="min-width: 310px; height: 600px; margin: 0 auto">
		      	@include('dashboard.graficos.aging')
		      </div>
		    </div>
		     <div class="item">
		      <div id="pesquisa_chart" style="min-width: 350px; height: 600px; margin: 0 auto">
		        @include('dashboard.graficos.pesquisa')
		      </div>
		    </div>
		    

		 </div>

	</div><!-- corrosel -->

	</div>
</div>

@section('javascript')

	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script>
		$('.carousel').carousel({
  			interval: 10000
		});
	</script>

@endsection