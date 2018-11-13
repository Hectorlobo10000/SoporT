@extends('layouts.app4')

@section('title','Editar tipo de tarea')

@section('content')
<h1>Editar tipo de actividad</h1>
  <form method="post" action="{{action('TaskTypeController@update',$tipo->id)}}">
	@csrf
	@method('PUT')
	<label>Nombre:</label>
	<input type="text" name="name" value="{{$tipo->name}}">
    <button type="submit" class="btn btn-info">Modificar</button>
   </form>

@endsection