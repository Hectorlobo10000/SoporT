@extends('layouts/app4')
@section('title','Chat')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/chat.css')}}">
<h1>Tarea {{'000'.$task->id}}</h1>
<div class="container container-chat">
	@if(Auth::user()->role_id==2)
		<div class="chatting-with"><h4 style="margin: 5px; color: #FFFFFF">Chateando con {{$task->client->name}}</h4></div>
	@elseif(Auth::user()->role_id==3)
		<div class="chatting-with"><h4 style="margin: 5px; color: #FFFFFF">Chateando con {{$task->technician->name}}</h4></div>
	@endif
	<div class="chat" id="chat" onLoad="window.scroll(0, 150)">
		@foreach($task_messages as $task_message)
			@if($task_message->task_id == $task->id)
				@if(Auth::id()==$task_message->user_id)
					<div class="message-container-sender">
						<div class="message-div-sender">
							<div class="row">
								<div class="col">
									<p  class="message">{{$task_message->content}}</p>
								</div>
								<div class="col-1">
									<span class="time-sender">{{substr($task_message->created_at,11,-3)}}</span>
								</div>
								<span class="message-triangle-sender"></span>
							</div>
						</div>
						<br>
					</div>
				@elseif(Auth::id()==$task_message->task->technician_id || Auth::id()==$task_message->task->client_id)
					<div class="message-container-receiver">
						<div class="message-div-receiver">
							<div class="row">
								<span class="message-triangle-receiver"></span>
								<div class="col">
									<p  class="message">{{$task_message->content}}</p>
								</div>
								<div class="col-1">
									<span class="time-receiver">{{substr($task_message->created_at,11,-3)}}</span>
								</div>
							</div>
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
					<textarea  class="form2" maxlength="1000" name="content" placeholder="Escribe un mensaje aqui..."></textarea>
				</div>
				<div class="col-1">
					<input type="hidden" name="task_id" value="{{$task->id}}">
					<a href="javascript:{}" onclick="document.getElementById('form-message').submit(); return false;" class="btn-enviar"></a>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	var objDiv = document.getElementById("chat");
objDiv.scrollTop = objDiv.scrollHeight;
</script>
@endsection
