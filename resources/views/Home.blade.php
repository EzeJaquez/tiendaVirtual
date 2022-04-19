<?php
 use App\Http\Controllers\HomeController;
?>
@extends('layout.master')
@section('titulo','Home')

@section('content')
<h3>Contenido de la pagina</h3>
<a href="{{route('admin-home')}}">Perfil administrador</a>
@stop