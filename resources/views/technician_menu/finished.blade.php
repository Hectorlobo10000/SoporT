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
	@foreach($tasks as $task)
		@if($task->task_state_id===3)
			@section('extra fields')
				<th></th>
				<th><-----</th>
			@endsection
			<tr>
				<td>{{$task->id}}</td>
				<td>{{$task->client->name}}</td>
				<td>{{$task->task_type->name}}</td>
				<td>{{$task->description}}</td>
				<td>{{$task->client->place->domain}}</td>
				<td>{{$task->client->place->municipality}}</td>
				<td>{{$task->client->place->address}}</td>
				<td>{{$task->created_at}}</td>
				<td><a href="">imprimir ticket</a></td>
				<td>
					<form action="{{route('update task state',['task'=>$task])}}" method="POST" id="form {{$task->id}}">
						{{method_field('PATCH')}}
	    				{{ csrf_field() }}
						<input type="hidden" name="task_state_id" value="2">
						<a  href="javascript:{}" onclick="document.getElementById('form {{$task->id}}').submit(); return false;">mover a iniciadas</a>
					</form>
				</td>
			</tr>
		@endif
	@endforeach
@endsection