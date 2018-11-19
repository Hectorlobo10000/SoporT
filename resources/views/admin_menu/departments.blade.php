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
	<th>Modificar</th>
	<th>Eliminar</th>
</tr>
@endsection

@section('content')
<?php $counter = 0; ?>
@foreach($departamentos as $departamento)
<?php
	$counter = $counter +1;
?>
<tr>
	<td>{{$counter}}</td>
	<td>{{$departamento->name}}</td>
	<td width="100px">
		<a class="btn btn-warning"href="{{route('departamentos.edit',$departamento->id)}}" style="width: 100px">Modificar</a></td>
	<td width="100px">
		<form method="post" action="{{action('DepartmentController@destroy',$departamento->id)}}">
		@csrf
		@method('DELETE')
		<button type="submit" style="width: 100px" class="btn btn-danger">Eliminar</button>
	    </form>
	</td>
</tr>
@endforeach

@endsection

@section('paginar')

{{$departamentos->links()}}

@endsection

@section('btn add')
<a class="btn btn-primary" href="{{route('departamentos.create')}}">Agregar</a>
@endsection

