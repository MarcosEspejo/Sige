<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egresado;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\JefeEgresadoMiddleware;
use App\Mail\AlertaEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Notification;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EgresadosImport;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class JefeEgresadoController extends Controller
{
    public function __construct()
    {
        // Elimina cualquier middleware aquí
    }

    public function index()
    {
        $egresados = Egresado::paginate(10); // O el método que uses para obtener los datos
        return view('JefeEgresados.index', compact('egresados'));
    }

    public function create()
    {
        return view('JefeEgresados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'primer_nombre' => 'required|string|max:255',
            'segundo_nombre' => 'nullable|string|max:255',
            'primer_apellido' => 'required|string|max:255',
            'segundo_apellido' => 'nullable|string|max:255',
            'documento' => 'required|string|unique:egresados,documento',
            'email' => 'required|email|unique:egresados,email',
            'password' => 'required|string|min:6',
            'sexo' => 'nullable|in:M,F,O',
            'fecha_nacimiento' => 'nullable|date',
            'nivel_educacion' => 'nullable|string',
            'direccion_postal' => 'nullable|string',
            'telefono' => 'nullable|string',
            'fax_laboral' => 'nullable|string',
            'empresa' => 'nullable|string',
            'cargo' => 'nullable|string',
            'programa' => 'required|string',
            'ano_graduacion' => 'required|integer|min:1900|max:' . date('Y'),
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // máximo 2MB
        ]);

        try {
            $egresado = new Egresado($request->except('foto'));
            
            if ($request->hasFile('foto')) {
                // Asegúrate de que el directorio existe
                Storage::makeDirectory('public/egresados');
                
                $path = $request->file('foto')->store('public/egresados');
                if (!$path) {
                    \Log::error('Error al guardar la foto', [
                        'error' => 'No se pudo guardar el archivo'
                    ]);
                    return back()->withErrors(['foto' => 'Error al guardar la imagen']);
                }
                $egresado->foto_url = Storage::url($path);
            }

            if ($egresado->save()) {
                return redirect()->route('jefe_egresados.index')
                    ->with('success', 'Egresado registrado exitosamente.');
            }

            return back()->withInput()
                ->withErrors(['error' => 'Error al registrar el egresado.']);

        } catch (\Exception $e) {
            \Log::error('Error al crear egresado:', [
                'error' => $e->getMessage(),
                'request' => $request->all()
            ]);
            
            return back()->withInput()
                ->withErrors(['error' => 'Error al procesar la solicitud: ' . $e->getMessage()]);
        }
    }

   

    public function update(Request $request, Egresado $egresado)
    {
        $request->validate([
            'primer_nombre' => 'required|string|max:255',
            'segundo_nombre' => 'nullable|string|max:255',
            'email' => 'required|email|unique:egresados,email,' . $egresado->id,
            'telefono' => 'nullable|string|max:20',
            'direccion_postal' => 'nullable|string|max:255',
            'sexo' => 'required|in:M,F,O',
            'fecha_nacimiento' => 'nullable|date',
            'programa' => 'required|string|max:255',
            'ano_graduacion' => 'required|integer|min:1900|max:' . date('Y'),
            'nivel_educacion' => 'nullable|string|max:255',
            'empresa' => 'nullable|string|max:255',
            'cargo' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            // Actualizar los datos del egresado
            $egresado->fill($request->except('foto'));

            // Manejar la foto si se sube una nueva
            if ($request->hasFile('foto')) {
                if ($egresado->foto_url) {
                    // Eliminar la foto anterior
                    Storage::delete(str_replace('/storage', 'public', $egresado->foto_url));
                }

                $path = $request->file('foto')->store('public/egresados');
                $egresado->foto_url = Storage::url($path);
            }

            $egresado->save();

            return redirect()->route('jefe_egresados.index')
                ->with('success', 'Egresado actualizado exitosamente.');
        } catch (\Exception $e) {
            \Log::error('Error al actualizar el egresado: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Error al actualizar el egresado.']);
        }
    }

    public function destroy(Egresado $egresado)
    {
        if ($egresado->foto_url) {
            Storage::delete(str_replace('/storage', 'public', $egresado->foto_url));
        }
        $egresado->delete();

        return redirect()->route('jefe_egresados.index')
            ->with('success', 'Egresado eliminado exitosamente.');
    }

    public function mostrarInicioSesion()
    {
        return view('JefeEgresados.login');
    }

    public function iniciarSesion(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('jefe_egresado')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('jefe_egresados.index'));
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('jefe_egresado')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function mostrarRegistro()
    {
        return view('JefeEgresados.register');
    }

    public function registrar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:jefe_egresados',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $jefeEgresado = new \App\Models\JefeEgresado([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $jefeEgresado->save();

        // Eliminar el login automático y redirigir al login
        return redirect()->route('jefe_egresados.login')
            ->with('success', 'Registro exitoso. Por favor, inicie sesión.');
    }

    public function dashboard()
    {
        // Obtener el total de egresados
        $totalEgresados = Egresado::count();

        // Obtener el conteo de egresados por carrera
        $conteoCarreras = Egresado::select('programa', \DB::raw('count(*) as cantidad'))
            ->groupBy('programa')
            ->pluck('cantidad', 'programa');

        // Pasar las variables a la vista
        return view('JefeEgresados.dashboard', compact('totalEgresados', 'conteoCarreras'));
    }

    public function busquedaAvanzada(Request $request)
    {
        $query = $request->input('query');
        $programa = $request->input('programa');

        $egresados = Egresado::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('nombre', 'like', "%{$query}%")
                                 ->orWhere('apellido', 'like', "%{$query}%")
                                 ->orWhere('documento', 'like', "%{$query}%"); // Filtrar por documento
        })
        ->when($programa, function ($queryBuilder) use ($programa) {
            return $queryBuilder->where('programa', 'like', "%{$programa}%");
        })
        ->paginate(10);

        return view('JefeEgresados.busquedaAvanzada', compact('egresados'));
    }

    public function egresadosPorCarrera($carrera)
    {
        // Obtener los egresados de la carrera específica
        $egresados = Egresado::where('programa', $carrera)->get();

        // Pasar los egresados a la vista
        return view('JefeEgresados.egresadosPorCarrera', compact('egresados', 'carrera'));
    }

    public function sendAlert(Request $request)
    {
        $request->validate([
            'egresado_id' => 'required|exists:egresados,id',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $egresado = Egresado::find($request->egresado_id);

        // Crear la notificación en la base de datos
        $notification = Notification::create([
            'egresado_id' => $request->egresado_id,
            'title' => $request->title,
            'message' => $request->message,
        ]);

        // Enviar correo electrónico
        $messageContent = [
            'title' => $request->title,
            'message' => $request->message,
            'egresado' => $egresado
        ];

        Mail::to($egresado->email)->send(new AlertaEmail($messageContent));

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Alerta enviada exitosamente'
            ]);
        }

        return redirect()->back()->with('success', 'Alerta enviada exitosamente');
    }

    public function mostrarAlerta()
    {
        $egresados = Egresado::all();
        return view('JefeEgresados.alerta', compact('egresados'));
    }

    public function mostrarFormulario()
    {
        return view('JefeEgresados.enviar_alerta');
    }

    public function alertasEnviadas()
    {
        $notifications = Notification::with('egresado')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('JefeEgresados.alertas_enviadas', compact('notifications'));
    }

    public function editAlerta(Notification $notification)
    {
        return view('JefeEgresados.edit_alerta', compact('notification'));
    }

    public function updateAlerta(Request $request, Notification $notification)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $notification->update([
            'title' => $request->title,
            'message' => $request->message,
        ]);

        return redirect()->route('jefe_egresados.alertas.index')
            ->with('success', 'Alerta actualizada correctamente.');
    }

    public function destroyAlerta(Notification $notification)
    {
        $notification->delete();
        return redirect()->route('jefe_egresados.alertas.index')
            ->with('success', 'Alerta eliminada correctamente.');
    }
    public function importExcel(Request $request)
    {
        try {
            $request->validate([
                'excel_file' => 'required|file|mimetypes:text/plain,text/csv,application/csv,text/comma-separated-values|max:2048'
            ]);
    
            $file = $request->file('excel_file');
    
            if (!$file->isValid()) {
                throw new \Exception('Archivo no válido o corrupto');
            }
    
            $count = 0;
            DB::beginTransaction();
    
            // Abrir archivo CSV con soporte para UTF-8 BOM
            $path = $file->getPathname();
            $handle = fopen($path, 'r');
    
            if (!$handle) {
                throw new \Exception('No se pudo abrir el archivo');
            }
    
            // Leer primera línea (encabezados)
            $headers = fgetcsv($handle);
            if (!$headers) {
                throw new \Exception('No se pudieron leer los encabezados del archivo');
            }
    
            // Limpiar posibles BOM en el primer encabezado
            $headers[0] = preg_replace('/^\xEF\xBB\xBF/', '', $headers[0]);
    
            $requiredHeaders = [
                'primer_nombre', 'primer_apellido', 'documento',
                'email', 'programa', 'ano_graduacion'
            ];
    
            if (!$this->validateHeaders($headers, $requiredHeaders)) {
                throw new \Exception('El archivo no contiene las columnas requeridas: ' . implode(', ', $requiredHeaders));
            }
    
            // Procesar cada línea
            while (($row = fgetcsv($handle)) !== false) {
                if (count($row) !== count($headers)) {
                    continue; // Saltar filas con columnas incompletas
                }
    
                $data = array_combine($headers, $row);
                if (!$data) {
                    continue;
                }
    
                // Validación básica
                if (empty($data['primer_nombre']) || empty($data['documento']) || empty($data['email'])) {
                    continue;
                }
    
                // Crear o actualizar egresado
                Egresado::updateOrCreate(
                    ['documento' => $data['documento']],
                    [
                        'primer_nombre'      => $data['primer_nombre'],
                        'segundo_nombre'     => $data['segundo_nombre'] ?? null,
                        'primer_apellido'    => $data['primer_apellido'],
                        'segundo_apellido'   => $data['segundo_apellido'] ?? null,
                        'email'              => $data['email'],
                        'password'           => Hash::make($data['documento']),
                        'sexo'               => $data['sexo'] ?? null,
                        'fecha_nacimiento'   => $data['fecha_nacimiento'] ?? null,
                        'nivel_educacion'    => $data['nivel_educacion'] ?? null,
                        'direccion_postal'   => $data['direccion_postal'] ?? null,
                        'telefono'           => $data['telefono'] ?? null,
                        'fax_laboral'        => $data['fax_laboral'] ?? null,
                        'empresa'            => $data['empresa'] ?? null,
                        'cargo'              => $data['cargo'] ?? null,
                        'programa'           => $data['programa'],
                        'ano_graduacion'     => $data['ano_graduacion'],
                    ]
                );
    
                $count++;
            }
    
            fclose($handle);
            DB::commit();
    
            return response()->json([
                'success' => true,
                'count' => $count,
                'message' => "Se importaron $count registros exitosamente"
            ]);
    
        } catch (\Exception $e) {
            if (isset($handle) && is_resource($handle)) {
                fclose($handle);
            }
            DB::rollBack();
            \Log::error('Error en importación: ' . $e->getMessage());
    
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    

    private function validateHeaders($headers, $requiredHeaders)
    {
        if (!$headers) return false;
        
        $headers = array_map('strtolower', $headers);
        foreach ($requiredHeaders as $required) {
            if (!in_array(strtolower($required), $headers)) {
                return false;
            }
        }
        return true;
    }

    public function model(array $row)
    {
        $this->rowCount++;
        return new Egresado([
            'primer_nombre' => $row['primer_nombre'],
            'segundo_nombre' => $row['segundo_nombre'],
            'primer_apellido' => $row['primer_apellido'],
            'segundo_apellido' => $row['segundo_apellido'],
            'documento' => $row['documento'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
            'sexo' => $row['sexo'],
            'fecha_nacimiento' => $row['fecha_nacimiento'],
            'nivel_educacion' => $row['nivel_educacion'],
            'direccion_postal' => $row['direccion_postal'],
            'telefono' => $row['telefono'],
            'fax_laboral' => $row['fax_laboral'],
            'empresa' => $row['empresa'],
            'cargo' => $row['cargo'],
            'programa' => $row['programa'],
            'ano_graduacion' => $row['ano_graduacion'],
            'foto_url' => $row['foto_url'] ?? null,
        ]);
    }

    public function rules(): array
    {
        return [
            'primer_nombre' => ['required', 'string', 'max:255'],
            'segundo_nombre' => ['nullable', 'string', 'max:255'],
            'primer_apellido' => ['required', 'string', 'max:255'],
            'segundo_apellido' => ['nullable', 'string', 'max:255'],
            // ... resto de las reglas
        ];
    }

    public function show(Egresado $egresado)
    {
        return view('JefeEgresados.show', compact('egresado'));
    }

    public function alertas()
    {
        return view('JefeEgresados.alertas.index');
    }

    public function descargarPlantilla()
    {
        $egresados = Egresado::all(); // Obtén los egresados desde la base de datos

        $csvData = "Nombre,Apellido,Programa,Año de Graduación\n"; // Encabezados del archivo
        foreach ($egresados as $egresado) {
            $csvData .= "{$egresado->primer_nombre},{$egresado->primer_apellido},{$egresado->programa},{$egresado->ano_graduacion}\n";
        }

        $fileName = "egresados_" . date('Y-m-d') . ".csv";

        return Response::make($csvData, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$fileName}",
        ]);
    }

    public function enviarAlerta()
    {
        $egresados = Egresado::select(
            'id', 
            'primer_nombre', 
            'segundo_nombre', 
            'primer_apellido', 
            'segundo_apellido', 
            'programa'
        )
        ->orderBy('primer_nombre')
        ->orderBy('primer_apellido')
        ->get();
        
        return view('JefeEgresados.enviar_alerta', compact('egresados'));
    }

    public function edit(Egresado $egresado)
    {
        return view('JefeEgresados.edit', compact('egresado'));
    }
}