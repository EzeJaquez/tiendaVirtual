@extends('layout.master_admin')
@section('titulo','Admin-categoria')
@section('seccion','Registrar Categoria')
@section('content')
<form method="POST" action="{{ route('admin-categoria.store') }}">
    @csrf
    <div class="form-group">
        <label for="nombre">Nombre de la categoria</label>
        <input  type="text" name="nombre" class="form-control" required> 
    </div>
    <div class="form-group">
        <label for="slug">slug de la categoria</label>
        <input  type="text" name="slug" class="form-control" required> 
    </div>
    <div class="form-group">
        <label for="estado">Estado</label>
        <select name="estado" class="form-select" aria-label="Des/Activar categoria" required>
            <option value="activada">activar</option>
            <option value="desactivada">Desactivar</option>
        </select>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" class="form-control" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Añadir Categoria</button> <a href="{{route('admin-categoria.index')}}">volver</a>
</form>


@stop