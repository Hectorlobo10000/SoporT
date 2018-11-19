@extends('layouts.app4')

@section('title','Agregar usuario')

@section('content')
  <form method="post" action="{{route('usuarios.store')}}">
	@csrf
	<h1>Agregar Usuario</h1>

	<label>Nombre:</label>
	<input type="text" name="name" class="formulario" value="{{old('name')}}">

    @if($errors->has('name'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('name')}}</span>
    </div>
    @endif

	<label>Teléfono:</label>
	<input type="text" name="phone" class="formulario" value="{{old('phone')}}">

    @if($errors->has('phone'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('phone')}}</span>
    </div>
    @endif

	<label>Correo:</label>
	<input type="email" name="email" class="formulario" value="{{old('email')}}">

    @if($errors->has('email'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('email')}}</span>
    </div>
    @endif

	<label>Contraseña:</label>
	<input type="password" name="pass" class="formulario">

     @if($errors->has('password'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('password')}}</span>
    </div>
    @endif

	<label>Lugar:</label>
	<select class="form-control" name="lugares">
    @foreach($lugares as $lugar)
     <option>{{$lugar->domain}},{{$lugar->municipality}},{{$lugar->address}}</option>
    @endforeach
    </select>

    <label>Rol:</label>
    <select class="form-control" name="roles">
    @foreach($roles as $role)
     <option>{{$role->name}}</option>
    @endforeach
    </select>

    <label>Departamento:</label>
	<select class="form-control" name="dept">
	@foreach($departamentos as $departamento)
     <option>{{$departamento->name}}</option>
    @endforeach
    </select>

    <label>Tipos de actividades (Solo para técnicos):</label>
    @foreach($tipos as $tipo)
    <label>
    	<input type="checkbox" name="tipoact[]" class="tp" value="{{$tipo->id}}">  {{$tipo->name}}
    </label>
    @endforeach

    <button class="btn btn-primary" type="submit">Crear</button>
</form>

@endsection