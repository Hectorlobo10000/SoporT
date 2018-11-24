@if($task_state_id == 1)
@extends('layouts.app4')
@section('title','Editar descripción')
@section('return')
    {{route('show task annotation',$task->id)}}
@endsection
@section('content')

<h1>Editar descripción de la tarea: {{'000'.$task->id}}</h1>
<form class="form" action="{{route('update.description',['task'=>$task])}}" method="POST">
    {{method_field('PATCH')}}
    {{ csrf_field() }}
    <textarea maxlength="1000" name="description" class="formulario" style="height: 400px;">{{$task->description}}</textarea>
    <br>
    <button class="btn btn-normal" type="submit">Modificar</button>
</form>
@endsection
@else
<div>Acceso denegado</div>
@endif