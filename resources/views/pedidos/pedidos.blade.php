@extends('layout.master')
@section('titulo','lista de pedidos')
@section('seccion','pedidos')
@section('content')
<div class="pedido_user">
    <table class="table table-hover">
        <tr class="encabezado">
            <th scope="col">Id pedido</th>
            <th scope="col">Precio</th>
            <th scope="col">Estado</th>
            <th scope="col">Detalle</th>
        </tr>
        @forelse($pedidos_info as $pedido)
            <tr>
                <td>{{ $pedido->id}}</td> 
                <td>{{ $pedido->precio_total}}</td>
                <td>{{ $pedido->estado}}</td>
                <td class="icon"><a href="{{ route('perfil.detalle', ['pedido' => $pedido->id,'precio_total' => $pedido->precio_total]) }}"><i class="fa-solid fa-circle-plus"></i></a></td>
            <tr>
        @empty  
            <div>No hay proyectos para mostrar </div>
        @endforelse
    </table>
</div>
@stop