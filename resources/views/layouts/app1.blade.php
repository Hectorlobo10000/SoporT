
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/menu_empleado.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/menu_empleado_tabla.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Anton|Righteous|Source+Code+Pro" rel="stylesheet">
</head>
<body id="me">
    <div class="container">
        <div class="row" id="me-seccion-1">
            <div class="col-10" align="left">
                        <br>
                        <a id="me-titulo" href="#">
                            <h1>
                                {{ config('app.name', 'Laravel') }}
                            </h1>
                        </a>
                    </div>
            <div class="col-2" align="right">
                <div class="dropdown">
                    <button class="dropbtn">{{Auth::User()->name}} ▼</button>
                    <div class="dropdown-content">
                        <a href="{{ url('/logout') }}">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
	@yield('content')
</body>

</html>
