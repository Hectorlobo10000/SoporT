<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>@yield('title')</title>
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/menu_empleado_tabla.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/menu_empleado.css') }}">
        <style>
        @import url('https://fonts.googleapis.com/css?family=Pacifico');
        </style>
    </head>
    <body>
        <div id="wrapper" class="row">
            <div class="col">
                <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                        <li class="sidebar-brand">
                            <h1>{{ config('app.name', 'Laravel') }}</h1>
                        </li>
                        @yield('menu')
                        <br>
                        <li><a href="{{ url('/logout') }}">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div id="page-content-wrapper" >
                    <a href="#menu-toggle" class="btn btn-normal" id="menu-toggle">&#9776;</a>
                    <div class="dropdown">
                        <a class="drop-link" >{{ Auth::User()->name }} &#9660</a>
                        <div class="dropdown-content">
                            <a href="{{ route('show.profile',Auth::id()) }}">Mi perfil</a>
                            <a style="border-top: 1px solid #d3d3d3" href="{{ url('/logout') }}">Cerrar sesión</a>
                        </div>
                    </div>
                    <div id="me-seccion-3">
                        <div class="table-responsive" >
                            <table>
                                <thead>
                                    @yield('header')
                                </thead>
                                <tbody>
                                    @yield('content')
                                </tbody>
                            </table>
                        </div>
                        <br>
                        @yield('paginar')
                        @yield('btn add')
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
        </div>
        <script src="{{ asset('jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script>
        $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });
        </script>
    </body>
</html>