<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Trabajador;
use App\Models\Turno;
use App\Models\User;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
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
        $Trabajadores = Trabajador::all();
        return view('Trabajador.index',['Trabajadores'=>$Trabajadores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $turnos = Turno::all();
        return view('Trabajador.create',['turnos'=>$turnos]);
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
            'apellido_paterno'=>'required',
            'apellido_materno'=>'required',
            'cedula_identidad'=>'required',
            'celular'=>'required',
            'email'=>'required|email',
            'sexo'=>'required',
            'fecha_nacimiento'=>'required',
            'correo_usuario'=>'required',
            'password_usuario'=>'required',
            'nacionalidad'=>'required',
            'profesion'=>'required',
            'nro_registro_profesional'=>'required',
            'grado_academico'=>'required',
            'turno'=>'required',
        ]);
        $persona = new Persona();
        $persona->nombre = $request->input('nombre');
        $persona->primer_apellido = $request->input('apellido_paterno');
        $persona->segundo_apellido = $request->input('apellido_materno');
        $persona->cedula_identidad = $request->input('cedula_identidad');
        $persona->celular = $request->input('celular');
        $persona->email = $request->input('email');
        $persona->sexo = $request->input('sexo');
        $persona->fecha_nacimiento = $request->input('fecha_nacimiento');
        $persona->tipo = 'T';
        $persona->save();

        $usuario = new User();
        $usuario->email = $request->input('correo_usuario');
        $usuario->password = bcrypt($request->input('password_usuario'));
        $usuario->persona_id = $persona->id;
        $usuario->assignRole(['trabajador']);
        $usuario->save();

        $trabajador = new Trabajador();
        $trabajador->nacionalidad = $request->input('nacionalidad');
        $trabajador->profesion = $request->input('profesion');
        $trabajador->nro_registro_profesional = $request->input('nro_registro_profesional');
        $trabajador->grado_academico = $request->input('grado_academico');
        $trabajador->turno_id = $request->input('turno');
        $trabajador->persona_id = $persona->id;
        $trabajador->save();
        return redirect()->route('trabajador.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function show(Trabajador $trabajador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function edit(Trabajador $trabajador)
    {
        $turno = Turno::all();
        return view('Trabajador.edit',['trabajador'=>$trabajador, 'turnos'=>$turno]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trabajador $trabajador)
    {
        $request->validate([
            'nombre'=>'required',
            'apellido_paterno'=>'required',
            'apellido_materno'=>'required',
            'cedula_identidad'=>'required',
            'celular'=>'required',
            'email'=>'required|email',
            'sexo'=>'required',
            'fecha_nacimiento'=>'required',
            'correo_usuario'=>'required',
            'password_usuario'=>'required',
            'nacionalidad'=>'required',
            'profesion'=>'required',
            'nro_registro_profesional'=>'required',
            'grado_academico'=>'required',
            'turno'=>'required',
        ]);
        $persona = Persona::find($trabajador->persona->id);
        $persona->nombre = $request->input('nombre');
        $persona->primer_apellido = $request->input('apellido_paterno');
        $persona->segundo_apellido = $request->input('apellido_materno');
        $persona->cedula_identidad = $request->input('cedula_identidad');
        $persona->celular = $request->input('celular');
        $persona->email = $request->input('email');
        $persona->sexo = $request->input('sexo');
        $persona->fecha_nacimiento = $request->input('fecha_nacimiento');
        $persona->save();

        $usuario = User::find($trabajador->persona->user->id);
        $usuario->email = $request->input('correo_usuario');
        $usuario->password = bcrypt($request->input('password_usuario'));
        $usuario->persona_id = $persona->id;
        $usuario->save();

        $trabajador = Trabajador::find($trabajador->id);
        $trabajador->nacionalidad = $request->input('nacionalidad');
        $trabajador->profesion = $request->input('profesion');
        $trabajador->nro_registro_profesional = $request->input('nro_registro_profesional');
        $trabajador->grado_academico = $request->input('grado_academico');
        $trabajador->turno_id = $request->input('turno');
        $trabajador->persona_id = $persona->id;
        $trabajador->save();
        return redirect()->route('trabajador.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trabajador $trabajador)
    {
        $usuario = User::find($trabajador->persona->user->id);
        $persona = Persona::find($trabajador->persona->id);
        $trabajador->delete();
        $persona->delete();
        $usuario->delete();
        
        return redirect()->route('trabajador.index');
    }
}
