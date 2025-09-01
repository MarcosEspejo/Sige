<x-guest-layout>
    <!-- Agregar Font Awesome en el head -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-[#006341] to-[#FFD700] py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full bg-white p-8 rounded-2xl shadow-xl transform transition-all hover:scale-105 duration-300">
            <div class="text-center">
                <img class="mx-auto h-20 w-auto" src="{{ asset('Imagenes/logo-full.png') }}" alt="Logo">
                <h2 class="mt-6 text-3xl font-extrabold text-[#006341]">
                    ¡Bienvenido! 👋
                </h2>
                <p class="mt-2 text-sm text-gray-600">Ingresa tus credenciales para continuar</p>
            </div>

            <form class="mt-8 space-y-6" action="{{ route('login.store') }}" method="POST" id="loginForm">
                @csrf
                <div class="rounded-md shadow-sm space-y-4">
                    <div class="relative">
                        <label for="email" class="sr-only">Correo electrónico</label>
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-[#006341]"></i>
                        </div>
                        <input id="email" name="email" type="email" required 
                            class="appearance-none relative block w-full pl-10 px-3 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-lg focus:outline-none focus:ring-[#006341] focus:border-[#006341] transition-colors duration-200 sm:text-sm"
                            placeholder="Correo electrónico">
                    </div>
                    <div class="relative">
                        <label for="password" class="sr-only">Contraseña</label>
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-[#006341]"></i>
                        </div>
                        <input id="password" name="password" type="password" required
                            class="appearance-none relative block w-full pl-10 px-3 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-lg focus:outline-none focus:ring-[#006341] focus:border-[#006341] transition-colors duration-200 sm:text-sm"
                            placeholder="Contraseña">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" 
                            class="h-4 w-4 text-[#006341] focus:ring-[#006341] border-gray-300 rounded transition-colors duration-200">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                            Recordarme
                        </label>
                    </div>
                </div>

                <div>
                    <button type="submit" 
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-[#006341] hover:bg-[#FFD700] hover:text-[#006341] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#006341] shadow-lg transition-all duration-300">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fas fa-sign-in-alt text-white group-hover:text-[#006341] transition-colors duration-200"></i>
                        </span>
                        Iniciar Sesión
                    </button>
                </div>
            </form>
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
