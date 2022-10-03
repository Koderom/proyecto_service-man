<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
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
        $Turnos = Turno::all();
        return view('Turno.index',['Turnos'=>$Turnos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Turno.create');
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
            'descripcion'=>'required',
            'hora_inicio'=>'required',
            'hora_fin'=>'required',
        ]);
        $turno = new Turno();
        $turno->descripcion = $request->input('descripcion');
        $turno->hora_inicio = $request->input('hora_inicio');
        $turno->hora_fin = $request->input('hora_fin');
        $turno->save();
        return redirect()->route('turno.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function show(Turno $turno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function edit(Turno $turno)
    {
        return view('Turno.edit',['turno'=>$turno]);
        //return $turno;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turno $turno)
    {
        $request->validate([
            'descripcion'=>'required',
            'hora_inicio'=>'required',
            'hora_fin'=>'required',
        ]);
        $turno = Turno::find($turno->id);
        $turno->descripcion = $request->input('descripcion');
        $turno->hora_inicio = $request->input('hora_inicio');
        $turno->hora_fin = $request->input('hora_fin');
        $turno->save();
        return redirect()->route('turno.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turno $turno)
    {
        $turno->delete();
        return redirect()->route('turno.index');
    }
}
