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
	<th>Modificar</th>
	<th>Eliminar</th>
</tr>
@endsection

@section('content')

@foreach($departamentos as $departamento)
<tr>
	<td>{{$departamento->id}}</td>
	<td>{{$departamento->name}}</td>
	<td><a class="btn btn-warning" href="{{route('departamentos.edit',$departamento->id)}}">Modificar</a></td>
	<td>
		<form method="post" action="{{action('DepartmentController@destroy',$departamento->id)}}" style="width: 100%">
		@csrf
		@method('DELETE')
		<button type="submit" class="btn btn-danger" style="width: 100%">Eliminar</button>
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

