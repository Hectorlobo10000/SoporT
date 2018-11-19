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
	<th>Tipo Actvidad</th>
	<th>Modificar</th>
	<th>Eliminar</th>
</tr>
@endsection

@section('content')

@foreach($tipos as $tipo)
<tr>
	<td>{{$tipo->id}}</td>
	<td>{{$tipo->name}}</td>
	<td><a class="btn btn-warning" style="width: 100px;" href="{{route('actividades.edit',$tipo->id)}}">Modificar</a></td>
	<td>
		<form method="post" action="{{action('TaskTypeController@destroy',$tipo->id)}}" style="width: 100px;">
		@csrf
		@method('DELETE')
		<button type="submit" class="btn btn-danger" style="width: 100px;">Eliminar</button>
	    </form>
	</td>
</tr>
@endforeach

@endsection

@section('paginar')

{{$tipos->links()}}

@endsection


@section('btn add')
<a class="btn btn-primary" href="{{route('actividades.create')}}">Agregar</a>
@endsection
