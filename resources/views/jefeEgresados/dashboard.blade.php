@extends('layouts.app')

@section('title', 'Dashboard - Jefe de Egresados')

@section('content')
<div class="container mx-auto py-6">
    <a href="{{ route('jefe_egresados.index') }}" class="inline-flex items-center mb-4 text-libertadores-green hover:text-libertadores-gold transition-colors duration-300">
        <i class="fas fa-arrow-left text-2xl"></i>
        <span class="ml-2">Volver</span>
    </a>

    <h1 class="text-3xl font-bold mb-4">Dashboard - Jefe de Egresados</h1>

    <div class="bg-white shadow-md rounded-lg p-6 mb-6 hover:shadow-lg transition-shadow duration-300">
        <div class="flex items-center">
            <i class="fas fa-user-graduate text-3xl text-libertadores-green mr-4"></i>
            <h2 class="text-xl font-semibold">Total de Egresados: {{ $totalEgresados }}</h2>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition-shadow duration-300">
        <div class="flex items-center mb-4">
            <i class="fas fa-graduation-cap text-2xl text-libertadores-green mr-3"></i>
            <h2 class="text-xl font-semibold">Egresados por Carrera</h2>
        </div>
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-libertadores-green text-white">
                <tr>
                    <th class="border-b-2 border-gray-300 px-4 py-2 text-left">Carrera</th>
                    <th class="border-b-2 border-gray-300 px-4 py-2 text-left">Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($conteoCarreras as $carrera => $cantidad)
                <tr class="hover:bg-gray-100 transition duration-300">
                    <td class="border-b border-gray-300 px-4 py-2">
                        <a href="{{ route('jefe_egresados.egresadosPorCarrera', ['carrera' => $carrera]) }}" class="text-libertadores-green hover:text-libertadores-gold transition-colors duration-300 flex items-center">
                            <i class="fas fa-external-link-alt text-sm mr-2"></i>
                            {{ $carrera }}
                        </a>
                    </td>
                    <td class="border-b border-gray-300 px-4 py-2">{{ $cantidad }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
