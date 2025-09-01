<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Limpiar caché
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear roles
        $roleEgresado = Role::firstOrCreate(['name' => 'egresado']);
        $roleJefe = Role::firstOrCreate(['name' => 'jefeegresado']);

        // Crear usuario jefe de egresados
        $jefeEgresado = User::updateOrCreate(
            ['email' => 'jefe@test.com'],
            [
                'name' => 'Jefe de Egresados',
                'email' => 'jefe@test.com',
                'password' => Hash::make('123456'),
                'email_verified_at' => now(),
                'rol' => 'jefeegresado', // 👈 nuevo
            ]
        );
        $jefeEgresado->assignRole('jefeegresado');

        // Crear usuario egresado
        $egresado = User::updateOrCreate(
            ['email' => 'egresado@test.com'],
            [
                'name' => 'Egresado Test',
                'email' => 'egresado@test.com',
                'password' => Hash::make('123456'),
                'email_verified_at' => now(),
                'rol' => 'egresado', // 👈 nuevo
            ]
        );
        $egresado->assignRole('egresado');

        // Log para verificar
        \Log::info('Usuarios creados:', [
            'jefe' => $jefeEgresado->id,
            'egresado' => $egresado->id
        ]);
    }
}
