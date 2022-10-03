<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name'=>'admin']);
        $trabajador = Role::create(['name'=>'trabajador']);
        $cliente = Role::create(['name'=>'cliente']);

        Permission::create(['name'=>'administrador.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'administrador.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'administrador.store'])->syncRoles([$admin]);
        Permission::create(['name'=>'administrador.destroy'])->syncRoles([$admin]);
        Permission::create(['name'=>'administrador.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'administrador.update'])->syncRoles([$admin]);

        Permission::create(['name'=>'cliente.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'cliente.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'cliente.store'])->syncRoles([$admin]);
        Permission::create(['name'=>'cliente.destroy'])->syncRoles([$admin]);
        Permission::create(['name'=>'cliente.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'cliente.update'])->syncRoles([$admin]);

        Permission::create(['name'=>'trabajador.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'trabajador.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'trabajador.store'])->syncRoles([$admin]);
        Permission::create(['name'=>'trabajador.destroy'])->syncRoles([$admin]);
        Permission::create(['name'=>'trabajador.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'trabajador.update'])->syncRoles([$admin]);

        Permission::create(['name'=>'turno.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'turno.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'turno.store'])->syncRoles([$admin]);
        Permission::create(['name'=>'turno.destroy'])->syncRoles([$admin]);
        Permission::create(['name'=>'turno.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'turno.update'])->syncRoles([$admin]);

        Permission::create(['name'=>'contrato.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'contrato.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'contrato.store'])->syncRoles([$admin]);
        Permission::create(['name'=>'contrato.destroy'])->syncRoles([$admin]);
        Permission::create(['name'=>'contrato.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'contrato.update'])->syncRoles([$admin]);

        Permission::create(['name'=>'servicio.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'servicio.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'servicio.store'])->syncRoles([$admin]);
        Permission::create(['name'=>'servicio.destroy'])->syncRoles([$admin]);
        Permission::create(['name'=>'servicio.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'servicio.update'])->syncRoles([$admin]);

        Permission::create(['name'=>'solicitud.index'])->syncRoles([$admin, $cliente]);
        Permission::create(['name'=>'solicitud.create'])->syncRoles([$admin,$cliente]);
        Permission::create(['name'=>'solicitud.store'])->syncRoles([$admin,$cliente]);
        Permission::create(['name'=>'solicitud.cancelar'])->syncRoles([$admin]);

        Permission::create(['name'=>'orden.index'])->syncRoles([$trabajador,$admin,$cliente]);
        Permission::create(['name'=>'orden.create'])->syncRoles([$admin,]);
        Permission::create(['name'=>'orden.store'])->syncRoles([$admin, $cliente]);
        Permission::create(['name'=>'orden.aceptar'])->syncRoles([$trabajador]);
        Permission::create(['name'=>'orden.asignar'])->syncRoles([$admin]);
        Permission::create(['name'=>'orden.guardarAsignar'])->syncRoles([$admin]);
    }
}
