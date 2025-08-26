@extends('layouts.app')

@section('title', 'Mis Notificaciones')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Botón Volver -->
    <a href="{{ route('egresados.index') }}" class="inline-flex items-center mb-6 text-libertadores-green hover:text-libertadores-gold transition-colors duration-300">
        <i class="fas fa-arrow-left text-2xl"></i>
        <span class="ml-2">Volver</span>
    </a>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-3xl font-bold text-libertadores-green mb-6 flex items-center">
            <i class="fas fa-bell mr-3"></i>
            Mis Notificaciones
            @if($notifications->where('read', false)->count() > 0)
                <span class="ml-3 bg-red-500 text-white text-sm px-2 py-1 rounded-full">
                    {{ $notifications->where('read', false)->count() }} nueva(s)
                </span>
            @endif
        </h1>

        <a href="{{ route('egresados.notifications.index') }}" 
           class="inline-flex items-center text-libertadores-green hover:text-libertadores-gold transition-colors duration-300">
            <span>Ver notificaciones</span>
            <i class="fas fa-arrow-right ml-2"></i>
        </a>

        @if($notifications->count() > 0)
            <div class="space-y-4">
                @foreach($notifications as $notification)
                    <div class="bg-gray-50 p-4 rounded-lg border {{ $notification->read ? 'border-gray-200' : 'border-libertadores-green' }} hover:shadow-md transition-shadow duration-300">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <div class="flex items-center mb-2">
                                    <i class="fas fa-envelope {{ $notification->read ? 'text-gray-400' : 'text-libertadores-green' }} mr-2"></i>
                                    <h3 class="text-xl font-semibold">{{ $notification->title }}</h3>
                                </div>
                                <p class="text-gray-600 mb-2">{{ $notification->message }}</p>
                                <div class="text-sm text-gray-500 flex items-center">
                                    <i class="fas fa-clock mr-2"></i>
                                    {{ $notification->created_at->diffForHumans() }}
                                </div>
                            </div>
                            <div class="flex space-x-2 ml-4">
                                @if(!$notification->read)
                                    <form action="{{ route('egresados.notifications.mark-as-read', $notification->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" 
                                                class="text-sm bg-libertadores-green text-white px-3 py-1 rounded-lg hover:bg-libertadores-gold transition-colors duration-300 flex items-center">
                                            <i class="fas fa-check mr-1"></i>
                                            Marcar leída
                                        </button>
                                    </form>
                                @endif
                                <form action="{{ route('egresados.notifications.destroy', $notification->id) }}" 
                                      method="POST" 
                                      class="inline" 
                                      onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta notificación?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-sm bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition-colors duration-300 flex items-center">
                                        <i class="fas fa-trash-alt mr-1"></i>
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex flex-col items-center justify-center text-gray-500 py-12">
                <i class="fas fa-bell-slash text-6xl mb-4"></i>
                <p class="text-xl">No tienes notificaciones pendientes</p>
            </div>
        @endif
    </div>
</div>
@endsection