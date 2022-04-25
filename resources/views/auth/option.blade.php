@extends('layout.master')
@section('titulo', auth()->user()->name)
@section('seccion', auth()->user()->name)
@section('content')

<div><a href="{{route('perfil.edit')}}" > Editar perfil</a></div>
<div><a href="{{route('perfil.pedidos')}}">Pedidos</a></div>

@stop