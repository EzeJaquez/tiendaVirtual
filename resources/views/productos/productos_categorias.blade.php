@extends('layout.master')
@section('titulo','Home')
@section('seccion','Home')
@section('content')
    <div class="cat">{{$cat->nombre}}
        <p>{{$cat->descripcion}}</p>
    </div>
    <div class="_home_pro">
   @forelse($info_productos as $producto)
        @if($producto->estado == 'activado')
            <a href="{{route('producto-info',['producto' => $producto->id, 'cantidad' => 1, 'accion' => 'add'])}}"> 
                <div class="card carta" style="width: 250px;">
                    <img class="pos_carta_img " width="150" src="{{URL::asset('images/'.$producto->imagen)}}"/>
                    <div class="card-body">
                        <div class="info_cart"> {{$producto->nombre}} - {{$producto->precio}}€</div>
                        <div class="subtitulo_cat">  {{$producto->cat_nombre}}</div>
                    </div>
                </div>
            </a>
        @endif
    @empty
        <div> No hay productos </div>
    @endforelse
    </div>

@endsection