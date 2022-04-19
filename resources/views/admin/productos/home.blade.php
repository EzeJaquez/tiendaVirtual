@extends('layout.master_admin')
@section('titulo','Admin-productos')
@section('seccion','Administrar Productos')
@section('content')
<?php use App\Http\Controllers\ProductoController ?>
<!-- 
<form method="POST" action="{{ route('admin-producto.orden') }}">
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
-->

<table class="table table-hover">
    <tr class="encabezado">
        <th scope="col">Nombre</th>
        <th scope="col">Slug</th>
        <th scope="col">Categoria</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Precio</th>
        <th scope="col">Stock</th>
        <th scope="col">Estado</th>
        <th scope="col">editar</th>
    </tr>
    @forelse($info_productos as $producto)
        <tr>
            <td>{{$producto->pro_nombre}}</td> 
            <td>{{ $producto->pro_slug}}</td>
            <td>{{ $producto->cat_nombre}}</td>
            <td>{{ $producto->pro_descripcion}}</td>
            <td>{{ $producto->pro_precio}}</td>
            <td>{{ $producto->pro_stock}}</td>
            <td>{{ $producto->pro_estado}}</td>
            <td class="icon"><a href="{{ route('admin-producto.edit', $producto->pro_id) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
        <tr>
    @empty  
        <div>No hay proyectos para mostrar </div>
    @endforelse
</table>
<a href="{{ route('admin-producto.create') }}">Añadir producto</a>
@stop