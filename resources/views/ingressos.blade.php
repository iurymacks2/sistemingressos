@extends('templates.template')

@section('content')
	@include('templates.header')
	<div class="col-10 m-auto text-center"> <h3 class="ingressos">CRUD INGRESSOS</h1></div>
	
	<div class="text-center mt-3 mb-4">
		<a href="{{ url('ingressos/create') }}">
			<button class="btn btn-success">CADASTRAR INGRESSO</button>
		</a>
		<a href="{{ url('clients') }}">
			<button class="btn btn-primary">CRUD CLIENTES</button>
		</a>
		<a href="{{ url('events') }}">
			<button class="btn btn-primary">CRUD EVENTOS</button>
		</a>
	</div>
	<div class="col-10 m-auto">
		<form action="{{ url('ingressos/busca') }}" method="post">
		@csrf
			<div class="form-row">
				<div class="col-4">
					<input type="text" class="form-control" placeholder="digite aqui.." name="search">
				</div>
				<select class=" col-4 form-control mb-2" name="choice" id="choice" required>
					<option value="categoria">categoria</option>				
					<option value="descricao">descricao</option>				
				</select>
				<div class="col-auto">
					<button type="submit" class="btn btn-primary">pesquisar</button>
				</div>
			</div>
		</form>
		@csrf
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Event_Id</th>
					<th scope="col">Categoria</th>
					<th scope="col">Descricao</th>
					<th scope="col">Preço</th>
					<th scope="col">Status</th>	
					<th class="d-flex justify-content-center" scope="col">Action</th>				
				</tr>
			</thead>
			<tbody>
			@foreach($ingressos as $ingresso)
				
				<tr>
					<th scope="row">{{$ingresso->event_id}}</th>
					<td>{{$ingresso->categoria}}</td>
					<td>{{$ingresso->descricao}}</td>
					<td>{{$ingresso->price}}</td>
					<td>{{$ingresso->paid}}</td>
					<td >
					<div class="float-right mr-2">
						<a href="{{url("ingressos/$ingresso->id")}}">
							<button class="btn btn-dark">Visualizar</button>
						</a>
						<a href="{{url("ingressos/$ingresso->id/edit")}}">
							<button class="btn btn-primary">Editar</button>
						</a>
						<a href="{{url("ingressos/$ingresso->id")}}" class="js-del">
							<button class="btn btn-danger" id="eventos">Deletar</button>
						</a>
					</div>
					</td>				
				</tr>
			@endforeach
				
			</tbody>
		</table>
	</div>
@endsection