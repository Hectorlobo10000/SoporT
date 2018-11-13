@extends('layouts.app4')

@section('title','Editar lugar')

@section('content')
<h1>Editar lugar</h1>
  <form method="post" action="{{action('PlaceController@update',$lugare->id)}}">
	@csrf
	@method('PUT')
	<label>Nombre:</label>
	<input type="text" name="name" value="{{$lugare->name}}">
    <button type="submit" class="btn btn-info">Modificar</button>
   </form>

@endsection