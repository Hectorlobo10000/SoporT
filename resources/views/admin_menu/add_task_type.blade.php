@extends('layouts.app4')

@section('title','Agregar usuario')

@section('content')
<h1>Agregar actividad</h1>
<form class="form" method="post" action="{{route('actividades.store')}}">
    @csrf
    <label>Nombre:</label>
    <input type="text" name="name" class="formulario">
     @if($errors->has('name'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('name')}}</span>
    </div>
    @endif
    <button type="submit" class="btn btn-normal">Crear</button>
</form>
@endsection