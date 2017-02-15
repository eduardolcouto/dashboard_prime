<div class="panel panel-default">
		  <div class="panel-heading">Suporte Custom - Backlog Total </div>
			  <div class="panel-body">
				<div class="table-responsive">
					<table class="table table-condensed table-striped">						
						@foreach($celulaCstTotal as $total)
							@if($total->total <= 16)
									{{--*/ $tableTotal = 'success'/*--}}
								@elseif($total->total <= 20)
									{{--*/ $tableTotal = 'warning'/*--}}
								@elseif($total->total == null)
									{{--*/ $tableTotal = ''/*--}}
								@else
									{{--*/ $tableTotal = 'danger'/*--}}
								@endif
							<tr>
								<div class="alert alert-{{$tableTotal}}">
								  {{$total->total}}
								</div>
							</tr>
						@endforeach
					</table>
				</div>
			  </div>
		</div>
