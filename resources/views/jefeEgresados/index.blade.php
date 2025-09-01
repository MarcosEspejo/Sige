@extends('layouts.app')

@section('title', 'Gestión de Egresados - Universidad Los Libertadores')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header con perfil y estadísticas -->
    <div class="bg-gradient-to-r from-libertadores-green to-libertadores-gold text-white shadow-lg">
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="flex items-center space-x-6 mb-4 md:mb-0">
                    <div class="relative">
                        @if(auth()->user()?->foto_url)
                            <img class="h-20 w-20 rounded-full object-cover border-4 border-white shadow-lg" 
                                 src="{{ auth()->user()->foto_url }}" 
                                 alt="{{ auth()->user()?->nombre ?? 'Usuario' }}">
                        @else
                            <div class="h-20 w-20 rounded-full bg-libertadores-green border-4 border-white shadow-lg flex items-center justify-center">
                                <span class="text-white text-2xl font-bold">
                                    {{ substr(auth()->user()?->nombre ?? '', 0, 1) }}{{ substr(auth()->user()?->apellido ?? '', 0, 1) }}
                                </span>
                            </div>
                        @endif
                        <div class="absolute bottom-0 right-0 h-5 w-5 bg-green-500 rounded-full border-2 border-white"></div>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold">{{ auth()->user()?->nombre ?? 'Usuario' }} {{ auth()->user()?->apellido ?? '' }}</h1>
                        <p class="text-sm opacity-80">Jefe de Egresados</p>
                    </div>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="text-white hover:text-gray-200 flex items-center">
                        <i class="fas fa-user-circle mr-2"></i>Mi Perfil
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-6 flex items-center justify-between shadow-lg">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}
                </div>
                <button onclick="this.parentElement.remove()" class="text-white hover:text-gray-200">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        <!-- Estadísticas Rápidas -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-2xl transition-all duration-300 border-l-4 border-libertadores-green">
                <div class="flex items-center">
                    <div class="p-4 rounded-full bg-libertadores-green bg-opacity-10">
                        <i class="fas fa-users text-3xl text-libertadores-green"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500">Total Egresados</h3>
                        <p class="text-3xl font-bold text-gray-800"></p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-2xl transition-all duration-300 border-l-4 border-libertadores-gold">
                <div class="flex items-center">
                    <div class="p-4 rounded-full bg-libertadores-gold bg-opacity-10">
                        <i class="fas fa-graduation-cap text-3xl text-libertadores-gold"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500">Programas</h3>
                        <p class="text-3xl font-bold text-gray-800"></p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-2xl transition-all duration-300 border-l-4 border-blue-500">
                <div class="flex items-center">
                    <div class="p-4 rounded-full bg-blue-100">
                        <i class="fas fa-calendar-alt text-3xl text-blue-500"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500">Año Actual</h3>
                        <p class="text-3xl font-bold text-gray-800">{{ date('Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-2xl transition-all duration-300 border-l-4 border-purple-500">
                <div class="flex items-center">
                    <div class="p-4 rounded-full bg-purple-100">
                        <i class="fas fa-bell text-3xl text-purple-500"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-500">Notificaciones</h3>
                        <p class="text-3xl font-bold text-gray-800">{{ auth()->user()?->notifications()->where('read', false)->count() ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>

       <!-- Importar Egresados -->
<div class="bg-white rounded-xl shadow-lg p-6 mb-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-800 flex items-center">
            <i class="fas fa-file-import mr-3 text-libertadores-green"></i>
            Importar Egresados
        </h2>
        <a href="#" 
           class="text-sm text-libertadores-green hover:text-libertadores-gold flex items-center">
            <i class="fas fa-download mr-2"></i>
            Descargar Plantilla
        </a>
    </div>

    <form id="importForm" action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col md:flex-row items-center gap-4">
            <div class="flex-1 w-full">
                <div class="relative">
                    <input type="file" 
                           id="excel-upload" 
                           name="excel_file"
                           accept=".csv" 
                           class="block w-full text-sm text-gray-500
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-lg file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-libertadores-green file:text-white
                                  hover:file:bg-libertadores-gold
                                  cursor-pointer"
                           required>
                    <div class="absolute right-3 top-2.5 text-gray-400">
                        <i class="fas fa-file-csv"></i>
                    </div>
                </div>
                <p class="mt-2 text-sm text-gray-500">
                    El archivo debe ser <strong>.csv</strong> con las columnas requeridas.
                </p>
                @error('excel_file')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" 
                    class="w-full md:w-auto bg-libertadores-green hover:bg-libertadores-gold text-white font-bold py-3 px-6 rounded-lg transition duration-300 flex items-center justify-center">
                <i class="fas fa-upload mr-2"></i>
                Importar
            </button>
        </div>
    </form>

    <div id="progressBar" class="hidden mt-4">
        <div class="w-full bg-gray-200 rounded-full h-2.5">
            <div id="progress" class="bg-libertadores-green h-2.5 rounded-full transition-all duration-300" style="width: 0%"></div>
        </div>
        <p id="progressText" class="text-sm text-gray-500 mt-2">Preparando importación...</p>
    </div>
</div>


       <!-- Directorio de Egresados -->
<div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
    <div class="p-6">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-user-graduate mr-3 text-libertadores-green"></i>
                Directorio de Egresados
            </h1>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input type="text" 
                           id="searchInput" 
                           placeholder="Buscar egresado..." 
                           class="w-full md:w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-libertadores-green focus:border-libertadores-green">
                    <div class="absolute left-3 top-2.5 text-gray-400">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <a href="#" 
                   class="bg-libertadores-green hover:bg-libertadores-gold text-white font-bold py-2 px-4 rounded-lg transition duration-300 flex items-center">
                    <i class="fas fa-user-plus mr-2"></i>
                    Nuevo
                </a>
            </div>
        </div>

        @if(isset($egresados) && $egresados->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($egresados as $egresado)
                    <div class="bg-gray-50 rounded-lg shadow p-4 hover:shadow-lg transition duration-300 group border border-gray-100">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <div class="relative">
                                    @if($egresado->foto_url)
                                        <img class="h-16 w-16 rounded-full object-cover border-2 border-libertadores-green" 
                                             src="{{ $egresado->foto_url }}" 
                                             alt="{{ $egresado->primer_nombre }} {{ $egresado->primer_apellido }}">
                                    @else
                                        <div class="h-16 w-16 rounded-full bg-libertadores-green border-2 border-libertadores-green flex items-center justify-center">
                                            <span class="text-white text-xl font-bold">
                                                {{ substr($egresado->primer_nombre, 0, 1) }}{{ substr($egresado->primer_apellido, 0, 1) }}
                                            </span>
                                        </div>
                                    @endif
                                    <div class="absolute -bottom-1 -right-1 h-5 w-5 bg-green-500 rounded-full border-2 border-white"></div>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-900 group-hover:text-libertadores-green transition duration-300 flex items-center">
                                    <i class="fas fa-user-circle mr-2 text-libertadores-green"></i>
                                    {{ $egresado->primer_nombre }} {{ $egresado->primer_apellido }}
                                </p>
                                
                                <p class="text-sm text-gray-600 flex items-center">
                                    <i class="fas fa-graduation-cap mr-2 text-libertadores-green"></i>
                                    {{ $egresado->programa }}
                                </p>
                                <p class="text-xs text-gray-500 flex items-center mt-1">
                                    <i class="fas fa-calendar-alt mr-2 text-libertadores-green"></i>
                                    Año de graduación: {{ $egresado->ano_graduacion }}
                                </p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('jefe_egresados.egresados.show', $egresado) }}" 
                                   class="text-blue-500 hover:text-blue-700 transition duration-300"
                                   title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('jefe_egresados.egresados.edit', $egresado) }}" 
                                   class="text-libertadores-green hover:text-libertadores-gold transition duration-300"
                                   title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-6">
                {{ $egresados->links() }}
            </div>
        @else
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 rounded-lg flex items-center">
                <i class="fas fa-exclamation-triangle text-yellow-400 text-xl mr-4"></i>
                <p class="text-yellow-700">
                    No hay egresados registrados en este momento.
                </p>
            </div>
        @endif
    </div>
</div>


        <!-- Acciones Rápidas -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                <i class="fas fa-bolt mr-3 text-libertadores-green"></i>
                Acciones Rápidas
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <a href="#" 
                   class="flex items-center justify-center bg-libertadores-green hover:bg-libertadores-gold text-white font-bold py-3 px-4 rounded-lg transition duration-300 group">
                    <i class="fas fa-chart-line mr-2 group-hover:scale-110 transition-transform duration-300"></i>
                    Dashboard
                </a>
                <a href="#" 
                   class="flex items-center justify-center bg-libertadores-green hover:bg-libertadores-gold text-white font-bold py-3 px-4 rounded-lg transition duration-300 group">
                    <i class="fas fa-search mr-2 group-hover:scale-110 transition-transform duration-300"></i>
                    Búsqueda Avanzada
                </a>
                <a href="#" 
                   class="flex items-center justify-center bg-libertadores-green hover:bg-libertadores-gold text-white font-bold py-3 px-4 rounded-lg transition duration-300 group">
                    <i class="fas fa-bell mr-2 group-hover:scale-110 transition-transform duration-300"></i>
                    Alertas
                </a>
                <form action="#" method="POST" class="w-full">
                    @csrf
                    <button type="submit" 
                            class="w-full flex items-center justify-center bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-4 rounded-lg transition duration-300 group">
                        <i class="fas fa-sign-out-alt mr-2 group-hover:scale-110 transition-transform duration-300"></i>
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function handleExcelUpload(input) {
    if (input.files && input.files[0]) {
        const formData = new FormData();
        formData.append('excel_file', input.files[0]);
        formData.append('_token', '{{ csrf_token() }}');

        // Mostrar loader inmediatamente
        Swal.fire({
            title: 'Procesando archivo...',
            html: `
                <div class="flex flex-col items-center">
                    <i class="fas fa-spinner fa-spin text-4xl mb-4"></i>
                    <p>Por favor espere mientras se procesan los datos</p>
                </div>
            `,
            allowOutsideClick: false,
            allowEscapeKey: false,
            showConfirmButton: false
        });

        fetch('#', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta del servidor');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: `Se importaron ${data.count} egresados correctamente`,
                    confirmButtonColor: '#004A98'
                }).then(() => {
                    window.location.reload();
                });
            } else {
                throw new Error(data.message || 'Error al procesar el archivo');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: error.message || 'Hubo un error al procesar el archivo',
                confirmButtonColor: '#d33'
            });
        })
        .finally(() => {
            // Limpiar el input file
            input.value = '';
        });
    }
}

