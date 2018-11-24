@extends('layouts.app4')
@section('title','Mostrar descripción')
@section('return')
	@if(Auth::user()->role_id == 2)
    {{url()->previous()}}
    @else
    {{route('tasks.index')}}
    @endif
@endsection
@section('header','Descripción de 000'.$task->id)
@section('content')
<div class="form" style="width: 100%">

	<textarea readonly class="formulario" style="height: 400px;">{{$task->description}}</textarea>
    @if(Auth::user()->role_id == 3 && $task->task_state_id == 1)
    <div style="float: right">
        <a class="btn-edit btn btn-success" href="{{route('edit.description',$task->id)}}"></a>
    </div>
    <br>
    @endif
</div>


@endsection