<div class="panel panel-default">
		  <div class="panel-heading">SLA Inicial perto de Estourar <span class="badge">{{count($slaIniEstourando)}}</span>	</div>
			  <div class="panel-body">
				<div class="table-responsive">
					<table class="table table-condensed table-striped">
						<tr>
							<th>Chamado</th>
							<th class="hidden-xs">Sistema</th>
							<th class="hidden-xs">Cliente</th>
							<th>Status</th>
							<th>Prioridade</th>
							<th class="hidden-xs">SLA Inicial Contratado</th>
							<th>SLA Inicial Atual</th>
						</tr>
						@if(count($slaIniEstourando) > 0)
							<script>
								 notificarSlaIni = true;
							</script>
						@endif
						@foreach($slaIniEstourando as $sla)
							@if($sla->sla_ini_restante > 2)
								{{--*/ $btn = 'default'/*--}}
								{{--*/ $tableCell = 'success'/*--}}
							@elseif($sla->sla_ini_restante > 1)
								{{--*/ $btn = 'warning'/*--}}
								{{--*/ $tableCell = 'warning'/*--}}
							@else
								{{--*/ $btn = 'danger'/*--}}
								{{--*/ $tableCell = 'danger'/*--}}
							@endif
							<tr>
							<td><a class="btn btn-{{$btn}} btn-sm" target="_blank" href="https://secure.softcomex.com.br/webcallcenter/tela_ctrl_chamado?cod_ativ={{$sla->chamado}}">{{$sla->chamado}}</a></td>
							<td class="hidden-xs">{{$sla->dsc_sistema}}</td>
							<td class="hidden-xs">{{$sla->nome_cliente}}</td>
							<td>{{$sla->dsc_status_atual}}</td>
							<td>{{$sla->dsc_prioridade_cliente}}</td>
							<td class="hidden-xs">{{$sla->sla_ini_contrato}}</td>
							<td class="{{$tableCell}}">		
								{{$sla->sla_ini_restante}}</td>
							</tr>
						@endforeach
					</table>
				</div>	
			  </div>
		</div>