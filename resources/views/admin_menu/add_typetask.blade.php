@extends('layouts.app4')

@section('title','Agregar usuario')

@section('content')
<form class="form" method="post" action="{{route('actividades.store')}}">
    @csrf
    <h1>Agregar Tipos De Actividades</h1>
    <label>Nombre:</label>
    <input type="text" name="name" class="formulario">
     @if($errors->has('name'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('name')}}</span>
    </div>
    @endif
    <button type="submit" class="btn btn-primary">Crear</button>
</form>
@endsection