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

</head>

<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                        <h1>{{config('app.name', 'Laravel')}}</h1>
                </li>
                @yield('menu')
                <br>
                <li><a href="{{ url('/logout') }}">Cerrar Sesión</a></li>
            </ul>
        </div>

        <div id="page-content-wrapper">
            <div class="row">
                    <div class="col">
                        <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">&#9776;</a>
                    </div>
                    <div class="col">
                        <br>
                        <div class="dropdown">
                            <a class="drop-link" >{{Auth::User()->name}} ▼</a>
                            <div class="dropdown-content">
                                <a href="{{ url('/logout') }}">Cerrar Sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="container-fluid">


                <div class="table-responsive">
                    <table class="table table-bordered">

                        <thead>
                            @yield('header')
                        </thead>

                        <tbody>
                            @yield('content')
                        </tbody>
                    </table>

                    @yield('paginar')
                    @yield('button')

                </div>


                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                     <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">@yield('modal title')</h4>
                        </div>

                        <div class="modal-body">
                            @yield('modal form')
                        </div>

                        <div class="modal-footer">
                        </div>

                    </div>
                </div>
                </div>
            </div>
        </div>

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
