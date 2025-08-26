@extends('layouts.app')

@section('title', 'Editar Alerta')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-libertadores-green mb-6">Editar Alerta</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('jefe_egresados.alertas.update', $notification->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" name="title" id="title" 
                   value="{{ old('title', $notification->title) }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-libertadores-green focus:ring focus:ring-libertadores-green" 
                   required>
        </div>
        
        <div class="mb-4">
            <label for="message" class="block text-sm font-medium text-gray-700">Mensaje</label>
            <textarea name="message" id="message" rows="4" 
                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-libertadores-green focus:ring focus:ring-libertadores-green" 
                      required>{{ old('message', $notification->message) }}</textarea>
        </div>

        <div class="flex justify-between">
            <button type="submit" 
                    class="bg-libertadores-green hover:bg-libertadores-gold text-white font-bold py-2 px-4 rounded transition duration-300">
                Actualizar Alerta
            </button>
            <a href="{{ route('jefe_egresados.alertas.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition duration-300">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection 