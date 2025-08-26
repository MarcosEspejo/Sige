@extends('layouts.app')

@section('title', 'Alertas Enviadas')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Botón Volver -->
    <a href="{{ route('jefe_egresados.index') }}" 
       class="inline-flex items-center mb-6 text-libertadores-green hover:text-libertadores-gold transition-colors duration-300">
        <i class="fas fa-arrow-left text-2xl"></i>
        <span class="ml-2">Volver</span>
    </a>

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-libertadores-green">Alertas Enviadas</h1>
        <a href="{{ route('jefe_egresados.alerta') }}" 
           class="bg-libertadores-green hover:bg-libertadores-gold text-white font-bold py-2 px-4 rounded transition duration-300">
            <i class="fas fa-plus mr-2"></i>Nueva Alerta
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($notifications->count() > 0)
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Egresado</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($notifications as $notification)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $notification->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $notification->egresado->nombre }} {{ $notification->egresado->apellido }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $notification->title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $notification->read ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $notification->read ? 'Leída' : 'No leída' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="{{ route('jefe_egresados.alertas.edit', $notification->id) }}" 
                                       class="text-libertadores-green hover:text-libertadores-gold">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                 
                                    <form action="{{ route('jefe_egresados.alertas.destroy', $notification->id) }}" 
                                          method="POST" 
                                          class="inline"
                                          onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta alerta?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Modal para ver detalles -->
        <div id="detailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Detalles de la Alerta</h3>
                    <div id="modalContent"></div>
                    <div class="mt-4">
                        <button onclick="closeModal()" 
                                class="bg-libertadores-green text-white px-4 py-2 rounded hover:bg-libertadores-gold transition duration-300">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="bg-white rounded-lg shadow-md p-6">
            <p class="text-gray-600">No hay alertas enviadas.</p>
        </div>
    @endif
</div>

@push('scripts')
<script>
function showDetails(id) {
    // Aquí puedes hacer una llamada AJAX para obtener los detalles
    // Por ahora solo mostraremos el modal
    document.getElementById('detailsModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('detailsModal').classList.add('hidden');
}
</script>
@endpush
@endsection