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

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    
    // public function index()
    // {
    //     return view('home');
    // }
}
