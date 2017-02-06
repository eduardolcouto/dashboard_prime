<div class="panel panel-default">
		  <div class="panel-heading">Celula1 - Distribuição <span class="badge">{{count($celula1Distribuicao)}}</span></div>
			  <div class="panel-body">
				<div class="table-responsive">
					<table class="table table-condensed table-striped">
						<tr>
							<th>Chamado</th>
							<th class="hidden-xs hidden-sm">Sistema</th>
							<th class="hidden-xs hidden-sm">Cliente</th>
							<th>Status</th>
							<th>SLA Cont</th>
						</tr>
						@if(count($celula1Distribuicao) > 0)
							<script>
								 notificarSlaCont = true;
							</script>
						@endif
						@foreach($celula1Distribuicao as $sla)
							@if($sla->sla_cont_restante > 2)
								{{--*/ $btn = 'default'/*--}}
								{{--*/ $tableCell = 'success'/*--}}
							@elseif($sla->sla_cont_restante > 1)
								{{--*/ $btn = 'warning'/*--}}
								{{--*/ $tableCell = 'warning'/*--}}
							@elseif($sla->sla_cont_restante == null)
								{{--*/ $btn = 'default'/*--}}
								{{--*/ $tableCell = ''/*--}}
							@else
								{{--*/ $btn = 'danger'/*--}}
								{{--*/ $tableCell = 'danger'/*--}}
							@endif
							<tr>
								<td><a class="btn btn-{{$btn}} btn-sm" target="_blank" href="https://secure.softcomex.com.br/webcallcenter/tela_ctrl_suporte?cod_ativ={{$sla->chamado}}">{{$sla->chamado}}</a></td>
								<td class="hidden-xs hidden-sm">{{$sla->dsc_sistema}}</td>
								<td class="hidden-xs hidden-sm">{{$sla->nome_cliente}}</td>
								<td>{{$sla->dsc_status_atual}}</td>
								<td class="{{$tableCell}}">		
										{{$sla->sla_cont_restante}}
								</td>
							</tr>
						@endforeach
					</table>
				</div>	
			  </div>
		</div>