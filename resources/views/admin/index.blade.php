@extends('layouts.app')

@section('title', 'Panel de Administración')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Panel de Administración</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold text-gray-700">Usuarios</h2>
            <p class="text-4xl font-bold mt-4">#</p>
            <a href="#" class="text-blue-500 mt-4 inline-block">Gestionar</a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold text-gray-700">Eventos</h2>
            <p class="text-4xl font-bold mt-4">#</p>
            <a href="#" class="text-blue-500 mt-4 inline-block">Gestionar</a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold text-gray-700">Noticias</h2>
            <p class="text-4xl font-bold mt-4">#</p>
            <a href="#" class="text-blue-500 mt-4 inline-block">Gestionar</a>
        </div>
    </div>
</div>
@endsection
