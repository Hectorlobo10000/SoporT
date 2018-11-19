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
	<th>Dirección</th>
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
	<td><a class="btn btn-warning" style="width: 100px;" href="{{route('lugares.edit',$lugare->id)}}">Modificar</a></td>
	<td>
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
<a class="btn btn-primary" href="{{route('lugares.create')}}">Agregar</a>
@endsection
