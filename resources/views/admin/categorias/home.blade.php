@extends('layout.master_admin')
@section('titulo','Admin-Categorias')
@section('seccion','Administrar Categorias')
@section('content')
<?php use App\Http\Controllers\CategoriaController ?>
<form method="POST" action="{{ route('admin-categoria.filtro') }}">
    @csrf
    <div class="form-group buscador_admin">
        <input name= "buscador" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busca</button>
        @if($filtro)
            <a class="btn btn-info" href="{{ route('admin-categoria.index') }} ">mostrar todo</a>
        @endif
    </div>
</form>

<table class="table table-hover">
    <tr class="encabezado">
        <th scope="col">Nombre</th>
        <th scope="col">Slug</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Estado</th>
        <th scope="col">editar</th>
    </tr>
    @forelse($categorias_info as $categoria)
        <tr>
            <td>{{ $categoria->nombre}}</td> 
            <td>{{ $categoria->slug}}</td>
            <td>{{ $categoria->descripcion}}</td>
            <td>{{ $categoria->estado}}</td>
            <td class="icon"><a href="{{ route('admin-categoria.edit', $categoria->id) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
        <tr>
    @empty  
        <div>No hay proyectos para mostrar </div>
    @endforelse
</table>
<a class="btn btn-secondary" href="{{ route('admin-categoria.create') }}">Añadir categoria</a>
@stop