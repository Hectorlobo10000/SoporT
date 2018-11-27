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
    <textfield  class="formulario" readonly >{{ $user->name }}</textfield>
    <label>Teléfono:</label>
    <textfield  class="formulario" readonly >{{ $user->phone }}</textfield>
    <label>Correo:</label>
    <textfield  class="formulario" readonly >{{ $user->email }}</textfield>
    <label>Departamento:</label>
    <textfield  class="formulario" readonly >{{ $user->department->name }}</textfield>
    <label>Lugar asignado:</label>
    <textfield  class="formulario" readonly >{{ $user->place->domain.' | '.$user->place->municipality.' | '.$user->place->address }}</textfield>
    <label>Rol:</label>
    <textfield  class="formulario" readonly >{{ $user->role->name }}</textfield>
    <div style="float: right">
        <a class="btn-edit btn btn-success" href="{{ route('edit.profile',$user->id) }}"></a>
    </div>
</div>
@endsection