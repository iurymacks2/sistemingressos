<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}">
        <title>Dashboard</title>
    </head>
    <body class="sb-nav-fixed">
        @include('templates.header')
        <div class="text-center mt-3 mb-4">
        <a href="{{ url('clients') }}">
			<button class="btn btn-primary">CRUD CLIENTES</button>
		</a>
        <a href="{{ url('events') }}">
			<button class="btn btn-primary">CRUD EVENTOS</button>
		</a>
		<a href="{{ url('ingressos') }}">
			<button class="btn btn-primary">CRUD INGRESSOS</button>
		</a>
        
		
	</div>
    </body>
</html>