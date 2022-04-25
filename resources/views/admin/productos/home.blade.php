@extends('layout.master_admin')
@section('titulo','Admin-productos')
@section('seccion','Administrar Productos')
@section('content')
<form class="" method="POST" action="{{ route('admin-producto.filtro') }}">
    @csrf
    <div class="form-group buscador_admin">
        <input name= "buscador" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busca</button>
        @if($filtro)
            <a class="btn btn-info" href="{{ route('admin-producto.index') }} ">mostrar todo</a>
        @endif
    </div>
</form>

<table class="table table-hover">
    <tr class="encabezado">
        <th scope="col">imagen</th>
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
            <td><img width="50" src="{{URL::asset('images/'.$producto->imagen)}}"/></td> 
            <td>{{$producto->nombre}}</td> 
            <td>{{ $producto->slug}}</td>
            <td>{{ $producto->cat_nombre}}</td>
            <td>{{ $producto->descripcion}}</td>
            <td>{{ $producto->precio}}</td>
            <td>{{ $producto->stock}}</td>
            <td>{{ $producto->estado}}</td>
            <td class="icon"><a href="{{ route('admin-producto.edit', $producto->id) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
        <tr>
    @empty  
        <div>No hay proyectos para mostrar </div>
    @endforelse
</table>
<a class="btn btn-secondary" href="{{ route('admin-producto.create') }}">Añadir producto</a>
@stop