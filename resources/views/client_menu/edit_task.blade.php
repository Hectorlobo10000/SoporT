@extends('layouts.app4')

@section('title','Editar solicitud')

@section('content')
<h1>Editar solicitud</h1>
  <form method="post" action="{{route('tasks.update',$task->id)}}">
	@csrf
	@method('PUT')
	<label>Tipo de solicitud:</label>
	<select class="form-control" name="task_type_id">
		@foreach($task_types as $task_type)
			<option value="{{$task_type->id}}" >{{$task_type->name}}</option>
		@endforeach
	</select>

	<label>Descripción:</label>
	<input type="text" name="description" value="{{$task->description}}">

    <button type="submit" class="btn btn-info">Modificar</button>
</form>

@endsection