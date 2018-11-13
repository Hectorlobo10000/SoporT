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
				<th>id</th>
				<th>solicitante</th>
				<th>asunto</th>
				<th>descripción</th>
				<th>departamento</th>
				<th>municipio</th>
				<th>dirección</th>
				<th>fecha de asignación</th>
				@yield('extra fields')
			</tr>
			@yield('records')
		</table>
	</div>

@endsection