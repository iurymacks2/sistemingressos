@extends('templates.template')

@include('templates.header')
@section('content')
	<h1 class="text-center"> VISUALIZAR</h1>
	<hr>
	<div class="text-center mt-3 mb-4">
		<a href="{{ url('clients') }}">
			<button class="btn btn-dark">CLIENTS CRUD</button>
		</a>
	</div>
	<div class="col-8 m-auto">
		@php
			//$event = $ingresso->find($ingresso->event_id)->relEvents;
		@endphp
		

		Nome do Evento: {{$event->name}}<br>
		Cidade: {{$event->cidade}}<br>
		Categoria: {{$event->categoria}}<br>
		Data do Evento: {{$event->date_event}}<br>
	</div>

@endsection