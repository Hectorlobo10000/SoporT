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
			<th>Anotación</th>
			<th>Chat</th>
			<th>Mover a pendientes</th>
			<th >Mover a finalizadas</th>
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
				<td><a href="{{route('show task annotation',['task'=>$task])}}">mostrar</a></td>
				<td><a class="btn btn-normal" href="{{route('chat.index',$task->id)}}">Chat</a></td>
				<td>
					<form action="{{route('update task state',['task'=>$task])}}" method="POST" id="form 1 {{$task->id}}">
						{{method_field('PATCH')}}
	    				{{ csrf_field() }}
						<input type="hidden" name="task_state_id" value="1">
						<a class="btn btn-success" href="javascript:{}" onclick="document.getElementById('form 1 {{$task->id}}').submit(); return false;">🡸</a>
					</form>
				</td>
				<td>
					<form action="{{route('update task state',['task'=>$task])}}" method="POST" id="form 2 {{$task->id}}">
						{{method_field('PATCH')}}
	    				{{ csrf_field() }}
						<input type="hidden" name="task_state_id" value="3">
						<a class="btn btn-success" href="javascript:{}" onclick="document.getElementById('form 2 {{$task->id}}').submit(); return false;">🡺</a>
					</form>
				</td>
			</tr>
		@endif
	@endforeach
@endsection
