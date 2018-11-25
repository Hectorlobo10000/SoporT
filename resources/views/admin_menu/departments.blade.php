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
	<th>Nombre</th>
	<th width="80px">Modificar</th>
	<th width="80px">Eliminar</th>
</tr>
@endsection
@section('content')
<?php $counter = 0; ?>
@foreach($departamentos as $departamento)
<?php
	$counter = $counter +1;
?>
<tr>
	<td>{{ $counter }}</td>
	<td>{{ $departamento->name }}</td>
	<td width="100px">
		<a class="btn-edit btn btn-success"href="{{ route('departamentos.edit',$departamento->id) }}"></a></td>
		@if($departamento->users()->exists())
		<td class="action-denied"></td>
		@else
		<td>
			<form method="post" action="{{ action('DepartmentController@destroy',$departamento->id) }}">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn-delete btn btn-danger"></button>
			</form>
		</td>
		@endif
	</tr>
	@endforeach
	@endsection
	@section('paginar')
	{{ $departamentos->links() }}
	@endsection
	@section('btn add')
	<a class="btn-agregar btn btn-normal" href="{{ route('departamentos.create') }}">Agregar</a>
	@endsection