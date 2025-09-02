<x-guest-layout>
    <!-- Agregar Font Awesome en el head -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css">

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-libertadores-green to-libertadores-gold py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full bg-white p-8 rounded-2xl shadow-2xl transform transition-all hover:scale-105 duration-300 animate__animated animate__fadeIn">
            <div class="text-center mb-8">
                <img class="mx-auto h-24 w-auto mb-6" src="{{ asset('Imagenes/logo-full.png') }}" alt="Logo">
                <h2 class="text-3xl font-extrabold text-libertadores-green">
                    ¡Bienvenido al Sistema! 👋
                </h2>
                <p class="mt-3 text-sm text-gray-600">
                    Portal de Egresados - Universidad Los Libertadores
                </p>
            </div>

            <form class="mt-8 space-y-6" action="{{ route('login.store') }}" method="POST" id="loginForm">
                @csrf
                <div class="space-y-5">
                    <div class="relative group">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            Correo electrónico
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-libertadores-green group-hover:text-libertadores-gold transition-colors duration-200"></i>
                            </div>
                            <input id="email" name="email" type="email" required 
                                class="appearance-none block w-full pl-10 px-3 py-3 border border-gray-300 rounded-lg 
                                       text-gray-900 placeholder-gray-400
                                       focus:outline-none focus:ring-2 focus:ring-libertadores-green focus:border-libertadores-green
                                       transition-all duration-200 ease-in-out
                                       hover:border-libertadores-green"
                                placeholder="correo@ejemplo.com">
                        </div>
                    </div>

                    <div class="relative group">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                            Contraseña
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-libertadores-green group-hover:text-libertadores-gold transition-colors duration-200"></i>
                            </div>
                            <input id="password" name="password" type="password" required
                                class="appearance-none block w-full pl-10 px-3 py-3 border border-gray-300 rounded-lg 
                                       text-gray-900 placeholder-gray-400
                                       focus:outline-none focus:ring-2 focus:ring-libertadores-green focus:border-libertadores-green
                                       transition-all duration-200 ease-in-out
                                       hover:border-libertadores-green"
                                placeholder="••••••••">
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" 
                            class="h-4 w-4 text-libertadores-green focus:ring-libertadores-green border-gray-300 rounded 
                                   transition-colors duration-200">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                            Recordar sesión
                        </label>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" 
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent 
                               text-sm font-medium rounded-lg text-white bg-libertadores-green
                               hover:bg-libertadores-gold focus:outline-none focus:ring-2 
                               focus:ring-offset-2 focus:ring-libertadores-green
                               transform transition-all duration-200 ease-in-out hover:scale-[1.02]
                               shadow-lg hover:shadow-xl">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fas fa-sign-in-alt text-white group-hover:scale-110 transition-all duration-200"></i>
                        </span>
                        Iniciar Sesión
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Sistema de Información de Egresados
                </p>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Mostrar error de autenticación
        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Credenciales incorrectas',
                text: '{{ $errors->first() }}',
                confirmButtonColor: '#006341',
                confirmButtonText: '<i class="fas fa-redo mr-2"></i>Intentar nuevamente',
                background: '#ffffff',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });
        @endif

        // Mostrar mensaje de éxito
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: '¡Bienvenido!',
                text: '{{ session('success') }}',
                timer: 2000,
                timerProgressBar: true,
                showConfirmButton: false,
                background: '#006341',
                color: '#ffffff',
                iconColor: '#FFD700'
            });
        @endif

        // Validación del formulario
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();

            if (!email || !password) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Campos requeridos',
                    text: 'Por favor complete todos los campos',
                    confirmButtonColor: '#006341',
                    confirmButtonText: 'Entendido',
                    background: '#ffffff',
                    iconColor: '#FFD700'
                });
            }
        });
    </script>
    @endpush
</x-guest-layout>
