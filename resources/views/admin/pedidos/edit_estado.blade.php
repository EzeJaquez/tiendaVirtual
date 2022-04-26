@extends('layout.master_admin')
@section('titulo','Home-admin')

@section('content')
<form method="POST" action="{{ route('admin-pedidos.update',$pedido) }}">
    @csrf
    @method('PATCH')
    <div class="form-group">    
        <label for="estado">Estado</label>
        <select name="estado" class="form-select" aria-label="Des/Activar categoria">
            <option value="{{$pedido->estado}}" selected>{{$pedido->estado}}</option>
            <option value="pendent">Pendent</option>
            <option value="enviat">Enviat</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button> 
    <a href="{{route('admin-pedidos.index')}}">volver</a>
</form>
@stop