@extends('layouts.app4')
@section('title','Editar departamento')
@section('return')
{{ route('departamentos.index') }}
@endsection
@section('header','Editar departamento')
@section('content')
<form class="form-sm" method="post" action="{{ action('DepartmentController@update',$departamento->id) }}">
    @csrf
    @method('PUT')
    <label>Nombre de departamento:</label>
    <input type="text" name="name" class="formulario" value="{{ $departamento->name }}">
    @if($errors->has('name'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('name') }}</span>
    </div>
    @endif
    <button type="submit" class="btn-agregar btn btn-normal">Modificar</button>
</form>
@endsection