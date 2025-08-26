@extends('layouts.app')

@section('title', "Egresados de $carrera")

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-3xl font-bold mb-4">Egresados de {{ $carrera }}</h1>
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="border-b-2 border-gray-300 px-4 py-2">Nombre</th>
                <th class="border-b-2 border-gray-300 px-4 py-2">Documento</th>
                <th class="border-b-2 border-gray-300 px-4 py-2">Año de Graduación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($egresados as $egresado)
            <tr>
                <td class="border-b border-gray-300 px-4 py-2">{{ $egresado->nombre }} {{ $egresado->apellido }}</td>
                <td class="border-b border-gray-300 px-4 py-2">{{ $egresado->documento }}</td>
                <td class="border-b border-gray-300 px-4 py-2">{{ $egresado->año_de_graduacion }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
