@extends('layouts.app4')

@section('title','Editar lugar')

@section('content')
<h1>Editar lugar</h1>
  <form class="form" method="post" action="{{action('PlaceController@update',$lugare->id)}}">
	@csrf
	@method('PUT')
        <h1>Editar Lugar</h1>
	<label>Departamento:</label>
	<input type="text" name="domain" value="{{$lugare->domain}}" class="formulario">
	@if($errors->has('domain'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('domain')}}</span>
    </div>
    @endif


	<label for="municipality">Municipio:</label>
	<input type="text" name="municipality" value="{{$lugare->municipality}}" class="formulario">
	@if($errors->has('municipality'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('municipality')}}</span>
    </div>
    @endif

	<label>Dirección:</label>
	<input type="text" name="address" value="{{$lugare->address}}" class="formulario">
	@if($errors->has('address'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('addrees')}}</span>
    </div>
    @endif

    <button type="submit" class="btn btn-info">Modificar</button>
   </form>

@endsection