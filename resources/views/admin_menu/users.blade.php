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
	<th>Id</th>
	<th>Nombre</th>
	<th>E-mail</th>
	<th>Telefono</th>
	<th>Departamento</th>
	<th>Municipio</th>
	<th>Direccion</th>
	<th>Depto Trabaja</th>
	<th>Rol</th>
	<th>Acciones</th>
</tr>
@endsection

@section('content')

@foreach($usuarios as $usuario)
<tr>
	<td>{{$usuario->id}}</td>
	<td>{{$usuario->name}}</td>
	<td>{{$usuario->email}}</td>
	<td>{{$usuario->phone}}</td>
	<td>{{$usuario->place->domain}}</td>
	<td>{{$usuario->place->municipality}}</td>
	<td>{{$usuario->place->address}}</td>
	<td>{{$usuario->department->name}}</td>
	<td>{{$usuario->role->name}}</td>
	<td>
		<a class="btn btn-warning" href="{{route('usuarios.edit',$usuario->id)}}">Modificar</a>
		<a class="btn btn-danger" href="">Eliminar</a>
	</td>
</tr>
@endforeach

@endsection

@section('paginar')

{{$usuarios->links()}}

@endsection

@section('btn add')
<a class="btn btn-primary" href="{{route('usuarios.create')}}">Agregar</a>
@endsection
