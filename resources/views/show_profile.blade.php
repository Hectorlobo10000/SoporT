@extends('layouts.app4')
@section('title','Mi perfil')
@section('return')
@if(url()->previous()== route('edit.profile',Auth::id()))
{{ route('home') }}
@else
{{ url()->previous() }}
@endif
@endsection
@section('header','Mi perfil')
@section('content')
<div class="form-md">
    <label>Nombre:</label>
    <text  class="formulario" readonly >{{ $usuario->name }}</text>
    <label>Teléfono:</label>
    <text  class="formulario" readonly >{{ $usuario->phone }}</text>
    <label>Correo:</label>
    <text  class="formulario" readonly >{{ $usuario->email }}</text>
    <label>Departamento:</label>
    <text  class="formulario" readonly >{{ $usuario->email }}</text>
    <label>Lugar asignado:</label>
    <text  class="formulario" readonly >{{ $usuario->place->domain.' | '.$usuario->place->municipality.' | '.$usuario->place->address }}</text>
    <label>Rol:</label>
    <text  class="formulario" readonly >{{ $usuario->role->name }}</text>
    <div style="float: right">
        <a class="btn-edit btn btn-success" href="{{ route('edit.profile',$usuario->id) }}"></a>
    </div>
    <br><br>
</div>
@endsection