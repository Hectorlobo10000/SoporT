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
<?php
	$counter = $counter +1
?>
		@if($task->task_state_id===3)
			@section('extra fields')
				<th>Chat</th>
				<th><-----</th>
				<th></th>
			@endsection
			<tr>
				<td>{{$counter}}</td>
				<td>{{'000'.$task->id}}</td>
				<td>{{$task->client->name}}</td>
				<td>{{$task->task_type->name}}</td>
				<td>{{$task->description}}</td>
				<td>{{$task->client->place->domain}}</td>
				<td>{{$task->client->place->municipality}}</td>
				<td>{{$task->client->place->address}}</td>
				<td>{{$task->created_at}}</td>
				<td><a class="btn btn-info" href="{{route('chat.index',$task->id)}}">Chat</a></td>
				<td>
					<form action="{{route('update task state',['task'=>$task])}}" method="POST" id="form {{$task->id}}">
						{{method_field('PATCH')}}
	    				{{ csrf_field() }}
						<input type="hidden" name="task_state_id" value="2">
						<a  class="btn btn-success" href="javascript:{}" onclick="document.getElementById('form {{$task->id}}').submit(); return false;">Mover a iniciadas</a>
					</form>
				</td>
				<td><a class="btn btn-warning" href="">imprimir ticket</a></td>
			</tr>
		@endif
	@endforeach
@endsection