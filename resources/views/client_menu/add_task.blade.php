@extends('layouts.app4')

@section('title','Crear Solicitud')

@section('content')
<form method="post" action="{{route('tasks.store')}}">
    @csrf
    <h1>Crear Solicitud</h1>
    <label>Tipo de solicitud:</label>
    <select name="task_type_id">
        @foreach($task_types as $task_type)
            <option value="{{$task_type->id}}" >{{$task_type->name}}</option>
        @endforeach
    </select>

    <input type="hidden" name="client_id" value={{Auth::id()}}>

    <label>Descripción:</label>
    <textarea maxlength="1000" name="description" class="formulario" style="height: 400px; "></textarea>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>

@endsection