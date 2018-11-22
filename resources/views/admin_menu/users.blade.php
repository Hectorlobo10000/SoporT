@extends('layouts.app3')

@section('title','Administrador')

@section('menu')
<li>
	<a href="{{route('usuarios.index')}}">Usuarios</a>
</li>

<li>
	<a href="{{route('departamentos.index')}}">Departamentos</a>
</li>

<li>
	<a href="{{route('actividades.index')}}">Actvidades</a>
</li>

<li>
	<a href="{{route('lugares.index')}}">Lugares</a>
</li>
@endsection


@section('header')
<tr>
	<th>#</th>
	<th>Nombre</th>
	<th>E-mail</th>
	<th>Telefono</th>
	<th>Departamento</th>
	<th>Municipio</th>
	<th>Direccion</th>
	<th>Depto. Trabaja</th>
	<th>Rol</th>
	<th>Acciones</th>
</tr>
@endsection

@section('content')
<?php $counter = 0; ?>
@foreach($usuarios as $usuario)
@if($usuario->id != Auth::id())
<?php
	$counter = $counter +1;
?>
<tr>
	<td>{{$counter}}</td>
	<td>{{$usuario->name}}</td>
	<td>{{$usuario->email}}</td>
	<td>{{$usuario->phone}}</td>
	<td>{{$usuario->place->domain}}</td>
	<td>{{$usuario->place->municipality}}</td>
	<td>{{$usuario->place->address}}</td>
	<td>{{$usuario->department->name}}</td>
	<td>{{$usuario->role->name}}</td>
	<td  width="100px">
		<a class="btn btn-warning" style="width: 100px" href="{{route('usuarios.edit',$usuario->id)}}">Modificar</a>
		<form method="post" action="{{route('usuarios.destroy',$usuario->id)}}">
			@csrf
			@method('DELETE')
			<button type="submit" class="btn btn-danger" style="width: 100px">Eliminar</button>
	    </form>
	</td>
</tr>
@endif
@endforeach

@endsection

@section('paginar')

{{$usuarios->links()}}

@endsection

@section('btn add')
<a class="btn btn-normal" href="{{route('usuarios.create')}}">Agregar</a>
@endsection
