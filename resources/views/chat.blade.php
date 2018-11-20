@extends('layouts/app4')
@section('title','Chat')
@section('content')
<h1>Tarea {{'000'.$task->id}}</h1>
<div class="container" style="background-color: #CCCCCC;border-radius: 10px;
  border : 2px solid grey;">
	@if(Auth::user()->role_id==2)
		<div class="chatting-with"><h4 style="margin: 5px; color: #696969">Chateando con {{$task->client->name}}</h4></div>
	@elseif(Auth::user()->role_id==3)
		<div class="chatting-with"><h4 style="margin: 5px; color: #696969">Chateando con {{$task->technician->name}}</h4></div>
	@endif
	<div class="chat">
		@foreach($task_messages as $task_message)
			@if($task_message->task_id == $task->id)
				@if(Auth::id()==$task_message->user_id)
					<div class="message-container-sender">
						<div class="message-div-sender">
							<p  class="message">{{$task_message->content}}</p>
						</div>
						<br>
					</div>
				@elseif(Auth::id()==$task_message->task->technician_id || Auth::id()==$task_message->task->client_id)
					<div class="message-container-receiver">
						<div class="message-div-receiver">
							<p  class="message">{{$task_message->content}}</p>
						</div>
						<br>
					</div>
				@endif
			@endif
		@endforeach
	</div>
	<div>
		<form id="form-message" class="chat-write-area" action="{{route('chat.store')}}" method="post">
			@csrf
			<div class="row">
				<div class="col-11" style="margin-right:  -20px">
					<textarea  class="form2" name="content" placeholder="Escribe un mensaje aqui..."></textarea>
				</div>
				<div class="col-1">
					<input type="hidden" name="task_id" value="{{$task->id}}">
					<a href="javascript:{}" onclick="document.getElementById('form-message').submit(); return false;" class="btn-enviar"></a>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
