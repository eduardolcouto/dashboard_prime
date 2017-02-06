<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-default">
  <div class="panel-heading">
  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEmSuporte" aria-expanded="true" aria-controls="collapseEmSuporte">
  <span class="glyphicon glyphicon-triangle-bottom"></span>
  Em Suporte <span class="badge">{{count($emSuporte)}}</span>
  </a>
  </div>
  	<div id="collapseEmSuporte" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
	  <div class="panel-body">
		<div class="table-responsive">
			<table class="table table-condensed table-striped">
				<tr>
					<th>Chamado</th>
					<th>Sistema</th>
					<th>Cliente</th>						
					<th>Analista</th>
					<th>Dt Chamado</th>
				</tr>
				@foreach($emSuporte as $chamado)
					<tr>
						<td><a class="btn btn-default btn-sm" target="_blank" href="https://secure.softcomex.com.br/webcallcenter/tela_ctrl_suporte?cod_ativ={{$chamado->chamado}}">{{$chamado->chamado}}</a></td>
						<td><span >{{$chamado->dsc_sistema}}</span></td>
						<td><span >{{$chamado->nome_cliente}}</span></td>
						<td>{{$chamado->dsc_analista_suporte}}</td>
						<td>{{$chamado->dt_cad_chamado}}</td>
					</tr>
				@endforeach
			</table>
		</div>	
	  </div>
	</div><!-- #collapseEmSuporte-->
</div>
</div>