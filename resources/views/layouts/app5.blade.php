@extends('layouts.app4')
@section('return')
@if(url()==route('usuarios.show',$user->id))
    @if(url()->previous() == route('usuarios.edit',$user->id) || url()->previous() == route('usuarios.show',$user->id))
    {{ route('home') }}
    @else
    {{ url()->previous() }}
    @endif
@else
    @if(url()->previous() == route('edit.profile',$user->id) || url()->previous() == route('show.profile',$user->id))
    {{ route('home') }}
    @else
    {{ url()->previous() }}
    @endif
@endif
@endsection
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
    @if($user->role_id == 2)
    <label>Tipos de actividades asignadas:</label>
    <ul style="margin-left:20px;">
        @foreach($user->task_types()->get() as $task_type)
            <li>{{ $task_type->name }}</li>
        @endforeach
    </ul>
    @endif
    <div style="float: right">
        <a class="btn-edit btn btn-success" href=@yield('edit route')></a>
    </div>
</div>
@endsection