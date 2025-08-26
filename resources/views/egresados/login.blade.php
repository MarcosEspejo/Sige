@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('{{ asset('imagenes/cartagena.jpg') }}')"></div>
    <div class="max-w-md w-full mx-auto space-y-8 bg-white p-8 rounded-lg shadow-md">
        <div>
            <img class="mx-auto h-12 w-auto" src="{{ asset('imagenes/logo-full.png') }}" alt="Logo">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Iniciar Sesión como Egresado
            </h2>
        </div>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('egresados.login.post') }}" class="mt-8 space-y-6">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                <input id="email" 
                       name="email" 
                       type="email" 
                       required 
                       class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:ring-libertadores-green focus:border-libertadores-green sm:text-sm" 
                       value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="documento" class="block text-sm font-medium text-gray-700">Documento de identidad</label>
                <input id="documento" 
                       name="documento" 
                       type="text" 
                       required 
                       class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:ring-libertadores-green focus:border-libertadores-green sm:text-sm">
                @error('documento')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" 
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-libertadores-green hover:bg-libertadores-gold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-libertadores-green">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Iniciar Sesión
                </button>
            </div>
        </form>

        <div class="text-center">
            <a href="{{ route('egresados.register') }}" 
               class="text-sm text-libertadores-green hover:text-libertadores-gold">
                ¿No tienes cuenta? Regístrate aquí
            </a>
        </div>
    </div>
</div>
@endsection
