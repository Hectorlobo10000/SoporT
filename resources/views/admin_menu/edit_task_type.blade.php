@extends('layouts.app4')
@section('title','Editar tipo de tarea')
@section('return')
{{ route('actividades.index') }}
@endsection
@section('header','Editar actividad')
@section('content')
<form class="form" method="post" action="{{ action('TaskTypeController@update',$tipo->id) }}">
	@csrf
	@method('PUT')
	<label>Nombre:</label>
	<input type="text" name="name" class="formulario" value="{{ $tipo->name }}">
	@if($errors->has('name'))
	<div class="alert alert-danger">
		<span>{{ $errors->first('name') }}</span>
	</div>
	@endif
	<button type="submit" class="btn-agregar btn btn-normal">Modificar</button>
	<br><br>
</form>
@endsection