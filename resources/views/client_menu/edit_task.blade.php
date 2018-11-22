@extends('layouts.app4')

@section('title','Editar solicitud')

@section('content')

  <form method="post" action="{{route('tasks.update',$task->id)}}">
	@csrf
	@method('PUT')
	<h1>Editar solicitud</h1>
	@if($errors->has('technician_id') && !($errors->has('description')))
    <div class="alert alert-danger">
        <span>{{ $errors->first('technician_id')}}</span>
    </div>
    @endif
	<label>Tipo de solicitud:</label>
	<select class="form-control" name="task_type_id">
		@foreach($task_types as $task_type)
			<option value="{{$task_type->id}}" >{{$task_type->name}}</option>
		@endforeach
	</select>
	<label>Descripción:</label>
	<textarea maxlength="1000" name="description" class="formulario" style="height: 400px;">{{$task->description}}</textarea>
    @if($errors->has('description'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('description')}}</span>
    </div>
    @endif
    <button type="submit" class="btn btn-info">Modificar</button>
</form>

@endsection