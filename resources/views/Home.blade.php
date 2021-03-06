@extends('layout.master')
@section('titulo','Home')
@section('seccion','Home')
@section('content')
    <input type="hidden"  value="{{$count = 0}}">
    <div id="ali">Home
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
    </div>
    <div class="_home_pro">
    @forelse($info_productos as $producto)
        @if($producto->estado == 'activado' && $producto->cat_estado == 'activada' && $count < 4)
            <a href="{{route('producto-info',['producto' =>$producto->id, 'cantidad' => 1, 'accion' =>'add'])}}"> 
                <div class="card carta" style="width: 250px;">
                    <img class="pos_carta_img " width="150" src="{{URL::asset('images/'.$producto->imagen)}}"/>
                    <div class="card-body">
                        <div class="info_cart"> {{$producto->nombre}} - {{$producto->precio}}€</div>
                        <div class="subtitulo_cat">  {{$producto->cat_nombre}}</div>
                    </div>
                </div>
            </a>
            <input type="hidden"  value="{{$count += 1}}">
        @endif
    @empty
        <div> No hay productos </div>
    @endforelse
    </div>
@endsection
