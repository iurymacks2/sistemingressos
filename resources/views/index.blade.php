@extends('templates.template')

@section('content')
	@include('templates.header')
	<h1 class="text-center"> DASHBOARD</h1>
	<hr>
	<div class="text-center mt-3 mb-4">
		<a href="{{url('ingressos/create')}}">
			<button class="btn btn-dark">Cadastrar Ingresso</button>
		</a>
		<a href="{{url('ingressos/cadastrarIngresso')}}">
			<button class="btn btn-dark">Cadastrar Evento</button>
		</a>
	</div>
	<div class="col-8 m-auto">
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Event_Id</th>
					<th scope="col">Descricao</th>
					<th scope="col">Preço</th>
					<th scope="col">Status</th>	
					<th scope="col">Action</th>				
				</tr>
			</thead>
			<tbody>
			@foreach($ingressos as $ingresso)
				
				<tr>
					<th scope="row">{{$ingresso->event_id}}</th>
					<td>{{$ingresso->descricao}}</td>
					<td>{{$ingresso->price}}</td>
					<td>{{$ingresso->paid}}</td>
					<td>
						<a href="{{url("list-ingressos/$ingresso->id")}}">
							<button class="btn btn-dark">visualizar</button>
						</a>
						<a href="">
							<button class="btn btn-primary">editar</button>
						</a>
						<a href="">
							<button class="btn btn-danger">deletar</button>
						</a>
					</td>				
				</tr>
			@endforeach
				
			</tbody>
		</table>
	</div>

@endsection