<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\Servicio;
use App\Models\SolicitudServicio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class SolicitudServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
        if(Auth::user()->hasRole('admin')){
            $Contratos= Contrato::all();
            $SolicitudServicios = SolicitudServicio::all();
        }else{
            $Contratos= Auth::user()->persona->cliente->contrato;
            $SolicitudServicios = Auth::user()->persona->cliente->solicitudServicio;
        }
        
        return view('SolicitudServicio.index',[
            'SolicitudServicios'=>$SolicitudServicios,
            'Contratos' => $Contratos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Contrato $contrato)
    {
        $Servicios = Servicio::all();
        return view('SolicitudServicio.create',['contrato'=>$contrato, 'Servicios'=>$Servicios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mytime= Carbon::now('America/La_Paz'); 
        $contrato = Contrato::find($request->input('contrato'));
        $solicitudServicio = new SolicitudServicio();

        $solicitudServicio->cod_solicitud_servicio = rand(10000000,99999999);
        $solicitudServicio->motivo = $request->input('motivo');
        $solicitudServicio->estado = 'P';//[P Pendiente,A Confirmado, C Cancelado]
        $solicitudServicio->fecha_solicitud = $mytime->toDateTimeString();

        $solicitudServicio->servicio_id = $request->input('tipo_servicio');
        $solicitudServicio->cliente_id = $contrato->cliente->id;
        $solicitudServicio->establecimiento_id = $contrato->establecimiento->id;
        $solicitudServicio->save();
        return redirect()->route('solicitud.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SolicitudServicio  $solicitudServicio
     * @return \Illuminate\Http\Response
     */
    public function confirmar(SolicitudServicio $solicitud){
        $solicitud->estado = 'A';
        $solicitud->save();
        return redirect()->route('solicitud.index');
    }
    public function cancelar(SolicitudServicio $solicitud){
        $solicitud->estado = 'C';
        $solicitud->save();
        return redirect()->route('solicitud.index');
    }
    public function show(SolicitudServicio $solicitudServicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SolicitudServicio  $solicitudServicio
     * @return \Illuminate\Http\Response
     */
    public function edit(SolicitudServicio $solicitudServicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SolicitudServicio  $solicitudServicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SolicitudServicio $solicitudServicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SolicitudServicio  $solicitudServicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(SolicitudServicio $solicitudServicio)
    {
        //
    }
}
