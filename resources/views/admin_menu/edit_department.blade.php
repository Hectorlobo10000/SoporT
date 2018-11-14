@extends('layouts.app4')

@section('title','Editar departamento')

@section('content')
<h1>Editar departamento</h1>
  <form method="post" action="{{action('DepartmentController@update',$departamento->id)}}">
	@csrf
	@method('PUT')
	<label>Nombre de departamento:</label>
	<input type="text" name="name" value="{{$departamento->name}}">
    <button type="submit" class="btn btn-info">Modificar</button>
</form>

@endsection