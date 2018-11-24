@extends('layouts.app4')
@section('title','Mostrar anotaciones')
@section('return')
@if($task->task_state_id == 1)
    {{route('pending')}}
@elseif($task->task_state_id == 2)
	{{route('initiated')}}
@else
	{{route('finished')}}
@endif
@endsection
@section('content')
	<h1>Anotaciones de la tarea {{'000'.$task->id}}</h1>
<div class="form">
	@if($task->task_state_id != 4)
	<div style="float: right">
    	<a class="edit-link" href="{{route('edit task annotation',$task->id)}}">Editar</a>
    </div>
        <br>
    @endif
	<textarea readonly class="formulario" style="height: 500px;">{{$task->annotation}}</textarea>
</div>


@endsection