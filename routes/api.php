<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrdenTrabajoController;
use App\Http\Controllers\Api\SolicitudServicioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use JetBrains\PhpStorm\Pure;

Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::get('user-profile',[AuthController::class, 'userProfile']);
    Route::post('logout',[AuthController::class, 'logout']);
    
    Route::get('contratos',[SolicitudServicioController::class ,'contratos']);
    Route::post('agendar-servicio',[SolicitudServicioController::class ,'agendarServicio']);

    Route::post('marcar-asistencia',[OrdenTrabajoController::class,'marcarAsistencia']);
    Route::post('aceptar-orden',[OrdenTrabajoController::class,'aceptarOrdenTrabajo']);
    Route::get('ver-ordenes',[OrdenTrabajoController::class, 'getOrdenTrabajos']);
});













Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
