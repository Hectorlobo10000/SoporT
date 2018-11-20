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
	<th>#</th>
	<th>Código</th>
	<th>Técnico encargado</th>
	<th>Teléfono</th>
	<th>E-mail</th>
	<th>Asunto</th>
	<th>Descripción</th>
	<th>Fecha de la solicitud</th>
	<th>Estado</th>
	<th>Chat</th>
	<th>Modificar</th>
	<th>Eliminar</th>
</tr>
@endsection

@section('content')
<?php $counter = 0; ?>
	@foreach($tasks as $task)

		@if(Auth::id()==$task->client_id)
		<?php
			$counter = $counter + 1;
		?>
			<tr>
				<td>{{$counter}}</td>
				<td>{{'000'.$task->id}}</td>
				<td>{{$task->technician->name}}</td>
				<td>{{$task->technician->phone}}</td>
				<td>{{$task->technician->email}}</td>
				<td>{{$task->task_type->name}}</td>
				<td>{{$task->description}}</td>
				<td>{{$task->created_at}}</td>
				<td>{{$task->task_state->name}}</td>
				<td><a class="btn btn-success" href="{{route('chat.index',$task->id)}}">Chat</a></td>
				@if($task->task_state_id == 1)
					<td><a class="btn btn-warning" href="{{route('tasks.edit',$task->id)}}">Modificar</a></td>
					<td>
						<form method="post" action="{{route('tasks.destroy',$task->id)}}">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger">Eliminar</button>
					    </form>
					</td>
				@else
					<td></td>
					<td></td>
				@endif

			</tr>
		@endif
	@endforeach
@endsection
@section('btn add')
<a class="btn btn-primary" href="{{route('tasks.create')}}">Crear Solicitud</a>
@endsection


