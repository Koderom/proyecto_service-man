<?php

namespace App\Http\Controllers;

use App\Models\OrdenTrabajo;
use App\Models\Servicio;
use App\Models\SolicitudServicio;
use App\Models\Trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class OrdenTrabajoController extends Controller
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
        $OredenTrabajos = OrdenTrabajo::all();
        return view('OrdenTrabajo.index',['OrdenTrabajos'=>$OredenTrabajos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SolicitudServicio $solicitud)
    {
        return view('OrdenTrabajo.create',['solicitud'=>$solicitud]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'dia_programado'=>'required',
            'hora_inicio'=>'required',
            'hora_fin'=>'required'
        ]);
        $ordenTrabajo = new OrdenTrabajo();
        $ordenTrabajo->cod_orden_trabajo = rand(11111111,99999999);
        $ordenTrabajo->dia_programado = $request->input('dia_programado');
        $ordenTrabajo->hora_inicio = $request->input('hora_inicio');
        $ordenTrabajo->hora_fin = $request->input('hora_fin');
        $ordenTrabajo->estado = "pendiente";

        $solicitud = SolicitudServicio::find($request->input('solicitud'));
        $solicitud->estado = 'A';
        $solicitud->save();
        
        $ordenTrabajo->solicitud_servicio_id = $request->input('solicitud');
        $ordenTrabajo->save();
        return redirect()->route('orden.index');
    }
    public function aceptar(OrdenTrabajo $orden){
        //$orden->estado = "aceptado";
        $trabajador = Auth::user()->persona->trabajador;
        
        if($trabajador != null){
            $orden->trabajador_id = $trabajador->id;
            $orden->estado = "asignado";
            $orden->update();
        } 
        return redirect()->route('orden.index');
    }
    public function asignar(OrdenTrabajo $orden){
        $Trabajadores = Trabajador::all();
        return view('OrdenTrabajo.asignar',['orden'=>$orden, 'Trabajadores'=>$Trabajadores]);
    }
    public function guardarAsignacion(Request $request){
        $orden = OrdenTrabajo::find($request->input('orden'));
        $orden->estado = "asignado";
        $orden->trabajador_id = $request->input('trabajador');
        $orden->save();
        return redirect()->route('orden.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function show(OrdenTrabajo $ordenTrabajo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdenTrabajo $ordenTrabajo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdenTrabajo $ordenTrabajo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdenTrabajo $ordenTrabajo)
    {
        //
    }
}
