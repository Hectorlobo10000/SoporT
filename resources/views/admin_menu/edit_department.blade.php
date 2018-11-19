@extends('layouts.app4')

@section('title','Editar departamento')

@section('content')
<h1>Editar departamento</h1>
  <form method="post" action="{{action('DepartmentController@update',$departamento->id)}}">
	@csrf
	@method('PUT')
        <h1>Editar Departamento</h1>
	<label>Nombre de departamento:</label>
	<input type="text" name="name" class="formulario" value="{{$departamento->name}}">
	@if($errors->has('name'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('name')}}</span>
    </div>
    @endif
    <button type="submit" class="btn btn-info">Modificar</button>
</form>

@endsection