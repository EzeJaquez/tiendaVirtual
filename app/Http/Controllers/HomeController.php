<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $info_productos = Producto::select(
            'producto.*',
            'categoria.nombre as cat_nombre',
            'categoria.estado as cat_estado',
            )
            ->join('categoria','categoria.id','=','producto.categoria_id')
            ->orderBy('producto.estado','ASC')->get();

       return view('Home', compact('info_productos'));
    }

    public function adminHome(){
        return view('admin.Home');
    }

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    
    // public function index()
    // {
    //     return view('home');
    // }
}
