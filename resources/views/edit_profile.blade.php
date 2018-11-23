@extends('layouts.app4')

@section('title','Editar perfil')
@section('return')
    {{route('show.profile',$usuario->id)}}
@endsection
@section('content')
<h1>Editar perfil</h1>
  <form class="form" method="post" action="{{route('usuarios.update',$usuario->id)}}">
	@csrf
	@method('PUT')

	<label>Nombre:</label>
	<input type="text" name="name" class="formulario" value="{{$usuario->name}}">

    @if($errors->has('name'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('name')}}</span>
    </div>
    @endif

	<label>Teléfono:</label>
	<input type="text" name="phone" class="formulario" value="{{$usuario->phone}}">

    @if($errors->has('phone'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('phone')}}</span>
    </div>
    @endif

	<label>Correo:</label>
	<input type="email" name="email" class="formulario" value="{{$usuario->email}}">

    @if($errors->has('email'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('email')}}</span>
    </div>
    @endif

    <button class="btn btn-normal" type="submit">Modificar</button>
</form>

@endsection