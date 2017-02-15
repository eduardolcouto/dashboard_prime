<div class="panel panel-default">
		  <div class="panel-heading">SER - Ewerton Dario <span class="badge">{{count($celulaCstEwerton)}}</span>	</div>
			  <div class="panel-body">
				<div class="table-responsive">
					<table class="table table-condensed table-striped">
						<tr>
							<th>Incidente</th>
							<th class="hidden-xs">Sistema</th>
							<th class="hidden-xs">Cliente</th>
							<th class="hidden-xs">Status</th>
							<th>SLA Ini</th>
							<th>SLA Cont</th>
						</tr>
						@if(count($celulaCstEwerton) > 0)
							<script>
								 notificarSlaIni = true;
							</script>
						@endif
						@foreach($celulaCstEwerton as $sla)
							@if($sla->sla_ini_restante > 2)
								{{--*/ $btn = 'default'/*--}}
								{{--*/ $tableCell = 'success'/*--}}
							@elseif($sla->sla_ini_restante > 1)
								{{--*/ $btn = 'warning'/*--}}
								{{--*/ $tableCell = 'warning'/*--}}
							@elseif($sla->sla_ini_restante == null)
								{{--*/ $btn = 'default'/*--}}
								{{--*/ $tableCell = ''/*--}}
							@else
								{{--*/ $btn = 'danger'/*--}}
								{{--*/ $tableCell = 'danger'/*--}}
							@endif
							@if($sla->sla_cont_restante > 2)
									{{--*/ $tableCellCont = 'success'/*--}}
								@elseif($sla->sla_cont_restante > 1)
									{{--*/ $tableCellCont = 'warning'/*--}}
								@elseif($sla->sla_cont_restante == null)
									{{--*/ $tableCellCont = ''/*--}}
								@else
									{{--*/ $tableCellCont = 'danger'/*--}}
								@endif
							<tr>
							<td><a class="btn btn-{{$btn}} btn-sm" target="_blank" href="https://secure.softcomex.com.br/webcallcenter/tela_ctrl_chamado?cod_ativ={{$sla->chamado}}">{{$sla->chamado}}</a></td>
							<td class="">{{$sla->dsc_sistema}}</td>
							<td class="">{{$sla->nome_cliente}}</td>
							<td>{{$sla->dsc_status_atual}}</td>
							<td class="{{$tableCell}}">
								{{$sla->sla_ini_restante}}</td>
							<td class="{{$tableCellCont}}">
								{{$sla->sla_cont_restante}}</td>
							</tr>
						@endforeach
					</table>
				</div>
			  </div>
		</div>
