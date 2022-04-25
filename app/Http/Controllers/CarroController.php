<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\Detalle;
use Cart;

class CarroController extends Controller
{
    public function add(Request $request){
       
        $producto = Producto::find($request->producto_id);

        Cart::add(
            $producto->id, 
            $producto->nombre, 
            $producto->precio, 
            1,
            array("imagen"=>$producto->imagen, "cantidad"=>$request->cantidad),

           
        );
        return redirect()->route('cart.checkout');
    }

    public function update(Request $request){
        $producto = Producto::find($request->producto_id);

        Cart::update(
            $request->producto_id, 
        [
            'attributes' => ["imagen"=>$producto->imagen,'cantidad' => $request->cantidad]
        ]);
        return redirect()->route('cart.checkout');
    }

    public function cart(){
        
        return view('cesta.carro');
    }

    public function removeitem(Request $request) {
        //$producto = Producto::where('id', $request->id)->firstOrFail();
        Cart::remove([
        'id' => $request->id,
        ]);
        return back()->with('success',"Producto eliminado con éxito de su carrito.");
    }

    public function confirmar_compra(Request $request){ 
        
        $contador = $request->cont;
        $ped = Pedido::create([
            'usuario_id' => auth()->user()->id,
            'precio_total' => $request->total,
            'estado' => 'pendent'
        ]);

        foreach (Cart::getContent() as $item) {

            $producto = Producto::find($item->id);
            

            if ($item->attributes->cantidad > $producto->stock ){
                Cart::remove([
                    'id' => $item->id,
                    ]);
            }
            else{
                Detalle::create([
                    'pedido_id' => $ped->id,
                    'producto_id' => $item->id,
                    'cantidad' => $item->attributes->cantidad,
                    'precio' => $item->price
                ]);

                $new_stock = $producto->stock - $item->attributes->cantidad ;

                if($new_stock == 0){
                    $producto->update([
                        'stock' => $new_stock,
                        'estado' => 'desactivado',
                    ]);
                }else{
                    $producto->update([
                        'stock' => $new_stock
                    ]);
                }
                CarroController::clear();
            }
            
        }
                
        return redirect()->route('cart.checkout');
    }

    public function clear(){
        Cart::clear();
        return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
    }
}