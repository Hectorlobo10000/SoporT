@extends('layouts.app4')
@section('title','Agregar usuario')
@section('return')
{{ route('usuarios.index') }}
@endsection
@section('header','Agregar usuario')
@section('content')
</script>
<form class="form-md" method="post" action="{{ route('usuarios.store') }}" id="form">
    @csrf
    <label>Nombre:</label>
    <input type="text" name="name" class="formulario" value="{{ old('name') }}">
    @if($errors->has('name'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('name') }}</span>
    </div>
    @endif
    <label>Teléfono:</label>
    <input type="text" name="phone" class="formulario" value="{{ old('phone') }}">
    @if($errors->has('phone'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('phone') }}</span>
    </div>
    @endif
    <label>Correo:</label>
    <input type="email" name="email" class="formulario" value="{{ old('email') }}">
    @if($errors->has('email'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('email') }}</span>
    </div>
    @endif
    <label>Contraseña:</label>
    <input type="password" name="pass" class="formulario">
    @if($errors->has('pass'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('pass') }}</span>
    </div>
    @endif
    <label>Lugar:</label>
    <select name="place_id">
        @foreach($lugares as $lugar)
        <option value="{{ $lugar->id }}" >{{ $lugar->domain.' | '.$lugar->municipality.' | '.$lugar->address }}</option>
        @endforeach
    </select>
    @if($errors->has('place_id'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('place_id') }}</span>
    </div>
    @endif
    <label>Rol:</label>
    <select id="roles" name="role_id" onchange="showHide(this)">
        @foreach($roles as $role)
        <option value="{{ $role->id }}" >{{ $role->name }}</option>
        @endforeach
    </select>
    @if($errors->has('role_id'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('role_id') }}</span>
    </div>
    @endif
    <label>Departamento:</label>
    <select name="department_id" style="margin-bottom: 30px">
        @foreach($departamentos as $departamento)
        <option value="{{ $departamento->id }}">{{ $departamento->name }}</option>
        @endforeach
    </select>
    @if($errors->has('department_id'))
    <div class="alert alert-danger">
        <span>{{ $errors->first('department_id') }}</span>
    </div>
    @endif
    <div id="div2" style="display: none">
        <label>Tipos de actividades (Solo para técnicos):</label>
        <table  style="margin-left: 20px">
            @foreach($tipos as $tipo)
            <tr>
                <td>
                    <input type="checkbox" name="tipoact[]" class="tp" value="{{ $tipo->id }}">
                </td>
                <td>{{ $tipo->name }}</td>
            </tr>
            @endforeach
        </table>
        @if($errors->has('tipoact[]'))
        <div class="alert alert-danger">
            <span>{{ $errors->first('tipoact[]') }}</span>
        </div>
        @endif
    </div>
    <button class="btn-agregar btn btn-normal" type="submit">Crear</button>
</form>

<script>
function showHide(elem) {
    if(elem.value == 2) {

        document.getElementById('div2').style.display = 'block';
    }else{
        document.getElementById('div2').style.display = 'none';

    }
}
</script>

@endsection