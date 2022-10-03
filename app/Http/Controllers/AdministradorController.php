<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\User;
use App\Models\Persona;
use Illuminate\Http\Request;

class AdministradorController extends Controller
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
        $Administradores = Administrador::all();
        return view('Administrador.index',['Administradores'=>$Administradores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Administrador.create');
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
            'cargo'=>'required',
            'nacionalidad'=>'required',
            'profesion'=>'required',
            'nro_registro_profesional'=>'required'
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
        $persona->tipo = 'A';
        $persona->save();

        $usuario = new User();
        $usuario->email = $request->input('correo_usuario');
        $usuario->password = bcrypt($request->input('password_usuario'));
        $usuario->persona_id = $persona->id;
        $usuario->assignRole(['admin']);
        $usuario->save();

        $administrador = new Administrador();
        $administrador->cargo = $request->input('cargo');
        $administrador->nacionalidad = $request->input('nacionalidad');
        $administrador->profesion = $request->input('profesion');
        $administrador->nro_registro_profesional = $request->input('nro_registro_profesional');
        $administrador->persona_id = $persona->id;
        $administrador->save();
        return redirect()->route('administrador.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function show(Administrador $administrador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrador $administrador)
    {
        return view('administrador.edit',['administrador'=>$administrador]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrador $administrador)
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
            'cargo'=>'required',
            'nacionalidad'=>'required',
            'profesion'=>'required',
            'nro_registro_profesional'=>'required'
        ]);
        $persona = Persona::find($administrador->persona->id);
        $persona->nombre = $request->input('nombre');
        $persona->primer_apellido = $request->input('apellido_paterno');
        $persona->segundo_apellido = $request->input('apellido_materno');
        $persona->cedula_identidad = $request->input('cedula_identidad');
        $persona->celular = $request->input('celular');
        $persona->email = $request->input('email');
        $persona->sexo = $request->input('sexo');
        $persona->fecha_nacimiento = $request->input('fecha_nacimiento');
        $persona->save();

        $usuario = User::find($administrador->persona->user->id);
        $usuario->email = $request->input('correo_usuario');
        $usuario->password = bcrypt($request->input('password_usuario'));
        $usuario->persona_id = $persona->id;
        $usuario->save();

        $administrador = Administrador::find($administrador->id);
        $administrador->cargo = $request->input('cargo');
        $administrador->nacionalidad = $request->input('nacionalidad');
        $administrador->profesion = $request->input('profesion');
        $administrador->nro_registro_profesional = $request->input('nro_registro_profesional');
        $administrador->persona_id = $persona->id;
        $administrador->save();
        return redirect()->route('administrador.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrador $administrador)
    {
        $usuario = User::find($administrador->persona->user->id);
        $persona = Persona::find($administrador->persona->id);
        $administrador->delete();
        $persona->delete();
        $usuario->delete();
        
        return redirect()->route('administrador.index');
    }
}
