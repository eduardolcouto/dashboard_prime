<div class="panel panel-default">
		  <div class="panel-heading">SLA Contigencia perto de Estourar <span class="badge">{{count($slaContEstourando)}}</span></div>
			  <div class="panel-body">
				<div class="table-responsive">
					<table class="table table-condensed table-striped">
						<tr>
							<th>Chamado</th>
							<th class="hidden-xs hidden-sm">Sistema</th>
							<th class="hidden-xs hidden-sm">Cliente</th>
							<th>Status</th>
							<th>Prioridade</th>
							<th>SLA Cont Atual</th>
						</tr>
						@if(count($slaContEstourando) > 0)
							<script>
								 notificarSlaCont = true;
							</script>
						@endif
						@foreach($slaContEstourando as $sla)
							@if($sla->sla_cont_restante > 2)
								{{--*/ $btn = 'default'/*--}}
								{{--*/ $tableCell = 'success'/*--}}
							@elseif($sla->sla_cont_restante > 1)
								{{--*/ $btn = 'warning'/*--}}
								{{--*/ $tableCell = 'warning'/*--}}
							@else
								{{--*/ $btn = 'danger'/*--}}
								{{--*/ $tableCell = 'danger'/*--}}
							@endif
							<tr>
								<td><a class="btn btn-{{$btn}} btn-sm" target="_blank" href="https://secure.softcomex.com.br/webcallcenter/tela_ctrl_suporte?cod_ativ={{$sla->chamado}}">{{$sla->chamado}}</a></td>
								<td class="hidden-xs hidden-sm">{{$sla->dsc_sistema}}</td>
								<td class="hidden-xs hidden-sm">{{$sla->nome_cliente}}</td>
								<td>{{$sla->dsc_status_atual}}</td>
								<td>{{$sla->dsc_prioridade_cliente}}</td>
								<td class="{{$tableCell}}">		
										{{$sla->sla_cont_restante}}
								</td>
							</tr>
						@endforeach
					</table>
				</div>	
			  </div>
		</div>