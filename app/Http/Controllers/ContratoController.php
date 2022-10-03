<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\Establecimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContratoController extends Controller
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
        $Contratos = Contrato::all();
        return view('Contrato.index',['Contratos' => $Contratos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Clientes = Cliente::all();
        return view('Contrato.create',['Clientes'=>$Clientes]);
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
            'nombre'=>'required',
            'forma_pago'=>'required',
            'tipo_tarjeta'=>'required',
            'banco'=>'required',
            'nro_tarjeta'=>'required',
            'intervalo_cobro'=>'required',
            'fecha_instalacion'=>'required',
            'tipo_servicio'=>'required',
            'departamento'=>'required',
            'provincia'=>'required',
            'zona'=>'required',
            'direccion_exacta'=>'required'
        ]);
        
        $establecimiento = new Establecimiento();
        $establecimiento->departamento = $request->input('departamento');
        $establecimiento->provincia = $request->input('provincia');
        $establecimiento->zona = $request->input('zona');
        $establecimiento->direccion_exacta = $request->input('direccion_exacta');
        $establecimiento->latitud = $request->input('latitud');
        $establecimiento->longitud = $request->input('longitud');
        $establecimiento->save();

        $contrato = new Contrato();
        $contrato->forma_pago = $request->input('forma_pago');
        $contrato->tipo_tarjeta = $request->input('tipo_tarjeta');
        $contrato->banco = $request->input('banco');
        $contrato->nro_tarjeta = $request->input('nro_tarjeta');
        $contrato->intervalo_cobro = $request->input('intervalo_cobro');
        $contrato->fecha_instalacion = $request->input('fecha_instalacion');
        $contrato->tipo_servicio = $request->input('tipo_servicio');

        $contrato->administrador_id = Auth::user()->persona->administrador->id;
        $contrato->cliente_id = $request->input('nombre');
        $contrato->establecimiento_id = $establecimiento->id;

        $contrato->save();
        return redirect()->route('contrato.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function show(Contrato $contrato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function edit(Contrato $contrato)
    {
        $Clientes = Cliente::all();
        return view('Contrato.edit',['contrato'=>$contrato,'Clientes'=>$Clientes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrato $contrato)
    {
        $request->validate([
            'nombre'=>'required',
            'forma_pago'=>'required',
            'tipo_tarjeta'=>'required',
            'banco'=>'required',
            'nro_tarjeta'=>'required',
            'intervalo_cobro'=>'required',
            'fecha_instalacion'=>'required',
            'tipo_servicio'=>'required',
            'departamento'=>'required',
            'provincia'=>'required',
            'zona'=>'required',
            'direccion_exacta'=>'required'
        ]);
        
        $establecimiento = Establecimiento::find($contrato->establecimiento_id);
        $establecimiento->departamento = $request->input('departamento');
        $establecimiento->provincia = $request->input('provincia');
        $establecimiento->zona = $request->input('zona');
        $establecimiento->direccion_exacta = $request->input('direccion_exacta');
        $establecimiento->latitud = $request->input('latitud');
        $establecimiento->longitud = $request->input('longitud');
        $establecimiento->save();

        $contrato = Contrato::find($contrato->id);
        $contrato->forma_pago = $request->input('forma_pago');
        $contrato->tipo_tarjeta = $request->input('tipo_tarjeta');
        $contrato->banco = $request->input('banco');
        $contrato->nro_tarjeta = $request->input('nro_tarjeta');
        $contrato->intervalo_cobro = $request->input('intervalo_cobro');
        $contrato->fecha_instalacion = $request->input('fecha_instalacion');
        $contrato->tipo_servicio = $request->input('tipo_servicio');

        $contrato->administrador_id = Auth::user()->persona->administrador->id;
        $contrato->cliente_id = $request->input('nombre');
        $contrato->establecimiento_id = $establecimiento->id;

        $contrato->save();
        return redirect()->route('contrato.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrato $contrato)
    {
        $establecimiento = Establecimiento::find($contrato->establecimiento->id);
        $contrato->delete();
        $establecimiento->delete();
        return redirect()->route('contrato.index');
    }
}
