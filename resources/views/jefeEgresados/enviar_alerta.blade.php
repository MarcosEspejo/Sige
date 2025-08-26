@extends('layouts.app')

@section('title', 'Enviar Alerta a Egresado')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-3xl font-bold text-libertadores-green mb-6">Enviar Alerta a Egresado</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('send.alert') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="egresado_id" class="block text-sm font-medium text-gray-700">Seleccionar Egresado</label>
            <select name="egresado_id" id="egresado_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-libertadores-green focus:ring focus:ring-libertadores-green" required>
                <option value="">Seleccione un egresado...</option>
                @foreach($egresados as $egresado)
                    <option value="{{ $egresado->id }}">
                        {{ $egresado->primer_nombre }} {{ $egresado->segundo_nombre }} 
                        {{ $egresado->primer_apellido }} {{ $egresado->segundo_apellido }} 
                        - {{ $egresado->programa }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="message" class="block text-sm font-medium text-gray-700">Mensaje</label>
            <textarea name="message" id="message" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-libertadores-green focus:ring focus:ring-libertadores-green" required></textarea>
        </div>

        <button type="submit" class="bg-libertadores-green hover:bg-libertadores-gold text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            <i class="fas fa-paper-plane mr-2"></i>
            Enviar Alerta
        </button>
    </form>
</div>
@endsection