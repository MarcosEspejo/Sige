<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear permisos básicos
        Permission::create(['name' => 'ver perfil']);
        Permission::create(['name' => 'editar perfil']);
        Permission::create(['name' => 'gestionar egresados']);
        Permission::create(['name' => 'gestionar sistema']);

        // Crear roles y asignar permisos
        $egresadoRole = Role::create(['name' => 'egresado']);
        $egresadoRole->givePermissionTo(['ver perfil', 'editar perfil']);

        $jefeRole = Role::create(['name' => 'jefeegresado']);
        $jefeRole->givePermissionTo([
            'ver perfil', 
            'editar perfil', 
            'gestionar egresados'
        ]);

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());
    }
}
