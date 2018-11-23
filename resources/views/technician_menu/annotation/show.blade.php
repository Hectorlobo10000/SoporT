@extends('layouts.app4')
@section('title','Mostrar anotaciones')
@section('return')
    {{route('pending')}}
@endsection
@section('content')
	<h1>Anotaciones de la tarea {{'000'.$task->id}}</h1>
<div class="form">
	<div style="float: right">
    	<a class="edit-link" href="{{route('edit task annotation',$task->id)}}">Editar</a>
    </div>
        <br>
	<textarea readonly class="formulario" style="height: 500px;">{{$task->annotation}}</textarea>
</div>


@endsection