@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('imagenes/cartagena.jpg') }}');">
    <div class="flex items-center justify-center min-h-screen bg-black bg-opacity-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-lg">
            <div>
                <img class="mx-auto h-13 w-auto" src="{{ asset('imagenes/logo-full.png') }}" alt="Logo">
              
            </div>
            <form class="mt-8 space-y-6" action="{{ route('jefe_egresados.login.post') }}" method="POST">
                @csrf
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email" class="sr-only">Correo electrónico</label>
                        <input id="email" name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-libertadores-green focus:border-libertadores-green focus:z-10 sm:text-sm" placeholder="Correo electrónico">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Contraseña</label>
                        <input id="password" name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-libertadores-green focus:border-libertadores-green focus:z-10 sm:text-sm" placeholder="Contraseña">
                    </div>
                </div>

                @if ($errors->any())
                <div class="text-red-500 text-sm">
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-libertadores-green hover:bg-libertadores-gold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-libertadores-green">
                        Iniciar Sesión
                    </button>
                </div>
            </form>
            <div class="text-center mt-4">
                <p class="text-sm text-gray-600">
                    ¿No tienes una cuenta?
                    <a href="{{ route('jefe_egresados.register') }}" class="font-medium text-libertadores-green hover:text-libertadores-gold">
                        Regístrate aquí
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection