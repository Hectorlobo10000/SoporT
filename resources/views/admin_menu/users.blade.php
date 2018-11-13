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
	<th>Correo</th>
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
@section('button','Agregar')
@section('modal title','Agregar Clientes')

@section('modal form')
<form method="post" action="{{route('usuarios.store')}}">
	@csrf
	<label>Nombre:</label>
	<input type="text" name="name" class="formulario">

	<label>Teléfono:</label>
	<input type="text" name="phone" class="formulario">

	<label>Correo:</label>
	<input type="email" name="email" class="formulario">

	<label>Contraseña:</label>
	<input type="password" name="pass" class="formulario">

	<label>Departamento:</label>
	<input type="text" name="depto" class="formulario">

	<label>Municipio:</label>
	<input type="text" name="muni" class="formulario">

	<label>Dirección:</label>
	<input type="text" name="addres" class="formulario">

    <label>Rol:</label>
    <select class="form-control" name="roles">
    @foreach($roles as $role)
     <option>{{$role->name}}</option>
    @endforeach
    </select>

    <label>Departamento:</label>
	<select class="form-control" name="dept">
	@foreach($departamentos as $departamento)
     <option>{{$departamento->name}}</option>
    @endforeach
    </select>

    <label>Tipos de actividades (Solo para técnicos):</label>
    @foreach($tipos as $tipo)
    <label>
    	<input type="checkbox" name="tipoact[]" class="tp" value="{{$tipo->id}}">  {{$tipo->name}}
    </label>
    @endforeach

	<button type="button" class="btn btn-danger" data-dismiss="modal" style="float:left">Cancelar</button>
    <button type="submit" class="btn btn-primary" style="float:right">Agregar</button>
</form>
@endsection