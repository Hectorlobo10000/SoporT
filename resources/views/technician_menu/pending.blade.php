@extends('layouts.app2')
@section('title')
	Tareas pendientes
@endsection
@section('task bar')
	<li class="active"><a href="{{route('pending')}}">Tareas pendientes</a></li>
	<li><a href="{{route('initiated')}}">Tareas iniciadas</a></li>
	<li><a href="{{route('finished')}}">Tareas finalizadas</a></li>
@endsection
@section('records')
<?php $counter = 0; ?>
	@foreach($tasks as $task)
		@if($task->task_state_id===1)
			@section('extra fields')
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
				<td><a href="{{route('show.description',$task->id)}}">Mostrar</a></td>
				<td>{{$task->client->place->domain}}</td>
				<td>{{$task->client->place->municipality}}</td>
				<td>{{$task->client->place->address}}</td>
				<td>{{$task->created_at}}</td>
				<td><a href="{{route('show task annotation',['task'=>$task])}}">Mostrar</a></td>
				<td><a class="btn btn-normal" href="{{route('chat.index',$task->id)}}">Chat</a></td>
				<td>
					{{-- formulario que envia el nuevo estado de la tarea...se utiliza una id con cuyo nombre utiliza la id del task para identificar el formulario --}}
					<form action="{{route('update task state',['task'=>$task])}}" method="POST" id="form {{$task->id}}">
						{{method_field('PATCH')}}
	    				{{ csrf_field() }}
						<input type="hidden" name="task_state_id" value="2">
						<a class="btn btn-success" href="javascript:{}" onclick="document.getElementById('form {{$task->id}}').submit(); return false;">🡺</a>
					</form>
				</td>
			</tr>
		@endif
	@endforeach
@endsection