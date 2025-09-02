<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Mostrar vista de login
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Procesar login
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            
            $user = Auth::user();

            // Redirección según el rol
            if ($user->hasRole('jefeegresado')) {
                return redirect()->route('jefeEgresados.index')
                    ->with('success', '¡Bienvenido Jefe de Egresados!');
            }
            
            if ($user->hasRole('egresado')) {
                return redirect()->route('egresados.index')
                    ->with('success', '¡Bienvenido Egresado!');
            }

            if ($user->hasRole('admin')) {
            return redirect()->route('admin.index')
                ->with('success', '¡Bienvenido Administrador!');
            }

            // Si no tiene rol
            return redirect()->route('principal')
                ->with('error', 'No tienes un rol asignado.');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
        ])->onlyInput('email');
    }

    /**
     * Cerrar sesión
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}
