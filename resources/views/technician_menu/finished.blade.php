@extends('layouts.app2')
@section('title')
	Tareas finalizadas
@endsection
@section('task bar')
	<li><a href="{{route('pending')}}">Tareas pendientes</a></li>
	<li><a href="{{route('initiated')}}">Tareas iniciadas</a></li>
	<li class="active"><a href="{{route('finished')}}">Tareas finalizadas</a></li>
@endsection
@section('records')
<?php $counter = 0; ?>
	@foreach($tasks as $task)

		@if($task->task_state_id===3 || $task->task_state_id===4)
			@section('extra fields')
				<th>Estado</th>
				<th>Anotación</th>
				<th>Chat</th>
				<th>Mover a iniciadas</th>
			@endsection
			<tr>
				<?php
					$counter = $counter +1;
				?>
				<td>{{$counter}}</td>
				<td>{{'000'.$task->id}}</td>
				<td>{{$task->client->name}}</td>
				<td>{{$task->task_type->name}}</td>
				<td><a href="{{route('show.description',$task->id)}}">mostrar</a></td>
				<td>{{$task->client->place->domain}}</td>
				<td>{{$task->client->place->municipality}}</td>
				<td>{{$task->client->place->address}}</td>
				<td>{{$task->created_at}}</td>
				@if($task->task_state_id== 4)
				<td>Verificada</td>
				@else
				<td>Por verificar</td>
				@endif
				<td><a href="{{route('show task annotation',['task'=>$task])}}">mostrar</a></td>
				<td><a class="btn btn-normal" href="{{route('chat.index',$task->id)}}">Chat</a></td>
				<td>
					<form action="{{route('update task state',['task'=>$task])}}" method="POST" id="form {{$task->id}}">
						{{method_field('PATCH')}}
	    				{{ csrf_field() }}
						<input type="hidden" name="task_state_id" value="2">
						<a  class="btn btn-success" href="javascript:{}" onclick="document.getElementById('form {{$task->id}}').submit(); return false;">🡸</a>
					</form>
				</td>

			</tr>
		@endif
	@endforeach
@endsection