document.getElementById('searchInput').addEventListener('keyup', function(e) {
    let searchText = e.target.value.toLowerCase();
    let cards = document.querySelectorAll('.grid > div');
    
    cards.forEach(card => {
        let text = card.textContent.toLowerCase();
        card.style.display = text.includes(searchText) ? '' : 'none';
    });
});

document.getElementById('importForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const progressBar = document.getElementById('progressBar');
    const progress = document.getElementById('progress');
    
    progressBar.classList.remove('hidden');
    progress.style.width = '0%';
    
    // Mostrar modal de progreso
    Swal.fire({
        title: 'Importando datos...',
        html: `
            <div class="w-full bg-gray-200 rounded-full h-2.5">
                <div id="swalProgress" class="bg-libertadores-green h-2.5 rounded-full" style="width: 0%"></div>
            </div>
            <p id="progressText" class="text-sm text-gray-600 mt-2">Preparando importación...</p>
            <div id="errorList" class="mt-4 text-sm text-red-600 max-h-40 overflow-y-auto"></div>
        `,
        allowOutsideClick: false,
        allowEscapeKey: false,
        showConfirmButton: false
    });
    
    function processBatch() {
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Actualizar barra de progreso
                const swalProgress = document.getElementById('swalProgress');
                const progressText = document.getElementById('progressText');
                const errorList = document.getElementById('errorList');
                
                swalProgress.style.width = `${data.progress}%`;
                progressText.textContent = `Procesados ${data.processed} de ${data.total} registros`;
                
                // Mostrar errores
                let errorHtml = '';
                if (data.validation_errors && data.validation_errors.length > 0) {
                    errorHtml += '<div class="mb-2"><strong>Errores de validación:</strong></div>';
                    data.validation_errors.forEach(error => {
                        errorHtml += `<div class="mb-1">${error}</div>`;
                    });
                }
                if (data.duplicate_errors && data.duplicate_errors.length > 0) {
                    errorHtml += '<div class="mb-2 mt-4"><strong>Registros duplicados:</strong></div>';
                    data.duplicate_errors.forEach(error => {
                        errorHtml += `<div class="mb-1">${error}</div>`;
                    });
                }
                errorList.innerHTML = errorHtml;
                
                if (data.progress < 100) {
                    // Continuar con el siguiente lote
                    setTimeout(() => processBatch(), 100);
                } else {
                    // Importación completada
                    Swal.fire({
                        title: '¡Éxito!',
                        html: `
                            <div class="text-left">
                                <p class="mb-2">Importación completada exitosamente</p>
                                <p class="text-sm text-gray-600">Total de registros: ${data.total}</p>
                                <p class="text-sm text-gray-600">Registros procesados: ${data.processed}</p>
                                <p class="text-sm text-gray-600">Registros omitidos: ${data.skipped}</p>
                                ${errorHtml ? `
                                    <div class="mt-4">
                                        <p class="text-sm font-semibold">Detalles de errores:</p>
                                        ${errorHtml}
                                    </div>
                                ` : ''}
                            </div>
                        `,
                        icon: 'success'
                    }).then(() => {
                        location.reload();
                    });
                }
            } else {
                throw new Error(data.message || 'Error al procesar el archivo');
            }
        })
        .catch(error => {
            Swal.fire({
                title: 'Error',
                text: error.message || 'Ocurrió un error al importar el archivo',
                icon: 'error'
            });
        });
    }
    
    processBatch.call(this);
});

function updateStatistics(newRecords) {
    // Actualizar el contador total de egresados
    const totalEgresadosElement = document.querySelector('.text-libertadores-green');
    if (totalEgresadosElement) {
        const currentTotal = parseInt(totalEgresadosElement.textContent);
        totalEgresadosElement.textContent = currentTotal + newRecords;
    }

    // Actualizar la lista de egresados
    fetch(window.location.href)
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newEgresadosList = doc.querySelector('.grid');
            if (newEgresadosList) {
                const currentList = document.querySelector('.grid');
                currentList.innerHTML = newEgresadosList.innerHTML;
            }
        })
        .catch(error => console.error('Error al actualizar la lista:', error));
}
</script>
@endpush

@endsection