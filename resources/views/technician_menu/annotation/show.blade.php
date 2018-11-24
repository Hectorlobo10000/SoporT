@extends('layouts.app4')
@section('title','Mostrar anotaciones')
@section('header','Anotaciones de la tarea 000'.$task->id)
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
<div class="form">
	@if($task->task_state_id != 4)
	<div style="float: right">
    	<a class="btn-edit btn btn-success" href="{{route('edit task annotation',$task->id)}}"></a>
    </div>
        <br>
    @endif
	<textarea readonly class="formulario" style="height: 500px;">{{$task->annotation}}</textarea>
</div>


@endsection