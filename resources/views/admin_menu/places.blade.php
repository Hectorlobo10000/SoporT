@extends('layouts.app3')
@section('title','Administrador')
@section('menu')
<li>
	<a href="{{ route('usuarios.index') }}">Usuarios</a>
</li>
<li>
	<a href="{{ route('departamentos.index') }}">Departamentos</a>
</li>
<li>
	<a href="{{ route('actividades.index') }}">Actvidades</a>
</li>
<li>
	<a href="{{ route('lugares.index') }}">Lugares</a>
</li>
@endsection
@section('header')
<tr>
	<th>#</th>
	<th>Departamento</th>
	<th>Municipio</th>
	<th>Dirección</th>
	<th width="80px">Modificar</th>
	<th width="80px">Eliminar</th>
</tr>
@endsection
@section('content')
<?php $counter = 0; ?>
@foreach($lugares as $lugare)
<?php
	$counter = $counter +1;
?>
<tr>
	<td>{{ $counter }}</td>
	<td>{{ $lugare->domain }}</td>
	<td>{{ $lugare->municipality }}</td>
	<td>{{ $lugare->address }}</td>
	<td>
		<a class="btn-edit btn btn-success" href="{{ route('lugares.edit',$lugare->id) }}"></a>
	</td>
	<td  width="100px">
		<form method="post" action="{{ action('PlaceController@destroy',$lugare->id) }}" >
			@csrf
			@method('DELETE')
			<button type="submit" class="btn-delete btn btn-danger"></button>
		</form>
	</td>
</tr>
@endforeach
@endsection
@section('paginar')
{{ $lugares->links() }}
@endsection
@section('btn add')
<a class="btn-agregar btn btn-normal" href="{{ route('lugares.create') }}">Agregar</a>
@endsection