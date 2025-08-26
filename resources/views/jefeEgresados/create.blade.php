@extends('layouts.app')

@section('title', 'Crear Egresado - Universidad Los Libertadores')

@section('content')
<div class="bg-white shadow-lg rounded-lg overflow-hidden max-w-4xl mx-auto">
    <div class="bg-libertadores-green p-6">
        <h1 class="text-3xl font-bold text-white mb-2">Crear Nuevo Egresado</h1>
        <p class="text-libertadores-gold">Registra un nuevo egresado en el sistema.</p>
    </div>
    <div class="p-6">
        <form action="{{ route('jefe_egresados.store') }}" 
              method="POST" 
              enctype="multipart/form-data" 
              class="space-y-6">
            @csrf
            
            <!-- INFORMACIÓN BÁSICA -->
            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                <h2 class="text-xl font-bold text-libertadores-green mb-4">Información Personal</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nombres y Apellidos -->
                    <div>
                        <label for="primer_nombre" class="block text-sm font-medium text-gray-700">Primer Nombre</label>
                        <input type="text" name="primer_nombre" id="primer_nombre" required 
                               value="{{ old('primer_nombre') }}"
                               class="mt-1 focus:ring-libertadores-green focus:border-libertadores-green block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="segundo_nombre" class="block text-sm font-medium text-gray-700">Segundo Nombre</label>
                        <input type="text" name="segundo_nombre" id="segundo_nombre" 
                               value="{{ old('segundo_nombre') }}"
                               class="mt-1 focus:ring-libertadores-green focus:border-libertadores-green block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="primer_apellido" class="block text-sm font-medium text-gray-700">Primer Apellido</label>
                        <input type="text" name="primer_apellido" id="primer_apellido" required 
                               value="{{ old('primer_apellido') }}"
                               class="mt-1 focus:ring-libertadores-green focus:border-libertadores-green block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="segundo_apellido" class="block text-sm font-medium text-gray-700">Segundo Apellido</label>
                        <input type="text" name="segundo_apellido" id="segundo_apellido" 
                               value="{{ old('segundo_apellido') }}"
                               class="mt-1 focus:ring-libertadores-green focus:border-libertadores-green block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <!-- Información de Identificación -->
                    <div>
                        <label for="documento" class="block text-sm font-medium text-gray-700">Documento de Identidad</label>
                        <input type="text" name="documento" id="documento" required 
                               value="{{ old('documento') }}"
                               class="mt-1 focus:ring-libertadores-green focus:border-libertadores-green block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <!-- Información de Contacto -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                        <input type="email" name="email" id="email" required 
                               value="{{ old('email') }}"
                               class="mt-1 focus:ring-libertadores-green focus:border-libertadores-green block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <!-- Información Personal -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                        <input type="password" name="password" id="password" required
                               class="mt-1 focus:ring-libertadores-green focus:border-libertadores-green block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    
                    <div>
                        <label for="sexo" class="block text-sm font-medium text-gray-700">Sexo</label>
                        <select name="sexo" id="sexo" required 
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-libertadores-green focus:border-libertadores-green sm:text-sm">
                            <option value="">Seleccione...</option>
                            <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
                            <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Femenino</option>
                            <option value="O" {{ old('sexo') == 'O' ? 'selected' : '' }}>Otro</option>
                        </select>
                    </div>

                    <div>
                        <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required 
                               value="{{ old('fecha_nacimiento') }}"
                               class="mt-1 focus:ring-libertadores-green focus:border-libertadores-green block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
            </div>

            <!-- INFORMACIÓN DE CONTACTO -->
            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                <h2 class="text-xl font-bold text-libertadores-green mb-4">Información de Contacto</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="direccion_postal" class="block text-sm font-medium text-gray-700">Dirección Postal</label>
                        <input type="text" name="direccion_postal" id="direccion_postal" 
                               value="{{ old('direccion_postal') }}"
                               class="mt-1 focus:ring-libertadores-green focus:border-libertadores-green block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                        <input type="tel" name="telefono" id="telefono" 
                               value="{{ old('telefono') }}"
                               class="mt-1 focus:ring-libertadores-green focus:border-libertadores-green block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="fax_laboral" class="block text-sm font-medium text-gray-700">Fax Laboral</label>
                        <input type="text" name="fax_laboral" id="fax_laboral" 
                               value="{{ old('fax_laboral') }}"
                               class="mt-1 focus:ring-libertadores-green focus:border-libertadores-green block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
            </div>

            <!-- INFORMACIÓN ACADÉMICA -->
            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                <h2 class="text-xl font-bold text-libertadores-green mb-4">Información Académica</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nivel_educacion" class="block text-sm font-medium text-gray-700">Nivel de Educación</label>
                        <select name="nivel_educacion" id="nivel_educacion" required 
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-libertadores-green focus:border-libertadores-green sm:text-sm">
                            <option value="">Seleccione...</option>
                            <option value="Pregrado" {{ old('nivel_educacion') == 'Pregrado' ? 'selected' : '' }}>Pregrado</option>
                            <option value="Especialización" {{ old('nivel_educacion') == 'Especialización' ? 'selected' : '' }}>Especialización</option>
                            <option value="Maestría" {{ old('nivel_educacion') == 'Maestría' ? 'selected' : '' }}>Maestría</option>
                            <option value="Doctorado" {{ old('nivel_educacion') == 'Doctorado' ? 'selected' : '' }}>Doctorado</option>
                        </select>
                    </div>
                    <div>
                        <label for="programa" class="block text-sm font-medium text-gray-700">Programa Académico</label>
                        <select name="programa" id="programa" required 
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-libertadores-green focus:border-libertadores-green sm:text-sm">
                            <option value="">Seleccione un programa...</option>
                            <option value="Ingeniería de Sistemas" {{ old('programa') == 'Ingeniería de Sistemas' ? 'selected' : '' }}>Ingeniería de Sistemas</option>
                            <option value="Administración de Empresas" {{ old('programa') == 'Administración de Empresas' ? 'selected' : '' }}>Administración de Empresas</option>
                            <option value="Gastronomía" {{ old('programa') == 'Gastronomía' ? 'selected' : '' }}>Gastronomía</option>
                            <option value="Ingeniería Civil" {{ old('programa') == 'Ingeniería Civil' ? 'selected' : '' }}>Ingeniería Civil</option>
                            <option value="Desarrollo de Software" {{ old('programa') == 'Desarrollo de Software' ? 'selected' : '' }}>Desarrollo de Software</option>
                            <option value="Derecho" {{ old('programa') == 'Derecho' ? 'selected' : '' }}>Derecho</option>
                        </select>
                    </div>
                    <div>
                        <label for="ano_graduacion" class="block text-sm font-medium text-gray-700">Año de Graduación</label>
                        <input type="number" name="ano_graduacion" id="ano_graduacion" required 
                               value="{{ old('ano_graduacion') }}"
                               min="1900" max="{{ date('Y') }}" 
                               class="mt-1 focus:ring-libertadores-green focus:border-libertadores-green block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
            </div>

            <!-- INFORMACIÓN LABORAL -->
            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                <h2 class="text-xl font-bold text-libertadores-green mb-4">Información Laboral</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="empresa" class="block text-sm font-medium text-gray-700">Empresa Actual</label>
                        <input type="text" name="empresa" id="empresa" 
                               value="{{ old('empresa') }}"
                               class="mt-1 focus:ring-libertadores-green focus:border-libertadores-green block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="cargo" class="block text-sm font-medium text-gray-700">Cargo Actual</label>
                        <input type="text" name="cargo" id="cargo" 
                               value="{{ old('cargo') }}"
                               class="mt-1 focus:ring-libertadores-green focus:border-libertadores-green block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
            </div>

            <!-- FOTO DE PERFIL -->
            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                <h2 class="text-xl font-bold text-libertadores-green mb-4">Foto de Perfil</h2>
                <div>
                    <label for="foto" class="block text-sm font-medium text-gray-700">Foto de Perfil</label>
                    <input type="file" 
                           name="foto" 
                           id="foto" 
                           accept="image/*"
                           class="mt-1 block w-full text-sm text-gray-500
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-full file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-libertadores-green file:text-white
                                  hover:file:bg-libertadores-gold">
                </div>
            </div>

            <!-- Botones de acción -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('jefe_egresados.index') }}" 
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg transition duration-300">
                    Cancelar
                </a>
                <button type="submit" 
                        class="bg-libertadores-green hover:bg-libertadores-gold text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                    Crear Egresado
                </button>
            </div>
        </form>
    </div>
</div>

@if($errors->any())
<div class="mt-4">
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
@endsection

@push('scripts')
<script>
document.getElementById('foto').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const fileSize = file.size / 1024 / 1024; // convertir a MB

    // Validar el tamaño del archivo
    if (fileSize > 2) {
        Swal.fire({
            icon: 'error',
            title: 'Archivo demasiado grande',
            text: 'La imagen no debe superar los 2MB',
            confirmButtonColor: '#d33'
        });
        this.value = '';
        return;
    }

    // Validar el tipo de archivo
    if (!file.type.startsWith('image/')) {
        Swal.fire({
            icon: 'error',
            title: 'Tipo de archivo no válido',
            text: 'Por favor, seleccione una imagen',
            confirmButtonColor: '#d33'
        });
        this.value = '';
        return;
    }
});
</script>
@endpush