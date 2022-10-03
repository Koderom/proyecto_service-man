<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
        $Clientes = Cliente::all();
        return view('Cliente.index',['Clientes'=>$Clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cliente.create');
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
            'telefono_cliente'=>'required',
            'lugar_trabajo'=>'required',
            'telefono_trabajo'=>'required',
            'correo_usuario'=>'required',
            'password_usuario'=>'required'
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
        $persona->tipo = 'C';
        $persona->save();

        $usuario = new User();
        $usuario->email = $request->input('correo_usuario');
        $usuario->password = bcrypt($request->input('password_usuario'));
        $usuario->persona_id = $persona->id;
        $usuario->assignRole(['cliente']);
        $usuario->save();

        $cliente = new Cliente();
        $cliente->telefono = $request->input('telefono_cliente');
        $cliente->lugar_trabajo = $request->input('lugar_trabajo');
        $cliente->telefono_trabajo = $request->input('telefono_trabajo');
        $cliente->persona_id = $persona->id;
        $cliente->save();

        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('Cliente.edit',['cliente'=>$cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
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
            'telefono_cliente'=>'required',
            'lugar_trabajo'=>'required',
            'telefono_trabajo'=>'required',
            'correo_usuario'=>'required',
            'password_usuario'=>'required'
        ]);
        $persona = Persona::find($cliente->persona->id);
        $persona->nombre = $request->input('nombre');
        $persona->primer_apellido = $request->input('apellido_paterno');
        $persona->segundo_apellido = $request->input('apellido_materno');
        $persona->cedula_identidad = $request->input('cedula_identidad');
        $persona->celular = $request->input('celular');
        $persona->email = $request->input('email');
        $persona->sexo = $request->input('sexo');
        $persona->fecha_nacimiento = $request->input('fecha_nacimiento');
        $persona->save();

        $usuario = User::find($cliente->persona->user->id);
        $usuario->email = $request->input('correo_usuario');
        $usuario->password = bcrypt($request->input('password_usuario'));
        $usuario->persona_id = $persona->id;
        $usuario->save();

        $cliente = Cliente::find($cliente->id);
        $cliente->telefono = $request->input('telefono_cliente');
        $cliente->lugar_trabajo = $request->input('lugar_trabajo');
        $cliente->telefono_trabajo = $request->input('telefono_trabajo');
        $cliente->persona_id = $persona->id;
        $cliente->save();

        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $usuario = User::find($cliente->persona->user->id);
        $persona = Persona::find($cliente->persona->id);
        $cliente->delete();
        $persona->delete();
        $usuario->delete();
        
        return redirect()->route('administrador.index');
    }
}
