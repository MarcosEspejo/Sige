@extends('layouts.app')

@section('title', 'Próximamente - Universidad Los Libertadores')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="text-center">
            <!-- Icono y Título -->
            <div class="mb-8 animate-bounce">
                <i class="fas fa-calendar-alt text-8xl text-libertadores-green"></i>
            </div>
            <h1 class="text-4xl font-bold text-libertadores-green mb-4">
                ¡Próximamente!
            </h1>
            <p class="text-xl text-gray-600 mb-8">
                Estamos trabajando para traerte los mejores eventos
            </p>

            <!-- Mensaje Principal -->
            <div class="bg-white p-8 rounded-lg shadow-lg mb-8">
                <div class="grid gap-6 md:grid-cols-2">
                    <div class="text-left">
                        <h2 class="text-2xl font-semibold text-libertadores-green mb-4">
                            <i class="fas fa-tools mr-2"></i>
                            En Construcción
                        </h2>
                        <p class="text-gray-600">
                            Estamos desarrollando un espacio exclusivo donde podrás encontrar todos los eventos relevantes para nuestra comunidad de egresados.
                        </p>
                    </div>
                    <div class="text-left">
                        <h2 class="text-2xl font-semibold text-libertadores-green mb-4">
                            <i class="fas fa-bell mr-2"></i>
                            ¿Qué Encontrarás?
                        </h2>
                        <ul class="text-gray-600 space-y-2">
                            <li><i class="fas fa-check-circle text-libertadores-gold mr-2"></i>Eventos académicos</li>
                            <li><i class="fas fa-check-circle text-libertadores-gold mr-2"></i>Networking</li>
                            <li><i class="fas fa-check-circle text-libertadores-gold mr-2"></i>Talleres profesionales</li>
                            <li><i class="fas fa-check-circle text-libertadores-gold mr-2"></i>Conferencias exclusivas</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Contador -->
            <div class="bg-libertadores-green text-white p-6 rounded-lg inline-block">
                <p class="text-lg mb-2">Lanzamiento estimado</p>
                <p class="text-3xl font-bold">2024</p>
            </div>

            <!-- Botón de Regreso -->
            <div class="mt-8">
                <a href="" 
                   class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-libertadores-green hover:bg-libertadores-gold transition duration-300">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Volver al Inicio
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Animación suave para elementos
document.addEventListener('DOMContentLoaded', function() {
    const elements = document.querySelectorAll('.animate-fade-in');
    elements.forEach(element => {
        element.classList.add('opacity-0');
        element.classList.add('transition-opacity');
        element.classList.add('duration-1000');
        setTimeout(() => {
            element.classList.remove('opacity-0');
        }, 100);
    });
});
</script>
@endpush