@extends('layouts.app')

@section('title', 'Portal de Egresados - Universidad Los Libertadores')

@section('content')
<div class="flex bg-gray-100 min-h-screen">
    <!-- Sidebar -->
    <x-egresados.sidebar>
        <!-- Perfil del Egresado -->
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center space-x-4">
                @if(auth()->user()->profile_photo_url)
                    <img src="{{ auth()->user()->profile_photo_url }}" 
                         alt="Foto de perfil" 
                         class="h-16 w-16 rounded-full border-4 border-white shadow-lg">
                @else
                    <div class="h-16 w-16 rounded-full bg-libertadores-green border-4 border-white shadow-lg flex items-center justify-center">
                        <span class="text-white text-xl font-bold">
                            {{ substr(auth()->user()->primer_nombre, 0, 1) }}{{ substr(auth()->user()->primer_apellido, 0, 1) }}
                        </span>
                    </div>
                @endif
                <div>
                    <h3 class="font-bold text-gray-800 text-lg">{{ auth()->user()->primer_nombre }} {{ auth()->user()->primer_apellido }}</h3>
                    <p class="text-sm text-gray-600">{{ auth()->user()->email }}</p>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 mt-2">
                        <div class="w-2 h-2 bg-green-400 rounded-full mr-2"></div>
                        Egresado Activo
                    </span>
                </div>
            </div>
        </div>

        <!-- Enlaces de Navegación -->
        <nav class="p-4">
            <x-sidebar-link 
                href="{{ route('egresados.show', auth()->id()) }}" 
                icon="user-circle" 
                title="Ver mi perfil de egresado"
                class="mb-2">
                Mi Perfil
            </x-sidebar-link>

            <x-sidebar-link 
                href="{{ route('egresados.notifications.index') }}" 
                icon="bell" 
                badge="{{ auth()->user()->notifications()->where('read', false)->count() }}"
                title="Ver notificaciones"
                class="mb-2">
                Notificaciones
            </x-sidebar-link>

            <x-sidebar-link 
                href="{{ route('proximamente') }}" 
                icon="calendar" 
                title="Ver eventos"
                class="mb-2">
                Eventos
            </x-sidebar-link>
        </nav>
    </x-egresados.sidebar>

    <!-- Contenido Principal -->
    <div class="flex-1 px-6 py-8">
        <header class="max-w-4xl mx-auto text-center mb-12">
            <h1 class="text-5xl font-bold text-libertadores-green mb-4">
                Portal de Egresados
            </h1>
            <p class="text-xl text-gray-600">
                Conectando el éxito de nuestros graduados y forjando un futuro brillante juntos.
            </p>
        </header>

        <!-- Paneles de Acceso Rápido -->
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Panel de Perfil -->
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="p-3 bg-libertadores-green bg-opacity-10 rounded-lg mr-4">
                            <i class="fas fa-user-circle text-2xl text-libertadores-green"></i>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800">Mi Perfil</h2>
                    </div>
                    <p class="text-gray-600 mb-6">Mantén actualizada tu información personal y profesional para aprovechar al máximo las oportunidades.</p>
                    <a href="{{ route('egresados.show', auth()->id()) }}" 
                       class="inline-flex items-center px-4 py-2 bg-libertadores-green text-white rounded-lg hover:bg-libertadores-gold transition-colors duration-300">
                        <span>Ver perfil</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Panel de Notificaciones -->
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="p-3 bg-libertadores-green bg-opacity-10 rounded-lg mr-4">
                            <i class="fas fa-bell text-2xl text-libertadores-green"></i>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800">Notificaciones</h2>
                    </div>
                    <p class="text-gray-600 mb-6">Mantente al día con las últimas novedades, oportunidades laborales y eventos importantes.</p>
                    <a href="{{ route('egresados.notifications.index') }}" 
                       class="inline-flex items-center px-4 py-2 bg-libertadores-green text-white rounded-lg hover:bg-libertadores-gold transition-colors duration-300">
                        <span>Ver notificaciones</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Panel de Eventos -->
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="p-3 bg-libertadores-green bg-opacity-10 rounded-lg mr-4">
                            <i class="fas fa-calendar-alt text-2xl text-libertadores-green"></i>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800">Eventos</h2>
                    </div>
                    <p class="text-gray-600 mb-6">Participa en eventos exclusivos para egresados, networking y desarrollo profesional.</p>
                    <a href="{{ route('proximamente') }}" 
                       class="inline-flex items-center px-4 py-2 bg-libertadores-green text-white rounded-lg hover:bg-libertadores-gold transition-colors duration-300">
                        <span>Ver eventos</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .bg-libertadores-green {
        background-color: #004A98;
    }
    .text-libertadores-green {
        color: #004A98;
    }
    .hover\:bg-libertadores-gold:hover {
        background-color: #C4A052;
    }
    .hover\:text-libertadores-gold:hover {
        color: #C4A052;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://kit.fontawesome.com/your-code.js" crossorigin="anonymous"></script>
@endpush