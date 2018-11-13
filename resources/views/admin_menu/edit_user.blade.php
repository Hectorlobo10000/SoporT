@extends('layouts.app4')

@section('title','Editar usuario')

@section('content')
<h1>Editar usuario</h1>
  <form method="post" action="{{route('usuarios.update',$usuario->id)}}">
	@csrf
	@method('PUT')

		<label>Nombre:</label>
	<input type="text" name="name" value="{{$usuario->name}}">

	<label>Telefono:</label>
	<input type="text" name="phone" value="{{$usuario->phone}}">

	<label>Correo:</label>
	<input type="email" name="email" value="{{$usuario->email}}">

	<label>Departamento:</label>
	<input type="text" name="depto" value="{{$usuario->place->domain}}">

	<label>Municipio:</label>
	<input type="text" name="muni"value="{{$usuario->place->municipality}}">

	<label>Direccion:</label>
	<input type="text" name="addres" value="{{$usuario->place->address}}">

    <button type="submit" class="btn btn-info">Modificar</button>
</form>

@endsection