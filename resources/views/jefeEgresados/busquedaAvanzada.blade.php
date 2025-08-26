@extends('layouts.app')

@section('title', 'Búsqueda Avanzada - Egresados')

@section('content')
<div class="container mx-auto py-6">
    <a href="{{ route('jefe_egresados.index') }}" class="inline-flex items-center mb-4 text-libertadores-green hover:text-libertadores-gold transition-colors duration-300">
        <i class="fas fa-arrow-left text-2xl"></i>
        <span class="ml-2">Volver</span>
    </a>

    <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
        <h1 class="text-3xl font-bold mb-6 text-libertadores-green flex items-center">
            <i class="fas fa-search mr-3"></i>
            Búsqueda Avanzada de Egresados
        </h1>

        <form action="{{ route('jefe_egresados.busquedaAvanzada') }}" method="GET" class="mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                    <input type="text" 
                           name="query" 
                           placeholder="Buscar por nombre, apellido o documento" 
                           class="pl-10 w-full border border-gray-300 rounded-lg p-3 focus:ring-libertadores-green focus:border-libertadores-green">
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-graduation-cap text-gray-400"></i>
                    </div>
                    <input type="text" 
                           name="programa" 
                           placeholder="Buscar por programa" 
                           class="pl-10 w-full border border-gray-300 rounded-lg p-3 focus:ring-libertadores-green focus:border-libertadores-green">
                </div>
            </div>
            <div class="mt-4 flex justify-end">
                <button type="submit" class="bg-libertadores-green text-white rounded-lg px-6 py-3 hover:bg-libertadores-gold transition duration-300 flex items-center">
                    <i class="fas fa-search mr-2"></i> 
                    Buscar
                </button>
            </div>
        </form>
    </div>

    @if(isset($egresados) && $egresados->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($egresados as $egresado)
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <div class="h-16 w-16 rounded-full bg-libertadores-green flex items-center justify-center text-white text-xl">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-lg font-medium text-gray-900 truncate">
                                <a href="{{ route('egresados.show', $egresado->id) }}" class="hover:text-libertadores-gold transition duration-300">
                                    {{ $egresado->nombre }} {{ $egresado->apellido }}
                                </a>
                            </p>
                            <p class="text-sm text-gray-500 truncate flex items-center">
                                <i class="fas fa-graduation-cap mr-2 text-libertadores-green"></i>
                                {{ $egresado->programa }}
                            </p>
                            <p class="text-sm text-gray-500 mt-1 flex items-center">
                                <i class="fas fa-calendar mr-2 text-libertadores-green"></i>
                                Año de graduación: {{ $egresado->ano_graduacion }}
                            </p>
                        </div>
                        <div class="text-libertadores-green hover:text-libertadores-gold transition-colors duration-300">
                            <a href="{{ route('egresados.show', $egresado->id) }}" class="inline-flex items-center">
                                <span class="sr-only">Ver detalles</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-6">
            {{ $egresados->links() }}
        </div>
    @else
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 rounded-r-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-triangle text-yellow-400 text-xl"></i>
                </div>
                <div class="ml-3">
                    <p class="text-yellow-700">
                        No se encontraron egresados que coincidan con los criterios de búsqueda.
                    </p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection