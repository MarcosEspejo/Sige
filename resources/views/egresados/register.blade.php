@extends('layouts.app')

@section('title', 'Registrar Egresado - Universidad Los Libertadores')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white shadow-md rounded-lg p-8">
        <div>
            <img class="mx-auto h-12 w-auto" src="{{ asset('image/logo-page.png') }}" alt="Logo">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Registrar Egresado
            </h2>
        </div>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('egresados.register.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="nombre" class="sr-only">Nombre</label>
                    <input id="nombre" name="nombre" type="text" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out" placeholder="Nombre">
                </div>
                <div>
                    <label for="apellido" class="sr-only">Apellido</label>
                    <input id="apellido" name="apellido" type="text" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out" placeholder="Apellido">
                </div>
                <div>
                    <label for="documento" class="sr-only">Documento de Identidad</label>
                    <input id="documento" name="documento" type="text" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out" placeholder="Documento">
                </div>
                <div>
                    <label for="email" class="sr-only">Correo Electrónico</label>
                    <input id="email" name="email" type="email" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out" placeholder="Correo Electrónico">
                </div>
                <div>
                    <label for="programa" class="sr-only">Programa Académico</label>
                    <select name="programa" id="programa" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out" required>
                        <option value="">Seleccione un programa</option>
                        <option value="Ingeniería de Sistemas">Ingeniería de Sistemas</option>
                        <option value="Administración de Empresas">Administración de Empresas</option>
                        <option value="Gastronomia">Gastronomia</option>
                        <option value="Ingenieria Civil">Ingenieria Civil</option>
                        <option value="Desarrollo de Software">Desarrollo de Software</option>
                        <option value="Derecho">Derecho</option>
                        
                    </select>
                </div>
                <div>
                    <label for="ano_graduacion" class="sr-only">Año de Graduación</label>
                    <input id="ano_graduacion" name="ano_graduacion" type="number" min="1900" max="{{ date('Y') }}" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out" placeholder="Año de Graduación">
                </div>
                <div>
                    <label for="foto" class="sr-only">Foto de Perfil</label>
                    <input id="foto" name="foto" type="file" accept="image/*" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out">
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    Registrar
                </button>
            </div>
        </form>

        <div class="mt-6">
            <p class="text-center text-sm text-gray-600">
                ¿Ya tienes una cuenta? 
                <a href="{{ route('egresados.login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Inicia sesión aquí
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
