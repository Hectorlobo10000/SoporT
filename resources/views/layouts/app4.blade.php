<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/PlantillaEditar.css') }}" rel="stylesheet">
	<title>@yield('title')</title>
</head>
<body>
	<div class="dropdown">
        <a href="#" class="drop-link" style="text-decoration: none; color: #333">{{Auth::User()->name}} ▼</a>
        <div class="dropdown-content">
            <a href="{{ url('/logout') }}">Cerrar Sesión</a>
        </div>
	</div>
<br>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

		    		@yield('content')

			</div>
		</div>
	</div>
	<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
</body>
</html>