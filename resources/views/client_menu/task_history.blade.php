@extends('layouts.app3')

@section('title','Cliente')
@section('menu')
<li>
	<a href="{{route('tasks.index')}}">Solicitudes</a>
</li>

<li>
	<a href="{{route('tasks.history')}}">Historial</a>
</li>

@endsection

