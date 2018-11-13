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
	<th>Departamento</th>
	<th>Municipio</th>
	<th>Direccion</th>
	<th>Modificar</th>
	<th>Eliminar</th>
</tr>
@endsection

@section('content')

@foreach($lugares as $lugare)
<tr>
	<td>{{$lugare->id}}</td>
	<td>{{$lugare->domain}}</td>
	<td>{{$lugare->municipality}}</td>
	<td>{{$lugare->address}}</td>
	<td><a class="btn btn-warning" href="{{route('lugares.edit',$lugare->id)}}">Modificar</a></td>
	<td>
		<form method="post" action="{{action('PlaceController@destroy',$lugare->id)}}" style="width: 100%">
		@csrf
		@method('DELETE')
		<button type="submit" class="btn btn-danger" style="width: 100%">Eliminar</button>
	    </form>
	</td>
</tr>
@endforeach

@endsection
@section('button','Agregar')
@section('modal title','Agregar Clientes')

@section('modal form')
<form method="post" action="{{route('lugares.store')}}">
	@csrf
	<label>Departamento:</label>
	<input type="text" name="domain" class="formulario">

	<label for="municipality">Municipio:</label>
	<input type="text" name="municipality" class="formulario">

	<label>Dirección:</label>
	<input type="text" name="address" class="formulario">

	<button type="button" class="btn btn-danger" data-dismiss="modal" style="float:left">Cancelar</button>
    <button type="submit" class="btn btn-primary" style="float:right">Agregar</button>
</form>
@endsection