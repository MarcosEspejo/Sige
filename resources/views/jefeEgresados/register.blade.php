@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white shadow-md rounded-lg p-6">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-libertadores-green">
                Registro de Jefe de Egresados
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Completa el siguiente formulario para registrarte como Jefe de Egresados.
            </p>
        </div>
        <form class="mt-8 space-y-6" action="{{ route('jefe_egresados.register.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="rounded-md shadow-sm -space-y-px">
                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                    <input id="nombre" name="nombre" type="text" required 
                        class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-libertadores-green focus:border-libertadores-green sm:text-sm" 
                        placeholder="Nombre Completo"
                        value="{{ old('nombre') }}">
                    @error('nombre')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                    <input id="email" name="email" type="email" required 
                        class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-libertadores-green focus:border-libertadores-green sm:text-sm" 
                        placeholder="Correo Electrónico"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input id="password" name="password" type="password" required 
                        class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-libertadores-green focus:border-libertadores-green sm:text-sm" 
                        placeholder="Contraseña">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required 
                        class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-libertadores-green focus:border-libertadores-green sm:text-sm" 
                        placeholder="Confirmar Contraseña">
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-libertadores-green hover:bg-libertadores-gold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-libertadores-green">
                    Registrarse
                </button>
            </div>

            <div class="text-center">
                <p class="text-sm text-gray-600">
                    ¿Ya tienes una cuenta? 
                    <a href="{{ route('jefe_egresados.login') }}" class="font-medium text-libertadores-green hover:text-libertadores-gold">
                        Inicia sesión aquí
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
