<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrdenTrabajo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdenTrabajoController extends Controller
{
    public function getOrdenTrabajos(){
        if(Auth::user()->hasRole('trabajador')){
            $ordenes = OrdenTrabajo::all();
            foreach($ordenes as $orden){
                $orden->solicitudServicio->establecimiento;
            }
            return response()->json(["ordenes"=>$ordenes]);
        }else{
            return response()->json(["message"=>"usuario no autorizado"]);
        }
        
    }
    public function marcarAsistencia(Request $request){
        $ordenTrabajo = OrdenTrabajo::find($request->ordenTrabajo_id);
        $establecimiento = $ordenTrabajo->solicitudServicio->establecimiento;
        $longitud_A = $request->longitud;
        $latitud_A = $request->latitud;
        $longitud_B = $establecimiento->longitud;
        $latitud_B = $establecimiento->latitud;
        $distancia = $this->haversineGreatCircleDistance($latitud_A, $longitud_A, $latitud_B, $longitud_B);
        if($distancia < 20){
            $mytime= Carbon::now('America/La_Paz'); 
            $ordenTrabajo->fecha_hora_marcado = $mytime->toDateTimeString();
            return response()->json([
                "message"=>"dentro del rango",
                "distancia"=>$distancia,
            ]);
        }else{
            return response()->json([
                "message"=>"fuera del rango",
                "distancia"=>$distancia,
            ]);
        }
    }
    public function aceptarOrdenTrabajo(Request $request){
        $orden = OrdenTrabajo::find($request->ordenTrabajo_id);
        $orden->trabajador_id = Auth::user()->persona->trabajador->id;
        $orden->estado = "asignado";
        $orden->update();
        return response()->json(["message"=>"orden de trabajo aceptado"]);
    }
    public function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000){
    $latFrom = deg2rad($latitudeFrom);
    $lonFrom = deg2rad($longitudeFrom);
    $latTo = deg2rad($latitudeTo);
    $lonTo = deg2rad($longitudeTo);

    $latDelta = $latTo - $latFrom;
    $lonDelta = $lonTo - $lonFrom;

    $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
    cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
    return $angle * $earthRadius;}

}
