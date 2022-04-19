@extends('layout.master_admin')
@section('titulo','Admin-Categorias')
@section('seccion','Administrar Categorias')
@section('content')
<?php use App\Http\Controllers\CategoriaController ?>
<form method="POST" action="{{ route('admin-categoria.orden') }}">
    @csrf
    <div class="form-group">
        <label for="ordenar">Ordenar por </label>
        <select name="estado" class="form-select" aria-label="Des/Activar categoria" required>
            <option value="ASC">Activadas</option>
            <option value="DESC">Desactivadas</option>
        </select>
        <button type="submit" class="btn btn-primary">ordenar</button>
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
<a href="{{ route('admin-categoria.create') }}">Añadir categoria</a>
@stop