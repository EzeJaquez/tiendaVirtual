<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class ProductoController extends Controller
{
    public function index()
    { 
        $info_productos = Producto::select(
            'producto.*',
            'categoria.nombre as cat_nombre',
            )
            ->join('categoria','categoria.id','=','producto.categoria_id')
            ->orderBy('producto.estado','ASC')->get();

       
            $filtro = false;
        return view('admin.productos.home', compact('info_productos','filtro'));
    }

    public function productos_by_categoria($categoria){

        $cat = Categoria::find($categoria);
        $info_productos = Producto::where('categoria_id',$categoria)
            ->orderBy('estado')
            ->get();

        return view('productos.productos_categorias', compact('info_productos','cat'));
    }
    
    public function filtro(){
        $busqueda = request('buscador');
        $info_productos = Producto::select(
                'producto.*',
                'categoria.nombre as cat_nombre',
                'categoria.descripcion as cat_descripcion'
            )
            ->join('categoria','categoria.id','=','producto.categoria_id')
            ->where('producto.nombre','LIKE','%'.$busqueda.'%')
            ->orWhere('producto.descripcion','LIKE','%'.$busqueda.'%')
            ->get();
            $filtro = true;
        return view('admin.productos.home', compact('info_productos','filtro'));
    }

    public function filtro_home(){
        $busqueda = request('buscador');
        $info_productos = Producto::select(
                'producto.*',
                'categoria.nombre as cat_nombre',
                'categoria.descripcion as cat_descripcion'
            )
            ->join('categoria','categoria.id','=','producto.categoria_id')
            ->where('producto.nombre','LIKE','%'.$busqueda.'%')
            ->orWhere('producto.descripcion','LIKE','%'.$busqueda.'%')
            ->orWhere('categoria.descripcion','LIKE','%'.$busqueda.'%')
            ->orWhere('categoria.nombre','LIKE','%'.$busqueda.'%')
            ->get();
        return view('productos.buscador_productos', compact('info_productos'));
    }

    public function create()
    {
        $categorias = Categoria::get();
        return view('admin.productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {   
        $entrada = $request->all();
        if($archivo = $request->file('imagen')){
            $nombre=$archivo->getClientOriginalName();
            $archivo->move('images',$nombre);
            $entrada['imagen'] = $nombre;
        }

        Producto::create($entrada);

        return redirect()->route('admin-producto.index');
    }

    public function info_producto($producto,$cantidad,$accion){
        
        $categorias = Categoria::get();
        $info_producto = Producto::select(
            'producto.*',
            'categoria.nombre as cat_nombre',
            )
            ->join('categoria','categoria.id','=','producto.categoria_id')
            ->where('producto.id',$producto)
            ->get();
        
        // return $info_producto;
        return view('productos.info_productos',compact('info_producto','cantidad','accion'));
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
        $entrada = request()->all();
        if($archivo = request()->file('imagen')){
            $nombre=$archivo->getClientOriginalName();
            $archivo->move('images',$nombre);
            $entrada['imagen'] = $nombre;
        }
        else{
            $entrada['imagen'] = $producto->imagen;
        }
         

        $producto->update([
            'nombre' => request('nombre'),
            'categoria_id' => request('categoria_id'),
            'descripcion' => request('descripcion'),
            'slug' => request('slug'),
            'estado' => request('estado'),
            'precio' => request('precio'),
            'stock' => request('stock'),
            'imagen' => $entrada['imagen'],
        ]);
        return redirect()->route('admin-producto.index');
    }

    public function destroy($id)
    {
        //
    }
}
