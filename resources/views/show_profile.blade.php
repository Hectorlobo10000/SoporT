@extends('layouts.app4')

@section('title','Mi perfil')
@section('return')
@if(url()->previous()== route('edit.profile',Auth::id()))
    {{route('home')}}
@else
    {{url()->previous()}}
@endif
@endsection
@section('header','Mi perfil')
@section('content')
<div class="form">
    <div style="float: right">
    <a class="edit-link" href="{{route('edit.profile',$usuario->id)}}">Editar</a>
    </div>
        <br>

    <label>Nombre:</label>
    <text  class="formulario" readonly >{{$usuario->name}}</text>


    <label>Teléfono:</label>
    <text  class="formulario" readonly >{{$usuario->phone}}</text>


    <label>Correo:</label>
    <text  class="formulario" readonly >{{$usuario->email}}</text>

    <label>Departamento:</label>
    <text  class="formulario" readonly >{{$usuario->email}}</text>

    <label>Lugar asignado:</label>
    <text  class="formulario" readonly >{{$usuario->place->domain.' | '.$usuario->place->municipality.' | '.$usuario->place->address}}</text>

    <label>Rol:</label>
    <text  class="formulario" readonly >{{$usuario->role->name}}</text>



</div>

@endsection