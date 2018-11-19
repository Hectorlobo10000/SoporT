@extends('layouts.app4')

@section('title','Editar tipo de tarea')

@section('content')
<h1>Editar tipo de actividad</h1>
  <form method="post" action="{{action('TaskTypeController@update',$tipo->id)}}">
	@csrf
	@method('PUT')
    <h1>Editar Tipo De Actividad</h1>
	<label>Nombre:</label>
	<input type="text" name="name" class="formulario" value="{{$tipo->name}}">
	 @if($errors->has('name'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('name')}}</span>
    </div>
    @endif
    <button type="submit" class="btn btn-info">Modificar</button>
   </form>

@endsection