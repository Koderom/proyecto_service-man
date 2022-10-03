<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\Cliente;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin
        DB::table('personas')->insert([
            'nombre'=>'Admin',
            'primer_apellido'=>'Admin',
            'segundo_apellido'=>'Admin',
            'cedula_identidad'=>'111111111',
            'celular'=>'111111111',
            'email'=>'admin@gmail.com',
            'sexo'=>'M',
            'fecha_nacimiento'=>'2000-11-11',
            'tipo'=>'A'
        ]);
        DB::table('users')->insert([
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('123456789'),
            'persona_id'=>'1'
        ]);
        $admin = User::find(1);
        $admin->assignRole('admin');
        DB::table('administradors')->insert([
            'cargo'=>'administrador del sistema',
            'nacionalidad'=>'bolivia',
            'profesion'=>'administrador',
            'nro_registro_profesional'=>'11111111',
            'persona_id'=>'1'
        ]);

        //clientes 
        DB::table('personas')->insert([
            'nombre'=>'Cliente1',
            'primer_apellido'=>'Cliente',
            'segundo_apellido'=>'Cliente',
            'cedula_identidad'=>'111111111',
            'celular'=>'111111111',
            'email'=>'cliente1@gmail.com',
            'sexo'=>'M',
            'fecha_nacimiento'=>'2000-11-11',
            'tipo'=>'A'
        ]);
        DB::table('users')->insert([
            'email'=>'cliente1@gmail.com',
            'password'=>bcrypt('123456789'),
            'persona_id'=>'2'
        ]);
        DB::table('clientes')->insert([
            'telefono'=>'222222',
            'lugar_trabajo'=>'Santa cruz imcruz',
            'telefono_trabajo'=>'3333333',
            'persona_id'=>'2'
        ]);

        DB::table('personas')->insert([
            'nombre'=>'Cliente2',
            'primer_apellido'=>'Cliente',
            'segundo_apellido'=>'Cliente',
            'cedula_identidad'=>'111111111',
            'celular'=>'111111111',
            'email'=>'cliente2@gmail.com',
            'sexo'=>'M',
            'fecha_nacimiento'=>'2000-11-11',
            'tipo'=>'A'
        ]);
        DB::table('users')->insert([
            'email'=>'cliente2@gmail.com',
            'password'=>bcrypt('123456789'),
            'persona_id'=>'3'
        ]);
        DB::table('clientes')->insert([
            'telefono'=>'222222',
            'lugar_trabajo'=>'Santa cruz imcruz',
            'telefono_trabajo'=>'3333333',
            'persona_id'=>'3'
        ]);
        $cliente = User::find('2');
        $cliente->assignRole('cliente');
        $cliente = User::find('3');
        $cliente->assignRole('cliente');
        
        DB::table('servicios')->insert([
            'descripcion'=>'Mantenimiento'
        ]);
        DB::table('servicios')->insert([
            'descripcion'=>'Reparacion'
        ]);

        DB::table('turnos')->insert([
            'descripcion'=>'medio tiempo',
            'hora_inicio'=>'08:00',
            'hora_fin'=>'12:00'
        ]);
        DB::table('turnos')->insert([
            'descripcion'=>'nocturno',
            'hora_inicio'=>'18:00',
            'hora_fin'=>'05:00'
        ]);
        DB::table('turnos')->insert([
            'descripcion'=>'completo',
            'hora_inicio'=>'08:00',
            'hora_fin'=>'18:00'
        ]);

        //trabajador
        DB::table('personas')->insert([
            'nombre'=>'trabajador1',
            'primer_apellido'=>'trabajador1',
            'segundo_apellido'=>'trabajador1',
            'cedula_identidad'=>'111111111',
            'celular'=>'111111111',
            'email'=>'trabajador1@gmail.com',
            'sexo'=>'M',
            'fecha_nacimiento'=>'2000-11-11',
            'tipo'=>'A'
        ]);
        DB::table('users')->insert([
            'email'=>'trabajador1@gmail.com',
            'password'=>bcrypt('123456789'),
            'persona_id'=>'4'
        ]);
        DB::table('trabajadors')->insert([
            'nacionalidad'=>'Bolivia',
            'profesion'=>'Tecnico en telecomunicaciones',
            'nro_registro_profesional'=>'3333333',
            'grado_academico'=>'Tecnico Medio',
            'persona_id'=>'4',
            'turno_id'=>'1'
        ]);

        DB::table('personas')->insert([
            'nombre'=>'trabajador2',
            'primer_apellido'=>'trabajador2',
            'segundo_apellido'=>'trabajador2',
            'cedula_identidad'=>'111111111',
            'celular'=>'111111111',
            'email'=>'trabajador2@gmail.com',
            'sexo'=>'M',
            'fecha_nacimiento'=>'2000-11-11',
            'tipo'=>'A'
        ]);
        DB::table('users')->insert([
            'email'=>'trabajador2@gmail.com',
            'password'=>bcrypt('123456789'),
            'persona_id'=>'5'
        ]);
        DB::table('trabajadors')->insert([
            'nacionalidad'=>'Bolivia',
            'profesion'=>'Tecnico en telecomunicaciones',
            'nro_registro_profesional'=>'3333333',
            'grado_academico'=>'Tecnico Medio',
            'persona_id'=>'5',
            'turno_id'=>'2'
        ]);
        $trabajdor = User::find('4');
        $trabajdor->assignRole('trabajador');
        $trabajdor = User::find('5');
        $trabajdor->assignRole('trabajador');
    }
}
