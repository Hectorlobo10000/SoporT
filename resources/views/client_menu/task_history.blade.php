@extends('layouts.app3')
@section('title','Cliente')
@section('menu')
<li>
	<a href="{{ route('tasks.index') }}">Solicitudes</a>
</li>
<li>
	<a href="{{ route('tasks.history') }}">Historial</a>
</li>
@endsection
@section('header')
<tr>
	<th>Historial de solicitudes</th>
	<th width="80px">Borrar</th>
</tr>
@endsection
@section('content')
@foreach($task_logs as $task_log)
@if(Auth::id()==$task_log->task->client_id)
<tr>
	@if(Auth::id()==$task_log->user_id)
	<td>
		Has creado la solicitud {{ '000'.$task_log->task_id }}. Fecha: {{ $task_log->created_at }}
	</td>
	@else
	<td>
		{{ $task_log->user->name }} cambió el estado de la solicitud {{ '000'.$task_log->task_id }} a {{ $task_log->task_state->name }}. Fecha: {{ $task_log->created_at }}
	</td>
	@endif
	<td>
		<form method="post" action="{{ route('task_logs.destroy',$task_log->id) }}">
			@csrf
			@method('DELETE')
			<button type="submit" class="btn-delete btn btn-danger"></button>
		</form>
	</td>
</tr>
@endif
@endforeach
@endsection