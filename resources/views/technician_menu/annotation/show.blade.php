@extends('layouts.app4')
@section('content')

<form class="form">
	<h1>Mostrar Anotaciones</h1>
	<label>Anotaciones de la tarea {{'000'.$task->id}}:</label>
	<textarea readonly class="formulario" style="height: 400px;">{{$task->annotation}}</textarea>
    <a class="btn btn-secondary" id="link" href="{{route('pending')}}">Regresar al menu</a>
    <a class="btn btn-warning" id="link" href="{{route('edit task annotation',['task'=>$task])}}">Editar</a>
</form>


@endsection