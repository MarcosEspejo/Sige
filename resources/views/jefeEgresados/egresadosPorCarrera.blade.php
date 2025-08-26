@extends('layouts.app')

@section('title', 'Egresados de ' . $carrera)

@section('content')
<div class="container mx-auto py-6">
    <a href="{{ route('jefe_egresados.index') }}" class="inline-flex items-center mb-4 text-libertadores-green hover:text-libertadores-gold transition-colors duration-300">
        <i class="fas fa-arrow-left text-2xl"></i>
        <span class="ml-2">Volver</span>
    </a>

    <h1 class="text-3xl font-bold mb-4">Egresados de {{ $carrera }}</h1>

    @if($egresados->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($egresados as $egresado)
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-md transition duration-300">
                    <a href="{{ route('egresados.show', $egresado->id) }}" class="block">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                @if($egresado->foto_url)
                                    <img class="h-16 w-16 rounded-full object-cover border-2 border-libertadores-green" 
                                         src="{{ $egresado->foto_url }}" 
                                         alt="{{ $egresado->primer_nombre }} {{ $egresado->primer_apellido }}">
                                @else
                                    <div class="h-16 w-16 rounded-full bg-libertadores-green border-2 border-libertadores-green flex items-center justify-center">
                                        <span class="text-white text-xl font-bold">
                                            {{ substr($egresado->primer_nombre, 0, 1) }}{{ substr($egresado->primer_apellido, 0, 1) }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="mb-2">
                                    <h3 class="text-lg font-semibold text-gray-900 hover:text-libertadores-green">
                                        {{ $egresado->primer_nombre }} {{ $egresado->segundo_nombre }}
                                    </h3>
                                    <h4 class="text-md font-medium text-gray-800">
                                        {{ $egresado->primer_apellido }} {{ $egresado->segundo_apellido }}
                                    </h4>
                                </div>
                                <p class="text-sm text-gray-600 mb-2">
                                    <i class="fas fa-graduation-cap mr-1 text-libertadores-green"></i>
                                    {{ $egresado->programa }}
                                </p>
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="far fa-calendar-alt mr-2 text-libertadores-green"></i>
                                    <span>Graduación: {{ $egresado->ano_graduacion }}</span>
                                </div>
                            </div>
                            <div class="text-libertadores-green hover:text-libertadores-gold self-center">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-triangle text-yellow-400"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-yellow-700">
                        No hay egresados registrados para esta carrera.
                    </p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection