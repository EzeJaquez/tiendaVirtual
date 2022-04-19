<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function home(){
        return view('Home');
    }
    public function adminHome(){
        return view('admin.Home');
    }

    public function redirigir()
    {
        return redirect()->action([peliculasController::class,'detalle']);
    }

    public function formulario(){
        return view('peliculas.formulario');
    }

    public function recibirDatos(Request $request)
    {
        request()->validate([
            'nombre' => ['required','min:3'],
            'email' => 'required|email'
        ]);
        $nombre = $request->input('nombre');
        $email = $request->get('email');
        return "El nombre es $nombre y el email es $email";
    }
}