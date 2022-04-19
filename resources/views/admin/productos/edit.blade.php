@extends('layout.master_admin')
@section('titulo','Admin-productos')
@section('seccion','Editar Productos')
@section('content')

<form method="POST" action="{{ route('admin-producto.update',$producto)  }}">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input  type="text" name="nombre" class="form-control" value="{{$producto->nombre}}" required> 
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input  type="text" name="slug" class="form-control" value="{{$producto->slug}}" required> 
    </div>
    <div class="form-group">
        <label for="categoria_id">Categoria</label>
        <select name="categoria_id" class="form-select" aria-label="Categorias productos" required>
            <option value="" selected>------</option>
        @forelse($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
        @empty  
            <option value="NULL">Sin categoria</option>
        @endforelse
        </select>
    </div>
    <div class="form-group">
        <label for="estado">Estado</label>
        <select name="estado" class="form-select" aria-label="Des/Activar categoria" required>
            <option value="" selected>------</option>    
            <option value="activado">activar</option>
            <option value="desactivado">Desactivar</option>
        </select>
    </div>
    <div class="form-group">
        <label for="precio">Precio</label>
        <input name="precio" type="number"class="form-control" step="0.01" value="{{$producto->precio}}" required/> 
    </div>
    <div class="form-group">
        <label for="stock">Stock</label>
        <input name="stock" type="number" step="1" class="form-control" value="{{$producto->stock}}" required/> 
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" class="form-control" rows="3" required>{{$producto->descripcion}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Añadir producto</button> <a href="{{route('admin-producto.index')}}">volver</a>
</form>


@stop