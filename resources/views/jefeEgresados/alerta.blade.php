@extends('layouts.app')

@section('title', 'Enviar Alerta a Egresado')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-material-ui/material-ui.css">
@endpush

@section('content')
<div class="container mx-auto py-6">
    <a href="{{ route('jefe_egresados.alertas.index') }}" class="inline-flex items-center mb-4 text-libertadores-green hover:text-libertadores-gold transition-colors duration-300">
        <i class="fas fa-arrow-left text-2xl"></i>
        <span class="ml-2">Volver</span>
    </a>

    <div class="bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-3xl font-bold text-libertadores-green mb-6 flex items-center">
            <i class="fas fa-bell mr-3"></i>
            Enviar Alerta a Egresado
        </h1>

        <form action="{{ route('jefe_egresados.send.alert') }}" method="POST" class="space-y-6" id="alertForm">
            @csrf
            <div class="bg-gray-50 p-4 rounded-lg">
                <div class="mb-4">
                    <label for="egresado" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-user-graduate mr-2 text-libertadores-green"></i>
                        Seleccionar Egresado
                    </label>
                    <select name="egresado_id" id="egresado" 
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm 
                                   focus:border-libertadores-green focus:ring focus:ring-libertadores-green 
                                   transition duration-300" required>
                        <option value="">Seleccione un egresado</option>
                        @foreach($egresados as $egresado)
                            <option value="{{ $egresado->id }}">
                                {{ $egresado->nombre }} {{ $egresado->apellido }} - {{ $egresado->programa }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-heading mr-2 text-libertadores-green"></i>
                        Título de la Alerta
                    </label>
                    <input type="text" name="title" id="title" 
                           class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm 
                                  focus:border-libertadores-green focus:ring focus:ring-libertadores-green 
                                  transition duration-300" 
                           placeholder="Ingrese el título de la alerta"
                           required>
                </div>

                <div class="mb-4">
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-envelope mr-2 text-libertadores-green"></i>
                        Mensaje
                    </label>
                    <textarea name="message" id="message" rows="4" 
                              class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm 
                                     focus:border-libertadores-green focus:ring focus:ring-libertadores-green 
                                     transition duration-300" 
                              placeholder="Escriba el mensaje de la alerta"
                              required></textarea>
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" 
                        class="bg-libertadores-green hover:bg-libertadores-gold text-white 
                               font-bold py-3 px-6 rounded-lg transition duration-300 
                               flex items-center">
                    <i class="fas fa-paper-plane mr-2"></i>
                    Enviar Alerta
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('alertForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const form = this;

            Swal.fire({
                title: '¿Enviar alerta?',
                text: '¿Estás seguro de enviar esta alerta al egresado?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#004A98',
                cancelButtonColor: '#d33',
                confirmButtonText: '<i class="fas fa-paper-plane mr-2"></i>Sí, enviar',
                cancelButtonText: '<i class="fas fa-times mr-2"></i>Cancelar',
                showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading(),
                preConfirm: () => {
                    return fetch(form.action, {
                        method: 'POST',
                        body: new FormData(form)
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Error al enviar: ${error}`
                        )
                    })
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: '¡Enviado!',
                        text: 'La alerta ha sido enviada exitosamente',
                        icon: 'success',
                        confirmButtonColor: '#004A98',
                        confirmButtonText: '<i class="fas fa-check mr-2"></i>Aceptar',
                        allowOutsideClick: false
                    }).then(() => {
                        form.reset();
                    });
                }
            });
        });

        // Para mensajes de error
        @if(session('error'))
            Swal.fire({
                title: '¡Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonColor: '#d33',
                confirmButtonText: '<i class="fas fa-times mr-2"></i>Cerrar'
            });
        @endif

        // Para mensajes de éxito
        @if(session('success'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif

        // Para mensajes de advertencia
        @if(session('warning'))
            Swal.fire({
                title: '¡Atención!',
                text: '{{ session('warning') }}',
                icon: 'warning',
                confirmButtonColor: '#f3c13a',
                confirmButtonText: '<i class="fas fa-exclamation-triangle mr-2"></i>Entendido'
            });
        @endif
    </script>
@endpush

@endsection