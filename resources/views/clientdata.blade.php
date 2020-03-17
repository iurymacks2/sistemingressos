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
			//$client = $ingresso->find($ingresso->event_id)->relEvents;
		@endphp
		

		Id: {{$client->id}}<br>
		Nome: {{$client->name}}<br>
		Email: {{$client->email}}<br>
		Cpf: {{$client->cpf}}<br>
	</div>

@endsection