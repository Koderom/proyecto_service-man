<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\OrdenTrabajoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\SolicitudServicioController;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\TurnoController;
use App\Models\OrdenTrabajo;
use App\Models\SolicitudServicio;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException as ValidationValidationException;
use League\Config\Exception\ValidationException as ExceptionValidationException;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::view('/', 'welcome')->name('welcome');
Route::get('/',function(){ return redirect()->route('login'); })->name('welcome');
Route::view('/home', 'home')->name('home')->middleware('auth');
Route::view('/login','login')->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::controller(AdministradorController::class)->group(function(){
    Route::get('administrador/index','index')->name('administrador.index');
    Route::get('administrador/create','create')->name('administrador.create');
    Route::post('administrador/store','store')->name('administrador.store');
    Route::delete('administrador/destroy/{administrador}','destroy')->name('administrador.destroy');
    Route::get('administrador/edit/{administrador}','edit')->name('administrador.edit');
    Route::put('administrador/update/{administrador}','update')->name('administrador.update');
});


Route::controller(ClienteController::class)->group(function(){
    Route::get('cliente/index','index')->name('cliente.index');
    Route::get('cliente/create','create')->name('cliente.create');
    Route::post('cliente/store','store')->name('cliente.store');
    Route::delete('cliente/destroy/{cliente}','destroy')->name('cliente.destroy');
    Route::get('cliente/edit/{cliente}','edit')->name('cliente.edit');
    Route::put('cliente/update/{cliente}','update')->name('cliente.update');
});

Route::controller(TrabajadorController::class)->group(function(){
    Route::get('trabajador/index','index')->name('trabajador.index');
    Route::get('trabajador/create','create')->name('trabajador.create');
    Route::post('trabajador/store','store')->name('trabajador.store');
    Route::delete('trabajador/destroy/{trabajador}','destroy')->name('trabajador.destroy');
    Route::get('trabajador/edit/{trabajador}','edit')->name('trabajador.edit');
    Route::put('trabajador/update/{trabajador}','update')->name('trabajador.update');
});
Route::controller(TurnoController::class)->group(function(){
    Route::get('turno/index','index')->name('turno.index');
    Route::get('turno/create','create')->name('turno.create');
    Route::post('turno/store','store')->name('turno.store');
    Route::delete('turno/destroy/{turno}','destroy')->name('turno.destroy');
    Route::get('turno/edit/{turno}','edit')->name('turno.edit');
    Route::put('turno/update/{turno}','update')->name('turno.update');
});

Route::controller(ContratoController::class)->group(function(){
    Route::get('contrato/index','index')->name('contrato.index');
    Route::get('contrato/create','create')->name('contrato.create');
    Route::post('contrato/store','store')->name('contrato.store');
    Route::delete('contrato/destroy/{contrato}','destroy')->name('contrato.destroy');
    Route::get('contrato/edit/{contrato}','edit')->name('contrato.edit');
    Route::put('contrato/update/{contrato}','update')->name('contrato.update');
});

Route::controller(ServicioController::class)->group(function(){
    Route::get('servicio/index','index')->name('servicio.index');
    Route::get('servicio/create','create')->name('servicio.create');
    Route::post('servicio/store','store')->name('servicio.store');
    Route::delete('servicio/destroy/{servicio}','destroy')->name('servicio.destroy');
    Route::get('servicio/edit/{servicio}','edit')->name('servicio.edit');
    Route::put('servicio/update/{servicio}','update')->name('servicio.update');
});

Route::controller(SolicitudServicioController::class)->group(function(){
    Route::get('solicitud/index','index')->name('solicitud.index');
    Route::get('solicitud/create/{contrato}','create')->name('solicitud.create');
    Route::post('solicitud/store','store')->name('solicitud.store');
    //Route::get('solicitud/confirmar/{solicitud}', 'confirmar')->name('solicitud.confirmar');
    Route::get('solicitud/cancelar/{solicitud}', 'cancelar')->name('solicitud.cancelar');

    //Route::delete('solicitud/destroy/{servicio}','destroy')->name('solicitud.destroy');
    //Route::get('solicitud/edit/{solicitud}','edit')->name('solicitud.edit');
    //Route::put('solicitud/update/{solicitud}','update')->name('solicitud.update');
});
Route::controller(OrdenTrabajoController::class)->group(function(){
    Route::get('orden/index', 'index')->name('orden.index');
    Route::get('orden/create/{solicitud}', 'create')->name('orden.create');
    Route::post('orden/store','store')->name('orden.store');
    Route::get('orden/aceptar/{orden}','aceptar')->name('orden.aceptar');
    Route::get('orden/asignar/{orden}','asignar')->name('orden.asignar');
    Route::post('orden/asignar/guardar','guardarAsignacion')->name('orden.guardarAsignar');
});
