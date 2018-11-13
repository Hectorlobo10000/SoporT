
@extends('layouts.app1')
@section('content')
<div id="me-seccion-4">
	<br><br>
	<h3>Anotaciones de la tarea {{$task->id}}:</h3>
	<form action="{{route('update task annotation',['task'=>$task])}}" method="POST">
	    {{method_field('PATCH')}}
	    {{ csrf_field() }}
	    <textarea maxlength="800" name="annotation">{{$task->annotation}}</textarea>
	    <br>
	    <button class="btn btn-dark" type="submit">Confirmar edición</button>
	</form>
</div>
@endsection