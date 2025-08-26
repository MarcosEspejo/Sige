@extends('layouts.app')

@section('title', 'Detalles del Egresado - Universidad Los Libertadores')

@section('content')
<div class="bg-white shadow-lg rounded-lg overflow-hidden max-w-4xl mx-auto">
    <div class="bg-libertadores-green p-6">
        <h1 class="text-3xl font-bold text-white mb-2">Detalles del Egresado</h1>
    </div>
    <div class="p-6">
        <div class="flex items-center space-x-4 mb-6">
            <div class="relative">
                <img class="h-24 w-24 rounded-full object-cover border-2 border-libertadores-green" 
                     src="{{ $egresado->foto_url ?? asset('images/default-avatar.png') }}" 
                     alt="{{ $egresado->primer_nombre }}">
                <div class="absolute -bottom-1 -right-1 h-5 w-5 bg-green-500 rounded-full border-2 border-white"></div>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-libertadores-green">
                    {{ $egresado->primer_nombre }} {{ $egresado->segundo_nombre }} 
                    {{ $egresado->primer_apellido }} {{ $egresado->segundo_apellido }}
                </h2>
                <p class="text-gray-600 flex items-center">
                    <i class="fas fa-graduation-cap mr-2 text-libertadores-green"></i>
                    {{ $egresado->programa }}
                </p>
            </div>
        </div>

        <!-- Información Personal -->
        <div class="bg-gray-50 rounded-lg p-6 mb-6">
            <h3 class="text-xl font-bold text-libertadores-green mb-4 flex items-center">
                <i class="fas fa-user mr-2"></i>
                Información Personal
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm font-medium text-gray-500">Documento</p>
                    <p class="text-lg">{{ $egresado->documento }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Sexo</p>
                    <p class="text-lg">{{ $egresado->sexo == 'M' ? 'Masculino' : ($egresado->sexo == 'F' ? 'Femenino' : 'Otro') }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Fecha de Nacimiento</p>
                    <p class="text-lg">{{ date('d/m/Y', strtotime($egresado->fecha_nacimiento)) }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Nivel de Educación</p>
                    <p class="text-lg">{{ $egresado->nivel_educacion }}</p>
                </div>
            </div>
        </div>

        <!-- Información de Contacto -->
        <div class="bg-gray-50 rounded-lg p-6 mb-6">
            <h3 class="text-xl font-bold text-libertadores-green mb-4 flex items-center">
                <i class="fas fa-address-card mr-2"></i>
                Información de Contacto
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm font-medium text-gray-500">Correo Electrónico</p>
                    <p class="text-lg">{{ $egresado->email }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Teléfono</p>
                    <p class="text-lg">{{ $egresado->telefono ?? 'No registrado' }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Dirección Postal</p>
                    <p class="text-lg">{{ $egresado->direccion_postal ?? 'No registrada' }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Fax Laboral</p>
                    <p class="text-lg">{{ $egresado->fax_laboral ?? 'No registrado' }}</p>
                </div>
            </div>
        </div>

        <!-- Información Académica y Profesional -->
        <div class="bg-gray-50 rounded-lg p-6 mb-6">
            <h3 class="text-xl font-bold text-libertadores-green mb-4 flex items-center">
                <i class="fas fa-briefcase mr-2"></i>
                Información Académica y Profesional
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm font-medium text-gray-500">Programa</p>
                    <p class="text-lg">{{ $egresado->programa }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Año de Graduación</p>
                    <p class="text-lg">{{ $egresado->ano_graduacion }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Empresa Actual</p>
                    <p class="text-lg">{{ $egresado->empresa ?? 'No registrada' }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Cargo Actual</p>
                    <p class="text-lg">{{ $egresado->cargo ?? 'No registrado' }}</p>
                </div>
            </div>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('jefe_egresados.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                <i class="fas fa-arrow-left mr-2"></i>
                Volver 
            </a>
            <a href="{{ route('egresados.edit', $egresado->id) }}" 
               class="bg-libertadores-green hover:bg-libertadores-gold text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                <i class="fas fa-edit mr-2"></i>
                Editar
            </a>
        </div>
    </div>
</div>
@endsection