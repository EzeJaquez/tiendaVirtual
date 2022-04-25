@extends('layout.master')
@section('titulo','Home')
@section('seccion','Home')
@section('content')
    
    @forelse($info_producto as $producto)
    <div id="_producto">
        <div class="img_info_pro"><img width="250" src="{{URL::asset('images/'.$producto->imagen)}}"/></div>
        <div class="informacion_producto">
            <div id="dni_producto">
                <div class="nombre_pro"> {{$producto->nombre}}</div>
                <div class="subtitulo_cat">{{$producto->cat_nombre}}</div>
                <div class="pintar_precio">{{$producto->precio}}€</div>
            </div>
            <p id="descripcipn_producto">{{$producto->descripcion}}</p>
            @if($accion == 'add')
                <form method="POST" action="{{ route('card.add') }}">
            @else
                <form method="POST" action="{{ route('card.update') }}">
                @method('PATCH')
            @endif
                @csrf
                <div class="form-group">
                    <div class="stock_pro">Quedan {{$producto->stock}}</div>
                    <label>Cantidad:</label>
                    <input type="hidden" name="producto_id" value="{{$producto->id}}">
                    <input type="number" id="tentacles" name="cantidad" value="{{$cantidad}}" min="1" max="{{$producto->stock}}"><br>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Añadir al carrito</button>
                </div>
            </form>
        </div>
    </div>
    @empty
        <div> error </div>
    @endforelse
@endsection