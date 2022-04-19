@extends('layout.master_admin')
@section('titulo','Admin-categoria')
@section('seccion','Editar Categoria')
@section('content')
<form method="POST" action="{{ route('admin-categoria.update',$categoria) }}">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="nombre">Nombre de la categoria</label>
        <input  type="text" name="nombre" class="form-control" value="{{$categoria->nombre}}" required> 
    </div>
    <div class="form-group">
        <label for="slug">slug de la categoria</label>
        <input  type="text" name="slug" class="form-control" value="{{$categoria->slug}}" required> 
    </div>
    <div class="form-group">
        <label for="estado">Estado</label>
        <select name="estado" class="form-select" aria-label="Des/Activar categoria">
            <option value="activada">activar</option>
            <option value="desactivada">Desactivar</option>
        </select>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" class="form-control" rows="3" required>{{$categoria->descripcion}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button> <a href="{{route('admin-categoria.index')}}">volver</a>
</form>


@stop