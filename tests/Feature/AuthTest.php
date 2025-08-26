<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function egresado_puede_iniciar_sesion()
    {
        $user = User::factory()->create([
            'role' => 'egresado',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123',
        ]);

        $response->assertRedirect('/dashboard/egresados');
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function usuario_con_password_incorrecto_no_puede_loguearse()
    {
        $user = User::factory()->create(['password' => bcrypt('password123')]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrongpass',
        ]);

        $response->assertSessionHasErrors();
        $this->assertGuest();
    }

    /** @test */
public function jefe_no_puede_acceder_a_rutas_de_admin()
{
    $user = User::factory()->create(['role' => 'jefe']);

    $this->actingAs($user);

    $response = $this->get('/admin/dashboard');

    $response->assertStatus(403); // acceso prohibido
}

}


