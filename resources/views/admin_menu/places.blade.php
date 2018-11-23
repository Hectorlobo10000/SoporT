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
	<th>Departamento</th>
	<th>Municipio</th>
	<th>Dirección</th>
	<th>⚠</th>
	<th>⚠</th>
</tr>
@endsection

@section('content')
<?php $counter = 0; ?>
@foreach($lugares as $lugare)
<?php
	$counter = $counter +1;
?>
<tr>
	<td>{{$counter}}</td>
	<td>{{$lugare->domain}}</td>
	<td>{{$lugare->municipality}}</td>
	<td>{{$lugare->address}}</td>
	<td  width="100px">
		<a class="btn btn-warning" style="width: 100px" href="{{route('lugares.edit',$lugare->id)}}">Modificar</a>
	</td>
	<td  width="100px">
		<form method="post" action="{{action('PlaceController@destroy',$lugare->id)}}" >
		@csrf
		@method('DELETE')
		<button  style="width: 100px" type="submit" class="btn btn-danger">Eliminar</button>
	    </form>
	</td>
</tr>
@endforeach

@endsection

@section('paginar')

{{$lugares->links()}}

@endsection

@section('btn add')
<a class="btn btn-normal" href="{{route('lugares.create')}}">Agregar</a>
@endsection
