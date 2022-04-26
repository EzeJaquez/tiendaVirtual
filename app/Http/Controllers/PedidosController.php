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
        
        $pedidos_info = Pedido::get()
        ->where('usuario_id','=',auth()->user()->id);
        
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


    public function index_admin()
    { 
        $pedidos_info = Pedido::select(
            'pedido.*',
            'users.name as nombre_usu'
        )
        ->join('users','users.id','=','pedido.usuario_id')
        ->get();

        return view('admin.pedidos.home', compact('pedidos_info'));
    }

    public function detalle_admin($id, $precio)
    { 
        $detalles_info = Detalle::select(
            'detalle.*',
            'producto.nombre as nombre',
            'producto.imagen as imagen'
            )
            ->join('producto','producto.id','=','detalle.producto_id')
            ->where('detalle.pedido_id','=',$id)
            ->get();
            return view('admin.pedidos.detalle', compact('detalles_info','precio'));
    }

    public function editar($id){
        $pedido = Pedido::find($id);
        return view('admin.pedidos.edit_estado',compact('pedido'));
    }

    public function update(Producto $producto,$id)
    {
        
        $pedido= Pedido::find($id);
        $pedido->update([
            'estado' => request('estado'),
        ]);
        return redirect()->route('admin-pedidos.index');
    }
}


