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
	<th>Historial de solicitudes</th>
	<th>Borrar</th>
</tr>
@endsection

@section('content')
	@foreach($task_logs as $task_log)
		@if(Auth::id()==$task_log->task->client_id)
			<tr>
				<td>
					La solicitud {{'000'.$task_log->task_id}} paso a estar {{$task_log->task_state->name}}. Fecha: {{$task_log->created_at}}
				</td>
				<td>
					<form method="post" action="{{route('task_logs.destroy',$task_log->id)}}">
						@csrf
						@method('DELETE')
						<button type="submit" style="width: 100%">X</button>
				    </form>
				</td>
			</tr>
		@endif
	@endforeach
@endsection

