<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
 use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
   

public function run(): void
{
    // Crear permisos
    Permission::create(['name' => 'ver-eventos']);
    Permission::create(['name' => 'crear-eventos']);
    Permission::create(['name' => 'editar-eventos']);
    Permission::create(['name' => 'eliminar-eventos']);
    Permission::create(['name' => 'ver-reportes']);
    Permission::create(['name' => 'gestionar-usuarios']);

    // Crear roles y asignar permisos
    $egresado = Role::create(['name' => 'egresado']);
    $egresado->givePermissionTo(['ver-eventos']);

    $jefe = Role::create(['name' => 'jefe']);
    $jefe->givePermissionTo(['ver-eventos', 'crear-eventos', 'editar-eventos', 'ver-reportes']);

    $admin = Role::create(['name' => 'admin']);
    $admin->givePermissionTo(Permission::all()); // todos los permisos
}

}
