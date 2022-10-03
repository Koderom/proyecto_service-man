<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        $credenciales = request()->validate([
            'email' => 'required|email|string',
            'password'=> 'required|string'
        ]);
        if(Auth::attempt($credenciales, true)){
            request()->session()->regenerate();
            return redirect()->route('home');
        }
        return redirect()->route('login');
    }
    public function logout(Request $request ){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
