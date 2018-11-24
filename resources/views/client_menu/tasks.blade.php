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
	<th width="50px">Chat</th>
	<th width="80px">Verificar</th>
	<th width="80px">Modificar</th>
	<th width="80px">Eliminar</th>
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
				<td><a class="btn-chat btn btn-success" href="{{route('chat.index',$task->id)}}"></a></td>
				@if($task->task_state_id==3)
				<td>
					<form action="{{route('verify.task',['task'=>$task])}}" method="POST" id="form {{$task->id}}">
						{{method_field('PATCH')}}
	    				{{ csrf_field() }}
						<input type="hidden" name="task_state_id" value="4">
						<a class="btn-verify btn btn-success" href="javascript:{}" onclick="AlertaVerificar()"></a>
					</form>
				</td>
				@else
					<td><div class="action-denied"></div></td>
				@endif
				@if($task->task_state_id == 1)
					<td><a class="btn-edit btn btn-success" href="{{route('tasks.edit',$task->id)}}"></a></td>
					<td>
						<form method="post" action="{{route('tasks.destroy',$task->id)}}">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn-delete btn btn-danger"></button>
					    </form>
					</td>
				@else
					<td><div class="action-denied"></div></td>
					<td><div class="action-denied"></div></td>
				@endif

			</tr>
		@endif
	@endforeach
@endsection
@section('btn add')
<a class="btn btn-normal" href="{{route('tasks.create')}}">Crear Solicitud</a>
<script type="text/javascript">
function AlertaVerificar() {
	var answer = confirm ("Esta acción no se puede revertir. Seguro que quiere verificar esta tarea?")
	if (answer)
	document.getElementById('form {{$task->id}}').submit(); return false;
}
</script>
@endsection


