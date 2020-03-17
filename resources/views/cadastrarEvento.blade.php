@extends('templates.template')

@include('templates.header')
@section('content') 
	<h1 class="text-center">@if(isset($event)) EDITAR EVENTO @else CADASTRAR EVENTO @endif</h1> <hr>
	<div class="text-center mt-3 mb-4">
		
	</div>
	<div class="col-8 m-auto">
		@if(isset($event))
			<form name="formEdit" id="formEdit" method="post" action="{{url("events/$event->id")}}">
				@method('PUT')	
		@else
			<form name="formCad" id="formCad" method="post" action="{{url('events')}}">
		@endif		
			@csrf
			<input class="form-control mb-2" type="text" name="cidade" id="cidade" value="{{ $event->cidade ?? ''}}" placeholder="cidade" required>
			<input class="form-control mb-2" type="text" name="categoria" id="categoria" value="{{ $event->categoria ?? ''}}" placeholder="categoria" required>
			<input class="form-control mb-2" name="date_event" id="date_event" type="date" value="{{ $event->date_event ?? ''}}" required>
			<input class="form-control mb-2" type="text" name="name" id="name" placeholder="nome" value="{{ $event->name ?? ''}}" required>
			<input class="btn btn-primary" type="submit" value="@if(isset($event)) EDITAR EVENTO @else CADASTRAR EVENTO @endif">
		</form>
	</div>

@endsection