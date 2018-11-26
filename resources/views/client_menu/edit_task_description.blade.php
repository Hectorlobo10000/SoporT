@if($task->task_state_id == 1)
@extends('layouts.app4')
@section('title','Editar descripción')
@section('return')
{{ route('show task annotation',$task->id) }}
@endsection
@section('header','Editar descripción de la solicitud 000'.$task->id)
@section('content')
<form class="form-lg" action="{{ route('update.description',['task'=>$task]) }}" method="POST">
	{{ method_field('PATCH') }}
	{{ csrf_field() }}
	<textarea maxlength="1000" name="description" class="formulario" style="height: 500px; width: 100%">{{ $task->description }}</textarea>
	<button class="btn-agregar btn btn-normal" type="submit">Modificar</button>
</form>
@endsection
@else
<div>Acceso denegado</div>
@endif