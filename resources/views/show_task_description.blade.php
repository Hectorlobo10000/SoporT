@extends('layouts.app4')
@section('title','Mostrar descripción')
@section('return')
	@if(Auth::user()->role_id == 2)
    {{route('pending')}}
    @else
    {{route('tasks.index')}}
    @endif
@endsection
@section('content')
	<h1>Descripción de la tarea {{'000'.$task->id}}</h1>

<div class="form">
	@if(Auth::user()->role_id == 3)
	<div style="float: right">
    	<a class="edit-link" href="{{route('edit.description',$task->id)}}">Editar</a>
    </div>
    <br>
    @endif
	<textarea readonly class="formulario" style="height: 500px;">{{$task->description}}</textarea>
</div>


@endsection