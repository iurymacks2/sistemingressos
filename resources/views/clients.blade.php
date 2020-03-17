@extends('templates.template')
@section('content')
        @include('templates.header')
        <div class="col-8 m-auto text-center"> <h3 class="clients">CRUD CLIENTES</h1></div>
        <div class="text-center mt-3 mb-4">
            <a href="{{url('clients/create')}}">
                <button class="btn btn-success">CADASTRAR CLIENTE</button>
            </a>
            <a href="{{url('events')}}">
                <button class="btn btn-primary">CRUD EVENTOS</button>
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
                            <th scope="col">email</th>
                            <th scope="col">cpf</th>	
                            <th scope="col">Action</th>				
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        
                        <tr>
                            <th scope="row">{{$client->id}}</th>
                            <td>{{$client->name}}</td>
                            <td>{{$client->email}}</td>
                            <td>{{$client->cpf}}</td>
                            <td>
                                <a href="{{url("clients/$client->id")}}">
                                    <button class="btn btn-dark">visualizar</button>
                                </a>
                                <a href="{{ url("clients/$client->id/edit") }}">
                                    <button class="btn btn-primary">editar</button>
                                </a>
                                <a href="{{url("clients/$client->id")}}" class="js-del">
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