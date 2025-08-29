<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{    use PHPUnit\Framework\Attributes\Test;
    use RefreshDatabase;

    #[Test]
    public function egresado_is_redirected_to_egresados_dashboard()
    {
        $egresadoRole = Role::create(['name' => 'egresado']);
        $user = User::factory()->create(['password' => bcrypt('12345678')]);
        $user->assignRole($egresadoRole);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => '12345678',
        ]);

        $response->assertRedirect('/egresados/dashboard');
    }
}
