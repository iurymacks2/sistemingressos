@extends('templates.template')
@section('content')
        @include('templates.header')
        <div class="col-8 m-auto text-center"> <h3 class="events">CRUD EVENTOS</h1></div>
        <div class="text-center mt-3 mb-4">
            <a href="{{url('events/create')}}">
                <button class="btn btn-success">CADASTRAR EVENTO</button>
            </a>
            <a href="{{url('clients')}}">
                <button class="btn btn-primary">CRUD CLIENTES</button>
            </a>
            <a href="{{ url('ingressos') }}"> 
                <button class="btn btn-primary">CRUD INGRESSOS</button>
            </a>          
            <div class="col-8 m-auto mt-2">
                @csrf
                <table class="table mt-2">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Data do Evento</th>	
                            <th scope="col">Action</th>				
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $event)
                        
                        <tr>
                            <th scope="row">{{$event->id}}</th>
                            <td>{{$event->name}}</td>
                            <td>{{$event->cidade}}</td>
                            <td>{{$event->categoria}}</td>
                            <td>{{$event->date_event}}</td>
                            <td>
                                <a href="{{url("events/$event->id")}}">
                                    <button class="btn btn-dark">visualizar</button>
                                </a>
                                <a href="{{url("events/$event->id/edit")}}">
                                    <button class="btn btn-primary">editar</button>
                                </a>
                                <a href="{{url("events/$event->id")}}" class="js-del">
                                    <button class="btn btn-danger">deletar</button>
                                </a>
                            </td>				
                        </tr>
                    @endforeach
                        
                    </tbody>
                </table>
            </div>	
	    </div>
@endsection