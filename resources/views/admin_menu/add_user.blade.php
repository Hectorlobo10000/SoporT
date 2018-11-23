@extends('layouts.app4')

@section('title','Agregar usuario')
@section('return')
    {{route('usuarios.index')}}
@endsection
@section('content')
<h1>Agregar usuario</h1>
</script>
  <form class="form" method="post" action="{{route('usuarios.store')}}">
	@csrf
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

    @if($errors->has('pass'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('pass')}}</span>
    </div>
    @endif

	<label>Lugar:</label>
	<select class="form-control" name="place_id">
    @foreach($lugares as $lugar)
     <option value="{{$lugar->id}}" >{{$lugar->domain.' | '.$lugar->municipality.' | '.$lugar->address}}</option>
    @endforeach
    </select>
    @if($errors->has('place_id'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('place_id')}}</span>
    </div>
    @endif

    <label>Rol:</label>
    <select class="form-control" id="role_id" name="role_id">
    @foreach($roles as $role)
     <option value="{{$role->id}}" >{{$role->name}}</option>
    @endforeach
    </select>
    @if($errors->has('role_id'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('role_id')}}</span>
    </div>
    @endif

    <label>Departamento:</label>
	<select class="form-control" name="department_id">
	@foreach($departamentos as $departamento)
     <option value="{{$departamento->id}}">{{$departamento->name}}</option>
    @endforeach
    </select>
    @if($errors->has('department_id'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('department_id')}}</span>
    </div>
    @endif
    <div id="tipos-actividad">
        <label>Tipos de actividades (Solo para técnicos):</label>
        @foreach($tipos as $tipo)
        <label>
            <input type="checkbox" name="tipoact[]" class="tp" value="{{$tipo->id}}">  {{$tipo->name}}
        </label>
        @endforeach
         @if($errors->has('tipoact[]'))
        <div class="alert alert-danger">
            <span>{{ $errors->first('tipoact[]')}}</span>
        </div>
        @endif
    </div>
    <button class="btn btn-normal" type="submit">Crear</button>
</form>
@endsection