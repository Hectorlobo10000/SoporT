@extends('layouts.app4')

@section('title','Crear Solicitud')

@section('content')
<h1>Crear solicitud</h1>
<form method="post" action="{{route('tasks.store')}}">
    @csrf
    @if($errors->has('description'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('description')}}</span>
    </div>
    @endif
    @if($errors->has('technician_id') && !($errors->has('description')))
    <div class="alert alert-danger">
        <span>{{ $errors->first('technician_id')}}</span>
    </div>
    @endif
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