@extends('layouts.app4')

@section('title','Agregar usuario')

@section('content')
<h1>Agregar departamento</h1>
<form class="form" method="post" action="{{route('departamentos.store')}}">
    @csrf
     @if($errors->has('name'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('name')}}</span>
    </div>
    @endif
    <label>Nombre de departamento:</label>
    <input type="text" name="name" class="formulario">
    <button type="submit" class="btn btn-normal">Crear</button>
</form>

@endsection