@extends('dashboard.template')

@section('content')	

<div class="row">
	<div class="col-sm-12"> <!-- Exibie SLAs iniciais perto de estourar -->
		<div class="panel panel-default">
		  <div class="panel-heading">Chamados BMW <span class="badge">{{count($chamadosBmw)}}</span>	</div>
			  <div class="panel-body">
				<div class="table-responsive">
					<table class="table table-condensed table-striped">
						<tr>
							<th>Chamado</th>
							<th>Ref Cliente</th>
							<th>Tipo</th>
							<th >Sistema</th>
							<th >Titulo</th>
							<!--<th >Analista</th>-->
							<th>Status</th>
							<th>Dt Abertura</th>
							<th >SLA Inicial</th>
							<th >SLA Contingencia</th>
						</tr>
						@foreach($chamadosBmw as $chamado)
							<tr>
							<td><a class="btn btn-default btn-sm" target="_blank" href="https://secure.softcomex.com.br/webcallcenter/tela_ctrl_suporte?cod_ativ={{$chamado->chamado}}">{{$chamado->chamado}}</a></td>
							<td>{{$chamado->ref_cliente}}</td>
							<td >{{$chamado->dsc_tipo}}</td>
							<td>{{$chamado->dsc_sistema}}</td>
							<td>{{$chamado->titulo_atividade}}</td>
							<!--<td>{{$chamado->dsc_analista_suporte}}</td>-->
							<td >{{$chamado->dsc_status_atual}}</td>
							<td >{{$chamado->dt_cad_chamado}}</td>
							<td >{{$chamado->sla_ini_restante}}</td>
							<td >{{$chamado->sla_cont_restante}}</td>
							</tr>
						@endforeach
					</table>
				</div>	
			  </div>
		</div>
	</div>
</div>

@endsection	