@extends('layouts.app1')
@section('content')
<div id="me-seccion-2">
		<nav>
			<ul>
			    @yield('task bar')
			    <li></li>
			</ul>
		</nav>
	</div>
	<div id="me-seccion-3">
		<table>
			<tr>
				<th>#</th>
				<th>Código</th>
				<th>Solicitante</th>
				<th>Asunto</th>
				<th>Descripción</th>
				<th>Departamento</th>
				<th>municipio</th>
				<th>Dirección</th>
				<th>Fecha de asignación</th>
				@yield('extra fields')
			</tr>
			@yield('records')
		</table>
	</div>

@endsection