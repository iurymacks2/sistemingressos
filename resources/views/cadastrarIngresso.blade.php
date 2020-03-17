@extends('templates.template')

@include('templates.header')
@section('content')
	<h1 class="text-center">@if(isset($ingresso)) EDITAR INGRESSO @else CADASTRAR INGRESSO @endif</h1>
	<hr>
	<div class="text-center mt-3 mb-4">
		
	</div>
	<div class="col-8 m-auto">
		@if(isset($ingresso))
			<form name="formEdit" id="formEdit" method="post" action="{{url("ingressos/$ingresso->id")}}">
				@method('PUT')	
		@else
			<form name="formCad" id="formCad" method="post" action="{{url('ingressos')}}">
		@endif		
			@csrf
			<select class="form-control mb-2" name="categoria" id="categoria" required>
				<option value="{{ $ingresso->categoria ?? ''}}">{{ $ingresso->categoria ?? 'selecione'}}</option>
				@foreach($events as $event)
					<option value="{{ $event->categoria }}">{{$event->categoria}}</option>
				@endforeach				
			</select>
			<select class="form-control mb-2" name="clientChoice" id="clientChoice" required>
				<option value="{{$ingresso->client_id ?? 'Selecione'}}">{{ $clientName ?? 'selecione'}}</option>
				@foreach($clients as $client)
					<option value="{{$client->id}}">{{$client->name}}</option>
				@endforeach
			</select>
			<input class="form-control mb-2" type="text" name="descricao" id="descricao" placeholder="descrição" value="{{ $ingresso->descricao ?? ''}}" required>
			<input class="form-control mb-2" type="number" name="price" id="price" step="any" min="0" placeholder="0.00" value="{{ $ingresso->price ?? ''}}" required>
			
			<select hidden class="form-control" name="paid" id="paid" required>
				<option value="true">pago</option>
				<option value="false">Não pago</option>
			<input class="btn btn-primary" type="submit" value="@if(isset($ingresso)) EDITAR INGRESSO @else CADASTRAR INGRESSO @endif">
		</form>
	</div>

@endsection