@extends('dashboard.template')

@section('content')	
<script>
var notificarSlaIni = false;
var notificarSlaCont = false;
</script>

<div class="row">

	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-6">
				@include('dashboard.partial.celula1_triagem')
				@include('dashboard.partial.celula1_distribuicao')
			</div>
			<div class="col-sm-6">
				@include('dashboard.partial.celula2_triagem')
				@include('dashboard.partial.celula2_distribuicao')
			</div>
		</div>
	</div>

</div>

@endsection	

@section('javascript')

<script>
	
	var Notificacao = {
		init: function(){
			this.notifier();
		},

		notifier: function()
		{
			Notification.requestPermission();

			if(notificarSlaIni){
				var notification = new Notification("SLA Inicial", {
				    icon: 'http://i.stack.imgur.com/dmHl0.png',
				    body: "Existem chamado com SLA Inicial perto de Estourar."
				});

			}

			if(notificarSlaCont){
				var notification = new Notification("SLA Contigência", {
				    icon: 'http://i.stack.imgur.com/dmHl0.png',
				    body: "Existem chamado com SLA Contingência perto de Estourar."
				});
				notification.sound;
			}


		}
	};

	window.onload = function(){
		Notificacao.init();
	};

</script>
@endsection