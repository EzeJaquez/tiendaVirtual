<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    { 
        $info_productos = Producto::select(
            'producto.id as pro_id',
            'categoria.nombre as cat_nombre',
            'producto.nombre as pro_nombre',
            'producto.slug as pro_slug',
            'producto.descripcion as pro_descripcion',
            'producto.precio as pro_precio',
            'producto.stock as pro_stock',
            'producto.estado as pro_estado'
            )
            ->join('categoria','categoria.id','=','producto.categoria_id')
            ->orderBy('producto.estado','ASC')->get();

       

        return view('admin.productos.home', compact('info_productos'));
    }

    public function create()
    {
        $categorias = Categoria::get();
        return view('admin.productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        Producto::create( request()->all());

        return redirect()->route('admin-producto.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::get();

        return view('admin.productos.edit',[
            'categorias' => $categorias,
            'producto' => $producto
        ]);
    }

    public function update(Producto $producto)
    {
        $producto->update([
            'nombre' => request('nombre'),
            'categoria_id' => request('categoria_id'),
            'descripcion' => request('descripcion'),
            'slug' => request('slug'),
            'estado' => request('estado'),
            'precio' => request('precio'),
            'stock' => request('stock')
        ]);
        return redirect()->route('admin-producto.index');
    }

    public function destroy($id)
    {
        //
    }
}
