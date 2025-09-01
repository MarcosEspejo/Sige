<?php

namespace App\Http\Controllers;

use App\Models\Egresado;
use App\Models\Noticia;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class EgresadoController extends Controller
{
    public function create()
    {
        return view('egresados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'documento' => 'required|string|unique:egresados,documento',
            'email' => 'required|email|unique:egresados,email',
            'programa' => 'required|string|max:255',
            'ano_graduacion' => 'required|integer|min:1900|max:' . date('Y'),
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $egresado = new Egresado($request->except('foto'));

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/egresados');
            $egresado->foto_url = Storage::url($path);
        }

        $egresado->save();

        return redirect()->route('egresados.index')
            ->with('success', 'Egresado registrado exitosamente.');
    }

    public function index()
    {
        $egresado = Auth::user();


        return view('egresados.index', compact('egresado'));
    }

    public function show()
    {
        $egresado = Egresado::findOrFail($id);
    return view('egresados.show', compact('egresado'));
    }

    public function edit(Egresado $egresado)
    {
        return view('Egresados.edit', compact('egresado'));
    }

    public function update(Request $request, Egresado $egresado)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:egresados,email,' . $egresado->id,
            'programa' => 'required|string|max:255',
            'ano_graduacion' => 'required|integer|min:1900|max:' . date('Y'),
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $egresado->nombre = $request->nombre;
        $egresado->apellido = $request->apellido;
        $egresado->email = $request->email;
        $egresado->programa = $request->programa;
        $egresado->ano_graduacion = $request->ano_graduacion;

        if ($request->hasFile('foto')) {
            if ($egresado->foto_url) {
                Storage::delete(str_replace('/storage', 'public', $egresado->foto_url));
            }

            $path = $request->file('foto')->store('public/egresados');
            $egresado->foto_url = Storage::url($path);
        }

        $egresado->save();

        return redirect()->route('egresados.show', $egresado)
            ->with('success', 'Egresado actualizado exitosamente.');
    }

    public function dashboard()
    {
        $egresado = Auth::user();
      

        return view('egresados.principalEgresados', compact('egresado', 'eventos', 'noticias'));
    }

    public function principalEgresados()
    {
        $eventos = Evento::latest()->take(3)->get();
        $noticias = Noticia::latest()->take(3)->get();

        return view('egresados.index', compact('eventos', 'noticias'));
    }

    public function indexFormLogin()
    {
        return view('egresados.login');
    }

    public function iniciarSesion(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'documento' => 'required|string',
        ]);

        $egresado = Egresado::where('email', $credentials['email'])
            ->where('documento', $credentials['documento'])
            ->first();

        if ($egresado) {
            Auth::login($egresado);
            return redirect()->route('egresados.index')->with('success', '¡Bienvenido!');
        }

        return back()->withErrors([
            'error' => 'Las credenciales proporcionadas no coinciden con nuestros registros.'
        ])->withInput($request->except('documento'));
    }

    public function buscar(Request $request)
    {
        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        $query = $request->input('query');

        $egresados = Egresado::where('nombre', 'LIKE', "%{$query}%")
            ->orWhere('apellido', 'LIKE', "%{$query}%")
            ->orWhere('programa', 'LIKE', "%{$query}%")
            ->paginate(15);

        return view('jefeEgresados.index', compact('egresados'));
    }

    public function busquedaAvanzada(Request $request)
    {
        $request->validate([
            'query' => 'nullable|string|max:255',
            'programa' => 'nullable|string|max:255',
        ]);

        $query = $request->input('query');
        $programa = $request->input('programa');

        $egresados = Egresado::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('nombre', 'LIKE', "%{$query}%")
                ->orWhere('apellido', 'LIKE', "%{$query}%");
        })
        ->when($programa, function ($queryBuilder) use ($programa) {
            return $queryBuilder->where('programa', 'LIKE', "%{$programa}%");
        })
        ->paginate(15);

        return view('jefeEgresados.busquedaAvanzada', compact('egresados'));
    }

    public function showRegistrationForm()
    {
        return view('egresados.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'documento' => 'required|string|unique:egresados,documento',
            'email' => 'required|email|unique:egresados,email',
            'programa' => 'required|string|max:255',
            'ano_graduacion' => 'required|integer|min:1900|max:' . date('Y'),
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $egresado = new Egresado($request->except('foto'));

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/egresados');
            $egresado->foto_url = Storage::url($path);
        }

        $egresado->save();

        return redirect()->route('egresados.login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }

    public function notifications()
    {
    }

    public function markNotificationAsRead(Notification $notification)
    {
        if ($notification->egresado_id === auth()->id()) {
            $notification->update(['read' => true]);
            return back()->with('success', 'Notificación marcada como leída.');
        }

        return back()->with('error', 'No tienes permiso para modificar esta notificación.');
    }

    public function destroyNotification(Notification $notification)
    {
        if ($notification->egresado_id === auth()->id()) {
            $notification->delete();
            return back()->with('success', 'Notificación eliminada correctamente.');
        }

        return back()->with('error', 'No tienes permiso para eliminar esta notificación.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('egresados.login')->with('success', 'Has cerrado sesión correctamente.');
    }
}
