<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request){
        return response()->json([
            "message"=>'registrado'
        ]);
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email'=>'email|required',
            'password'=>'required'
        ]);
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            $cookie = cookie('cookie_token',$token, 60*24);
            return response(["token"=>$token],Response::HTTP_OK)->withoutCookie($cookie);
        }else{
            return response(["message"=>"contraseña o correo invalidas"],Response::HTTP_UNAUTHORIZED);
        }
        
    }
    public function userProfile(Request $request){
        return response()->json([
            "messaje"=>"userProfile OK",
            "userData"=> auth()->user()
        ],Response::HTTP_OK);
    }
    public function logout(Request $request){
        $cookie = Cookie::forget('cookie_token');
        return response([
            "message"=>"cierre de sesion OK"
        ], Response::HTTP_OK)->withCookie($cookie);
    }
    public function allUser(Request $request){

    }
}
