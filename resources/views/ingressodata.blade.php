@extends('templates.template')

@section('content')
	<h1 class="text-center"> VISUALIZAR</h1>
	<hr>
	<div class="text-center mt-3 mb-4">
		<a href="">
			<button class="btn btn-dark">Cadastrar</button>
		</a>
	</div>
	<div class="col-8 m-auto">
		@php
			$evento = $ingresso->find($ingresso->event_id)->relEvents;
		@endphp
		

		Nome do Evento: {{$evento->categoria}}<br>
		Cidade: {{$evento->cidade}}<br>
		Preço: {{$ingresso->price}}<br>
		Pago: {{$ingresso->paid == 1 ? "pago" : "não pago"}}<br>
	</div>

@endsection