<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;


class CategoriaController extends Controller
{
    public function index()
    {
        //Lisar recursos
        $categorias_info = Categoria::orderBy('estado','ASC')->get();

        return view('admin.categorias.home', compact('categorias_info'));
    }

    public function create()
    {
        return view('admin.categorias.create');
    }

    public function store()
    {
        Categoria::create( request()->all());

        return redirect()->route('admin-categoria.index');
    }

    public function orden()
    { 
        $categorias_info = Categoria::orderBy('estado',request('estado'))->get();
        return view('admin.categorias.home', compact('categorias_info'));
    }

    public function edit(Categoria $categoria)
    {
        return view('admin.categorias.edit',[
            'categoria' => $categoria
        ]);
    }



    public function update(Categoria $categoria)
    {
        $categoria->update([
            'nombre' => request('nombre'),
            'descripcion' => request('descripcion'),
            'slug' => request('slug'),
            'estado' => request('estado'),
        ]);
        return redirect()->route('admin-categoria.index');
    }
}
