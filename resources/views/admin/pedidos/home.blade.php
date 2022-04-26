@extends('layout.master_admin')
@section('titulo','Home-admin')

@section('content')
<div class="pedido_user">
    <table class="table table-hover">
        <tr class="encabezado">
            <th scope="col">Id pedido</th>
            <th scope="col">Id Usuario</th>
            <th scope="col">Nombre usuario</th>
            <th scope="col">Precio</th>
            <th scope="col">Estado</th>
            <th scope="col">Editar</th>
            <th scope="col">Detalle</th>
        </tr>
        @forelse($pedidos_info as $pedido)
            <tr>
                <td>{{ $pedido->id}}</td> 
                <td>{{ $pedido->usuario_id}}</td> 
                <td>{{ $pedido->nombre_usu}}</td> 
                <td>{{ $pedido->precio_total}}</td>
                <td>{{ $pedido->estado}}</td>
                <td><a href="{{route('admin-pedidos.edit',$pedido)}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td class="icon"><a href="{{ route('admin-pedidos.detalle', ['pedido' => $pedido->id,'precio_total' => $pedido->precio_total]) }}"><i class="fa-solid fa-circle-plus"></i></a></td>
            <tr>
        @empty  
            <div>No hay pedidos para mostrar </div>
        @endforelse
    </table>
</div>
@stop