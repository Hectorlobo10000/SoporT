@extends('layouts/app4')
@section('title','Chat')
@section('content')
<h1>Tarea {{'000'.$task->id}}</h1>
<div class="container" style="background-color: #CCCCCC;border-radius: 10px;
  border : 2px solid grey;">
	@if(Auth::user()->role_id==2)
		<div class="chateando-con"><p style="margin: 5px">Chateando con {{$task->client->name}}</p></div>
	@elseif(Auth::user()->role_id==3)
		<div class="chateando-con">Chateando con {{$task->technician->name}}</div>
	@endif
	<div class="chat">
		@foreach($task_messages as $task_message)
			@if($task_message->task_id == $task->id)
				@if(Auth::id()==$task_message->user_id)
				<div style="">
					<div class="mensaje-div-sender">
						<p  class="mensaje">{{$task_message->content}}</p>
					</div><br>
				</div>

				@elseif(Auth::id()==$task_message->task->technician_id || Auth::id()==$task_message->task->client_id)
					<div class="mensaje-div-receiver">
						<p class="mensaje">{{$task_message->content}}</p>
					</div><br>
				@endif
			@endif
		@endforeach
	</div>
	<div>
		<form id="formulario mensaje" class="area-escribir-chat" action="{{route('chat.store')}}" method="post">
			@csrf
			<div class="row">
				<div class="col-11" style="margin-right:  -20px">
					<textarea  class="formulario2" name="content" placeholder="Escribe un mensaje aqui..."></textarea>
				</div>
				<div class="col-1">
					<input type="hidden" name="task_id" value="{{$task->id}}">
					<a href="javascript:{}" onclick="document.getElementById('formulario mensaje').submit(); return false;" class="btn-enviar"></a>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
