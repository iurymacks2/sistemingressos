@extends('templates.template')

@include('templates.header')
@section('content')
	<h1 class="text-center">@if(isset($client)) EDITAR CLIENTE @else CADASTRAR CLIENTE @endif</h1> <hr>
	<div class="text-center mt-3 mb-4">
		
	</div>
	<div class="col-8 m-auto">

		@if(isset($client))
			<form name="formEdit" id="formEdit" method="post" action="{{url("clients/$client->id")}}">
				@method('PUT')	
		@else
			<form name="formCad" id="formCad" method="post" action="{{url('clients')}}">
		@endif		
			@csrf
			<input class="form-control mb-2" type="text" name="name" id="name" 
			placeholder="nome" value="{{ $client->name ?? ''}}" required>
			<input class="form-control mb-2" type="email" name="email" id="email" value="{{ $client->email ?? ''}}" placeholder="email" required>
			<input class="form-control mb-2" type="text" name="cpf" \
				pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" \
				title="Digite um CPF no formato: xxx.xxx.xxx-xx" value="{{ $client->cpf ?? ''}}" placeholder="000.000.000-00" required>
			<input class="btn btn-primary" type="submit" value="@if(isset($client)) EDITAR CLIENTE @else CADASTRAR CLIENTE @endif">
		</form>
	</div>

@endsection