<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class EditUserController extends Controller
{

    public function edit(User $info)
    {
        return view('auth.edit');
    }

    public function option(User $info)
    {
        return view('auth.option');
    }

    public function reset_passwd(){
        return view('auth.passwords.reset');
    }

    public function update_pssw(Request $request)
    {
        $validacion = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if($validacion){
            $user = auth()->user();
            $user->password = Hash::make($request['password']);
            $user->save();
        }
        return redirect()->route('home');
    }

    public function update(Request $request)
    {
        $validacion = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        if($validacion){
            $user = auth()->user();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->save();
        }
        return redirect()->route('home');
    }
}