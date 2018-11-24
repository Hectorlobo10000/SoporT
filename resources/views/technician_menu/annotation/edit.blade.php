@if($task_state_id != 4)
@extends('layouts.app4')
@section('title','Editar anotaciones')
@section('return')
    {{route('show task annotation',$task->id)}}
@endsection
@section('header','Editar anotaciones de la tarea 000'.$task->id)
@section('content')
<form class="form" style="width: 100%" action="{{route('update task annotation',['task'=>$task])}}" method="POST">
    {{method_field('PATCH')}}
    {{ csrf_field() }}
    <textarea maxlength="1000" name="annotation" class="formulario" style="height: 400px;">{{$task->annotation}}</textarea>
    <br>
    <button class="btn btn-normal" type="submit">Modificar</button>
</form>
@endsection
@else
<div>Acceso denegado</div>
@endif