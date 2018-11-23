@extends('layouts.app2')
@section('title')
	Tareas iniciadas
@endsection
@section('task bar')
	<li><a href="{{route('pending')}}">Tareas pendientes</a></li>
	<li class="active"><a href="{{route('initiated')}}">Tareas iniciadas</a></li>
	<li><a href="{{route('finished')}}">Tareas finalizadas</a></li>
@endsection
@section('records')
<?php $counter = 0 ; ?>
	@foreach($tasks as $task)
		@if($task->task_state_id===2)
		@section('extra fields')
			<th>Chat</th>
			<th>Anotación</th>
			<th><-----</th>
			<th>-----></th>
		@endsection
			<tr>
				<?php
					$counter = $counter +1
				?>
				<td>{{$counter}}</td>
				<td>{{'000'.$task->id}}</td>
				<td>{{$task->client->name}}</td>
				<td>{{$task->task_type->name}}</td>
				<td>{{$task->description}}</td>
				<td>{{$task->client->place->domain}}</td>
				<td>{{$task->client->place->municipality}}</td>
				<td>{{$task->client->place->address}}</td>
				<td>{{$task->created_at}}</td>
				<td><a class="btn btn-normal" href="{{route('chat.index',$task->id)}}">Chat</a></td>
				<td><a class="btn btn-info" href="{{route('show task annotation',['task'=>$task])}}">mostrar anotación</a></td>
				<td>
					<form action="{{route('update task state',['task'=>$task])}}" method="POST" id="form 1 {{$task->id}}">
						{{method_field('PATCH')}}
	    				{{ csrf_field() }}
						<input type="hidden" name="task_state_id" value="1">
						<a class="btn btn-success" href="javascript:{}" onclick="document.getElementById('form 1 {{$task->id}}').submit(); return false;">Mover a pendientes</a>
					</form>
				</td>
				<td>
					<form action="{{route('update task state',['task'=>$task])}}" method="POST" id="form 2 {{$task->id}}">
						{{method_field('PATCH')}}
	    				{{ csrf_field() }}
						<input type="hidden" name="task_state_id" value="3">
						<a class="btn btn-success" href="javascript:{}" onclick="document.getElementById('form 2 {{$task->id}}').submit(); return false;">Mover a finalizadas</a>
					</form>
				</td>
			</tr>
		@endif
	@endforeach
@endsection
