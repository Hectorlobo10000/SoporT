@extends('layouts.app4')

@section('title','Agregar usuario')

@section('content')
<h1>Agregar lugar</h1>
<form class="form" method="post" action="{{route('lugares.store')}}">
    @csrf
    <label>Departamento:</label>
    <input type="text" name="domain" class="formulario">
     @if($errors->has('domain'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('domain')}}</span>
    </div>
    @endif

    <label for="municipality">Municipio:</label>
    <input type="text" name="municipality" class="formulario">
    @if($errors->has('municipality'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('municipality')}}</span>
    </div>
    @endif

    <label>Dirección:</label>
    <input type="text" name="address" class="formulario">
     @if($errors->has('address'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('address')}}</span>
    </div>
    @endif

    <button type="submit" class="btn btn-normal">Crear</button>
</form>
@endsection