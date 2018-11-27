@extends('layouts/app5')
@section('title','Info. de usuario')
@section('header','Información de '.$user->name)
@section('edit route',route('usuarios.edit',$user->id))