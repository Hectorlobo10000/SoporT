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
	<th width="10px">#</th>
	<th>Nombre</th>
	<th>E-mail</th>
	<th>Telefono</th>
	<th>Departamento</th>
	<th>Municipio</th>
	<th>Direccion</th>
	<th>Depto. Trabaja</th>
	<th>Rol</th>
	<th width="80px">Modificar</th>
	<th width="80px">Eliminar</th>
</tr>
@endsection
@section('content')
<?php $counter = 0; ?>
@foreach($users as $user)
@if($user->id != Auth::id())
<?php $counter = $counter +1; ?>
<tr>
	<td>{{ $counter }}</td>
	<td>{{ $user->name }}</td>
	<td>{{ $user->email }}</td>
	<td>{{ $user->phone }}</td>
	<td>{{ $user->place->domain }}</td>
	<td>{{ $user->place->municipality }}</td>
	<td>{{ $user->place->address }}</td>
	<td>{{ $user->department->name }}</td>
	<td>{{ $user->role->name }}</td>
	<td>
		<a class="btn-edit btn btn-success" href="{{ route('usuarios.edit',$user->id) }}"></a>
	</td>
	<td>
		<form method="post" action="{{ route('usuarios.destroy',$user->id) }}">
			@csrf
			@method('DELETE')
			<button type="submit" class="btn-delete btn btn-danger"></button>
		</form>
	</td>
</tr>
@endif
@endforeach
@endsection
@section('paginar')
{{ $users->links() }}
@endsection
@section('btn add')
<a class="btn-agregar btn btn-normal" href="{{ route('usuarios.create') }}">Agregar</a>
@endsection