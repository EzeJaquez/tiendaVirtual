@extends('layout.master')
@section('titulo','lista de pedidos')
@section('seccion','detalle pedido')
@section('content')
<div class="pedido_user">
    <table class="table table-hover">
        <tr class="encabezado">
            <th></th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio detalle</th>
        </tr>
        @forelse($detalles_info as $detalle)
            <tr>
                <td><img width="50" src="{{URL::asset('images/'.$detalle->imagen)}}"/></td>
                <td>{{ $detalle->nombre}}</td> 
                <td>{{ $detalle->precio}}</td>
                <td>{{ $detalle->cantidad}}</td>
                <td>{{($detalle->precio * $detalle->cantidad)}}</td>
            <tr>
        @empty  
            <div>No hay proyectos para mostrar </div>
        @endforelse
    </table>
    <div><strong>Precio total:</strong> <span class="pintar_precio">{{$precio}}€</span></div>
    <a class="btn btn-secondary" href="{{ route('admin-pedidos.index') }}">volver</a>
</div>
@stop