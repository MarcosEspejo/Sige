@extends('layouts.app')

@section('title', 'Editar Egresado - Universidad Los Libertadores')

@section('content')
<div class="bg-white shadow-lg rounded-lg overflow-hidden max-w-4xl mx-auto">
    <div class="bg-libertadores-green p-6">
        <h1 class="text-3xl font-bold text-white mb-2">Editar Egresado</h1>
        <p class="text-libertadores-gold">Actualiza la información del egresado.</p>
    </div>
    <div class="p-6">
        <form action="{{ route('jefe_egresados.update', $egresado) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Información Personal -->
            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                <h2 class="text-xl font-bold text-libertadores-green mb-4">Información Personal</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="primer_nombre" class="block text-sm font-medium text-gray-700">Primer Nombre</label>
                        <input type="text" name="primer_nombre" id="primer_nombre" value="{{ old('primer_nombre', $egresado->primer_nombre) }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-libertadores-green focus:ring-libertadores-green">
                    </div>

                    <div>
                        <label for="segundo_nombre" class="block text-sm font-medium text-gray-700">Segundo Nombre</label>
                        <input type="text" name="segundo_nombre" id="segundo_nombre" value="{{ old('segundo_nombre', $egresado->segundo_nombre) }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-libertadores-green focus:ring-libertadores-green">
                    </div>

                    <div>
                        <label for="documento" class="block text-sm font-medium text-gray-700">Documento</label>
                        <input type="text" id="documento" value="{{ $egresado->documento }}" class="mt-1 block w-full rounded-md bg-gray-100" readonly>
                        <input type="hidden" name="documento" value="{{ $egresado->documento }}">
                    </div>

                    <div>
                        <label for="sexo" class="block text-sm font-medium text-gray-700">Sexo</label>
                        <select name="sexo" id="sexo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-libertadores-green focus:ring-libertadores-green">
                            <option value="M" {{ old('sexo', $egresado->sexo) == 'M' ? 'selected' : '' }}>Masculino</option>
                            <option value="F" {{ old('sexo', $egresado->sexo) == 'F' ? 'selected' : '' }}>Femenino</option>
                            <option value="O" {{ old('sexo', $egresado->sexo) == 'O' ? 'selected' : '' }}>Otro</option>
                        </select>
                    </div>

                    <div>
                        <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $egresado->fecha_nacimiento) }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-libertadores-green focus:ring-libertadores-green">
                    </div>
                </div>
            </div>

            <!-- Información de Contacto -->
            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                <h2 class="text-xl font-bold text-libertadores-green mb-4">Información de Contacto</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $egresado->email) }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-libertadores-green focus:ring-libertadores-green">
                    </div>

                    <div>
                        <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                        <input type="tel" name="telefono" id="telefono" value="{{ old('telefono', $egresado->telefono) }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-libertadores-green focus:ring-libertadores-green">
                    </div>

                    <div>
                        <label for="direccion_postal" class="block text-sm font-medium text-gray-700">Dirección Postal</label>
                        <input type="text" name="direccion_postal" id="direccion_postal" value="{{ old('direccion_postal', $egresado->direccion_postal) }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-libertadores-green focus:ring-libertadores-green">
                    </div>

                    <div>
                        <label for="fax_laboral" class="block text-sm font-medium text-gray-700">Fax Laboral</label>
                        <input type="text" name="fax_laboral" id="fax_laboral" value="{{ old('fax_laboral', $egresado->fax_laboral) }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-libertadores-green focus:ring-libertadores-green">
                    </div>
                </div>
            </div>

            <!-- Información Académica y Profesional -->
            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                <h2 class="text-xl font-bold text-libertadores-green mb-4">Información Académica y Profesional</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="programa" class="block text-sm font-medium text-gray-700">Programa</label>
                        <select name="programa" id="programa" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-libertadores-green focus:ring-libertadores-green" required>
                            <option value="">Seleccione un programa</option>
                            <option value="Ingeniería de Sistemas" {{ old('programa', $egresado->programa) == 'Ingeniería de Sistemas' ? 'selected' : '' }}>Ingeniería de Sistemas</option>
                            <option value="Administración de Empresas" {{ old('programa', $egresado->programa) == 'Administración de Empresas' ? 'selected' : '' }}>Administración de Empresas</option>
                            <option value="Gastronomia" {{ old('programa', $egresado->programa) == 'Gastronomia' ? 'selected' : '' }}>Gastronomia</option>
                            <option value="Ingenieria Civil" {{ old('programa', $egresado->programa) == 'Ingeniería Civil' ? 'selected' : '' }}>Ingenieria Civil</option>
                            <option value="Desarrollo de Software" {{ old('programa', $egresado->programa) == 'Desarrollo de Software' ? 'selected' : '' }}>Desarrollo de Software</option>
                            <option value="Derecho" {{ old('programa', $egresado->programa) == 'Derecho' ? 'selected' : '' }}>Derecho</option>
                        </select>
                    </div>

                    <div>
                        <label for="nivel_educacion" class="block text-sm font-medium text-gray-700">Nivel de Educación</label>
                        <select name="nivel_educacion" id="nivel_educacion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-libertadores-green focus:ring-libertadores-green">
                            <option value="Pregrado" {{ old('nivel_educacion', $egresado->nivel_educacion) == 'Pregrado' ? 'selected' : '' }}>Pregrado</option>
                            <option value="Especialización" {{ old('nivel_educacion', $egresado->nivel_educacion) == 'Especialización' ? 'selected' : '' }}>Especialización</option>
                            <option value="Maestría" {{ old('nivel_educacion', $egresado->nivel_educacion) == 'Maestría' ? 'selected' : '' }}>Maestría</option>
                            <option value="Doctorado" {{ old('nivel_educacion', $egresado->nivel_educacion) == 'Doctorado' ? 'selected' : '' }}>Doctorado</option>
                        </select>
                    </div>

                    <div>
                        <label for="ano_graduacion" class="block text-sm font-medium text-gray-700">Año de Graduación</label>
                        <input type="number" name="ano_graduacion" id="ano_graduacion" value="{{ old('ano_graduacion', $egresado->ano_graduacion) }}" 
                               min="1900" max="{{ date('Y') }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-libertadores-green focus:ring-libertadores-green">
                    </div>

                    <div>
                        <label for="empresa" class="block text-sm font-medium text-gray-700">Empresa Actual</label>
                        <input type="text" name="empresa" id="empresa" value="{{ old('empresa', $egresado->empresa) }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-libertadores-green focus:ring-libertadores-green">
                    </div>

                    <div>
                        <label for="cargo" class="block text-sm font-medium text-gray-700">Cargo Actual</label>
                        <input type="text" name="cargo" id="cargo" value="{{ old('cargo', $egresado->cargo) }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-libertadores-green focus:ring-libertadores-green">
                    </div>

                    <div>
                        <label for="foto" class="block text-sm font-medium text-gray-700">Foto de Perfil</label>
                        <input type="file" name="foto" id="foto" accept="image/*" 
                               class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-libertadores-green file:text-white hover:file:bg-libertadores-gold">
                        @if($egresado->foto_url)
                        <div class="mt-2">
                            <img src="{{ $egresado->foto_url }}" alt="Foto actual" class="w-20 h-20 object-cover rounded-full">
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('jefe_egresados.index') }}" 
                   class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                    Cancelar
                </a>
                <button type="submit" 
                        class="bg-libertadores-green hover:bg-libertadores-gold text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                    Guardar Cambios
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
