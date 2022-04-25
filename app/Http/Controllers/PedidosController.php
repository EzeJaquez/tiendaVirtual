<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\Detalle;
use Illuminate\Database\Eloquent\Collection;

class PedidosController extends Controller
{
    public function index()
    { 
        $pedidos_info = Pedido::get();

        return view('pedidos.pedidos', compact('pedidos_info'));
    }

    public function detalle($id, $precio)
    { 
        $detalles_info = Detalle::select(
            'detalle.*',
            'producto.nombre as nombre',
            'producto.imagen as imagen'
            )
            ->join('producto','producto.id','=','detalle.producto_id')
            ->where('detalle.pedido_id','=',$id)
            ->get();
            return view('pedidos.detalle', compact('detalles_info','precio'));
    }
}
