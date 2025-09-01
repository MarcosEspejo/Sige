@extends('layouts.app')

@section('title', 'Registrar Nuevo Egresado - Universidad Los Libertadores')

@section('content')
<div class="bg-white shadow-lg rounded-lg overflow-hidden max-w-4xl mx-auto">
    <div class="bg-libertadores-green p-6">
        <h1 class="text-3xl font-bold text-white mb-2">Registrar Nuevo Egresado</h1>
        <p class="text-libertadores-gold">Completa el formulario para añadir un nuevo egresado al sistema
            
        </p>
    </div>
    <div class="p-6">
        <form action="{{ route('jefe_egresados.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-libertadores-green focus:border-transparent" required>
                </div>
                
                <div>
                    <label for="apellido" class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
                    <input type="text" name="apellido" id="apellido" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-libertadores-green focus:border-transparent" required>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="documento" class="block text-sm font-medium text-gray-700 mb-1">Documento de Identidad</label>
                    <input type="text" name="documento" id="documento" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-libertadores-green focus:border-transparent" required>
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-libertadores-green focus:border-transparent" required>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="programa" class="block text-sm font-medium text-gray-700 mb-1">Programa Académico</label>
                    <select name="programa" id="programa" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-libertadores-green focus:border-transparent" required>
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
                    <label for="ano_graduacion" class="block text-sm font-medium text-gray-700 mb-1">Año de Graduación</label>
                    <input type="number" name="ano_graduacion" id="ano_graduacion" min="1900" max="{{ date('Y') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-libertadores-green focus:border-transparent" required>
                </div>
            </div>
            
            <div>
                <label for="foto" class="block text-sm font-medium text-gray-700 mb-1">Foto de Perfil</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-libertadores-green hover:text-libertadores-gold focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-libertadores-green">
                                <span>Subir un archivo</span>
                                <input id="file-upload" name="foto" type="file" class="sr-only" accept="image/*">
                            </label>
                            <p class="pl-1">o arrastrar y soltar</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF hasta 10MB</p>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center justify-end mt-6">
                <a href="{{ route('jefe_egresados.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l transition duration-300 mr-2">
                    Cancelar
                </a>
                <button type="submit" class="bg-libertadores-green hover:bg-libertadores-gold text-white font-bold py-2 px-4 rounded-r transition duration-300">
                    Registrar Egresado
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    
    document.getElementById('file-upload').addEventListener('change', function(e) {
        var file = e.target.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            var preview = document.createElement('img');
            preview.src = e.target.result;
            preview.className = 'mt-2 rounded-full w-20 h-20 object-cover';
            var container = document.querySelector('.space-y-1');
            container.appendChild(preview);
        }
        reader.readAsDataURL(file);
    });
</script>
@endsection
