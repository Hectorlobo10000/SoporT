@extends('layouts.app1')
@section('content')
<div id="me-seccion-4">
	<br><br>
	<h3>Anotaciones de la tarea {{$task->id}}:</h3>
	<textarea readonly>{{$task->annotation}}</textarea>
    <br>
    <button class="btn btn-dark"><a id="link" href="{{route('pending')}}">Regresar al menu</a></button>
    <button class="btn btn-dark"><a id="link" href="{{route('edit task annotation',['task'=>$task])}}">Editar</a></button>
</div>
@endsection