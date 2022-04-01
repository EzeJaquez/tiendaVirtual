<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class adminController extends Controller
{
    public function irCategoria(){
        return view('admin.categorias.home');
    }

    public function irComandos(){
        return view('admin.comandos.home');
    }

    public function irProductos(){
        return view('admin.productos.home');
    }
}