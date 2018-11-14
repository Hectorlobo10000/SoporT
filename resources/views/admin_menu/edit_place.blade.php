@extends('layouts.app4')

@section('title','Editar lugar')

@section('content')
<h1>Editar lugar</h1>
  <form method="post" action="{{action('PlaceController@update',$lugare->id)}}">
	@csrf
	@method('PUT')
	<label>Departamento:</label>
	<input type="text" name="domain" value="{{$lugare->domain}}" class="formulario">

	<label for="municipality">Municipio:</label>
	<input type="text" name="municipality" value="{{$lugare->municipality}}" class="formulario">

	<label>Dirección:</label>
	<input type="text" name="address" value="{{$lugare->address}}" class="formulario">

    <button type="submit" class="btn btn-info">Modificar</button>
   </form>

@endsection