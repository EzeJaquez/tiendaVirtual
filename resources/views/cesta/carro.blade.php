@extends('layout.master')
@section('titulo','Carrito')
@section('seccion','carrito')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 bg-light">
            @if (count(Cart::getContent()))
                <table class="table table-striped">
                    <thead>
                        <th></th>
                        <th>Nombre</th>
                        <th>Precio unitario</th>
                        <th>Cantidad</th>
                        <th>Precio producto</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                        <input type="hidden" name="total" value="{{$total = 0}}"></input>
                        <input type="hidden" name="cont" value="{{$cont = 0}}"></input>
                        @foreach (Cart::getContent() as $item)
                            
                            <tr>
                                <td><img width="50" src="{{URL::asset('images/'.$item->attributes->imagen)}}"/></td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->attributes->cantidad}}</td>
                                <td>{{($item->price * $item->attributes->cantidad)}}</td>
                                <td><a href="{{route('producto-info',['producto' => $item->id, 'cantidad' => $item->attributes->cantidad, 'accion' => 'edit'])}}" ><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td>
                                    <form action="{{route('cart.removeitem')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <button type="submit" class="btn btn-link btn-sm text-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <input type="hidden" name="cont" value="{{$cont += 1}}"></input>
                            <input type="hidden" name="total" value="{{$total += ($item->price * $item->attributes->cantidad)}}"></input>
                        @endforeach
                    </tbody>
                </table>
                <div><span><b>Precio total: </b></span> {{$total}}€</div>
                <div class="form_compra_btn">
                    <form action="{{route('cart.clear')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link btn-sm text-danger">Vaciar carrito</button>
                    </form>
                    @auth
                        <form action="{{route('cart.confirmar_compra')}}" method="POST">
                            @csrf
                            <input type="hidden" name="total" value="{{$total}}">
                            <button type="submit" class="btn btn-success">Comprar</button>
                        </form>
                    @endauth
                </div>
            @else
                <p>Carrito vacio</p>
            @endif
        </div>
       
    </div>
</div>
@endsection