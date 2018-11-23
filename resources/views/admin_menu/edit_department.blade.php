@extends('layouts.app4')

@section('title','Editar departamento')
@section('return')
    {{route('departamentos.index')}}
@endsection
@section('content')
<h1>Editar departamento</h1>
  <form class="form" method="post" action="{{action('DepartmentController@update',$departamento->id)}}">
	@csrf
	@method('PUT')
	<label>Nombre de departamento:</label>
	<input type="text" name="name" class="formulario" value="{{$departamento->name}}">
	@if($errors->has('name'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('name')}}</span>
    </div>
    @endif
    <button type="submit" class="btn btn-normal">Modificar</button>
</form>

@endsection