@extends('layouts.app')

@section('title', 'Detalles del Egresado')

@section('content')
<div class="container mx-auto px-4 py-6">
    <button onclick="history.back()" 
        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
    <i class="fas fa-arrow-left mr-2"></i>
    Volver
</button>
    <div class="bg-white rounded-lg shadow-lg p-8">
        <!-- Encabezado con foto y nombre -->
        <div class="flex items-center space-x-6 border-b-2 border-gray-200 pb-6 mb-6">
            <img class="h-32 w-32 rounded-full object-cover border-4 border-libertadores-green shadow-lg" 
                 src="{{ $egresado->foto_url ?? asset('images/default-avatar.png') }}" 
                 alt="{{ $egresado->primer_nombre }}">
            <div>
                <h1 class="text-4xl font-bold text-gray-800">{{ $egresado->primer_nombre }} {{ $egresado->primer_apellido }}</h1>
                <p class="text-lg text-gray-600">{{ $egresado->programa }}</p>
                <p class="text-sm text-gray-500">Año de Graduación: {{ $egresado->ano_graduacion }}</p>
            </div>
        </div>

        <!-- Información Personal -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-libertadores-green mb-4">Información Personal</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <p><strong>Documento:</strong> {{ $egresado->documento }}</p>
                <p><strong>Email:</strong> {{ $egresado->email }}</p>
                <p><strong>Teléfono:</strong> {{ $egresado->telefono }}</p>
                <p><strong>Dirección:</strong> {{ $egresado->direccion_postal }}</p>
                <p><strong>Sexo:</strong> {{ $egresado->sexo }}</p>
                <p><strong>Fecha de Nacimiento:</strong> {{ $egresado->fecha_nacimiento }}</p>
            </div>
        </div>

        <!-- Separador -->
        <hr class="my-8 border-gray-300">

        <!-- Información Académica -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-libertadores-green mb-4">Información Académica</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <p><strong>Programa:</strong> {{ $egresado->programa }}</p>
                <p><strong>Año de Graduación:</strong> {{ $egresado->ano_graduacion }}</p>
                <p><strong>Nivel de Educación:</strong> {{ $egresado->nivel_educacion }}</p>
            </div>
        </div>

        <!-- Separador -->
        <hr class="my-8 border-gray-300">

        <!-- Información Laboral -->
        <div>
            <h2 class="text-2xl font-bold text-libertadores-green mb-4">Información Laboral</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <p><strong>Empresa:</strong> {{ $egresado->empresa }}</p>
                <p><strong>Cargo:</strong> {{ $egresado->cargo }}</p>
                <p><strong>Fax Laboral:</strong> {{ $egresado->fax_laboral }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
