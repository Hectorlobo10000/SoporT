
@extends('layouts.app4')
@section('content')


<form action="{{route('update task annotation',['task'=>$task])}}" method="POST">
    {{method_field('PATCH')}}
    {{ csrf_field() }}
    <h1>Editar Anotaciones</h1>
    <label>Anotaciones de la tarea {{$task->id}}:</label>
    <textarea maxlength="1000" name="annotation" class="formulario" style="height: 400px;">{{$task->annotation}}</textarea>
    <br>
    <button class="btn btn-warning" type="submit">Confirmar</button>
</form>
@endsection