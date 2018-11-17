@extends('layouts.app3')

@section('title','Cliente')
@section('menu')
<li>
	<a href="{{route('tasks.index')}}">Solicitudes</a>
</li>

<li>
	<a href="{{route('tasks.history')}}">Historial</a>
</li>

@endsection
@section('header')
<tr>
	<th>ID</th>
	<th>Técnico encargado</th>
	<th>Teléfono</th>
	<th>E-mail</th>
	<th>Asunto</th>
	<th>Descripción</th>
	<th>Fecha de la solicitud</th>
	<th>Estado de la solicitud</th>
	<th>Chat</th>
	<th>Modificar</th>
	<th>Eliminar</th>
</tr>
@endsection

@section('content')
	@foreach($tasks as $task)
		@if(Auth::id()==$task->client_id)
			<tr>
				<td>{{$task->id}}</td>
				<td>{{$task->technician->name}}</td>
				<td>{{$task->technician->phone}}</td>
				<td>{{$task->technician->email}}</td>
				<td>{{$task->task_type->name}}</td>
				<td>{{$task->description}}</td>
				<td>{{$task->created_at}}</td>
				<td>{{$task->task_state->name}}</td>
				<td><a class="btn btn-success" href="">Chat</a></td>
				@if($task->task_state_id == 1)
					<td><a class="btn btn-warning" href="{{route('tasks.edit',$task->id)}}">Modificar</a></td>
					<td><a class="btn btn-danger" href="">Eliminar</a></td>
				@else
					<td></td>
					<td></td>
				@endif

			</tr>
		@endif
	@endforeach
@endsection
@section('button','Solicitar Soporte')
@section('modal title','Solicitar tarea')

@section('modal form')
<form method="post" action="{{route('tasks.store')}}">
	@csrf
    <label>Tipo de solicitud:</label>
    <select class="form-control" name="task_type_id">
		@foreach($task_types as $task_type)
			<option value="{{$task_type->id}}" >{{$task_type->name}}</option>
		@endforeach
	</select>

    <input type="hidden" name="client_id" value={{Auth::id()}}>

    <label>Descripción:</label>
	<input type="text" name="description" class="formulario">

	<button type="button" class="btn btn-danger" data-dismiss="modal" style="float:left">Cancelar</button>
    <button type="submit" class="btn btn-primary" style="float:right">Agregar</button>
</form>
@endsection