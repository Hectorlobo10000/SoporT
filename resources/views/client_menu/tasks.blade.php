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
	<th>Verificar</th>
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
				<td><a href="{{route('show.description',$task->id)}}">mostrar</a></td>
				<td>{{$task->created_at}}</td>
				<td>{{$task->task_state->name}}</td>
				<td><a class="btn btn-normal" href="{{route('chat.index',$task->id)}}">Chat</a></td>
				@if($task->task_state_id==3)
				<td>
					<form action="{{route('verify.task',['task'=>$task])}}" method="POST" id="form {{$task->id}}">
						{{method_field('PATCH')}}
	    				{{ csrf_field() }}
						<input type="hidden" name="task_state_id" value="4">
						<a class="btn btn-success" href="javascript:{}" style="font-size: 20px" onclick="document.getElementById('form {{$task->id}}').submit(); return false;"> 🗹</a>
					</form>
				</td>
				@else
					<td><div class="action-denied"><span>Bloqueado</span></div></td>
				@endif
				@if($task->task_state_id == 1 || $task->task_state_id == 4)
					<td><a class="btn btn-warning" href="{{route('tasks.edit',$task->id)}}">Modificar</a></td>
					<td>
						<form method="post" action="{{route('tasks.destroy',$task->id)}}">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger">Eliminar</button>
					    </form>
					</td>
				@else
					<td><div class="action-denied"><span>Bloqueado</span></div></td>
					<td><div class="action-denied"><span>Bloqueado</span></div></td>
				@endif

			</tr>
		@endif
	@endforeach
@endsection
@section('btn add')
<a class="btn btn-normal" href="{{route('tasks.create')}}">Crear Solicitud</a>
@endsection


