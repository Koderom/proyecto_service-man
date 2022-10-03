<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use App\Models\Establecimiento;
use App\Models\Servicio;
use App\Models\SolicitudServicio;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SolicitudServicioController extends Controller
{
    public function contratos(){
        
        if(Auth::user()->hasRole('cliente')){
            $contratos = Auth::user()->persona->cliente->contrato;
            $establecimientos = collect([]);
            foreach($contratos as $contrato){
                $contrato->establecimiento;
            }
            $servicios = Servicio::all();
            return response()->json([
                "contratos"=>$contratos,
                "servicios"=>$servicios
            ]);    
        }else{
            return response()->json(["message"=>"usuario no autorizado"]);
        }
    }

    public function agendarServicio(Request $request){
        $mytime= Carbon::now('America/La_Paz'); 
        $contrato = Contrato::find($request->contrato);
        $solicitudServicio = new SolicitudServicio();

        $solicitudServicio->cod_solicitud_servicio = rand(10000000,99999999);
        $solicitudServicio->motivo = $request->motivo;
        $solicitudServicio->estado = 'P';//[P Pendiente,A Confirmado, C Cancelado]
        $solicitudServicio->fecha_solicitud = $mytime->toDateTimeString();

        $solicitudServicio->servicio_id = $request->tipo_servicio;
        $solicitudServicio->cliente_id = $contrato->cliente->id;
        $solicitudServicio->establecimiento_id = $contrato->establecimiento->id;
        $solicitudServicio->save();
        
        return response(["message"=>"solicitud procesada exitosamente"]);
    }
}
