<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-100">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sistema de Egresados - Universidad Los Libertadores">
        <title>@yield('title', 'Sistema de Egresados - Universidad Los Libertadores')</title>
        
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            'libertadores-green': '#004d41',
                            'libertadores-gold': '#038591',
                            'libertadores-bg': '#fffaf0',
                            'nav-bg': '#004d41',
                        },
                    }
                }
            }
        </script>
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <!-- Estilos adicionales -->
        @yield('styles')
    </head>
    <body class="h-full flex flex-col bg-libertadores-bg">
        <header class="bg-libertadores-green shadow-lg">
            <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex items-center">
                        <a href="{{ url('/') }}" class="flex-shrink-0 hover:opacity-90 transition-opacity duration-300">
                            <img class="h-12 w-auto" src="{{ asset('Imagenes/logo-bb.png') }}" alt="Los Libertadores">
                        </a>
                        <div class="hidden md:block ml-10">
                            <div class="flex space-x-4">
                                <a href="{{ route('egresados.index') }}" class="text-white hover:bg-libertadores-gold px-3 py-2 rounded-md text-sm font-medium transition duration-300 flex items-center">
                                    <i class="fas fa-user-graduate mr-2"></i>Egresados
                                </a>
                                <a href="https://www.ulibertadores.edu.co/programas/" class="text-white hover:bg-libertadores-gold px-3 py-2 rounded-md text-sm font-medium transition duration-300 flex items-center">
                                    <i class="fas fa-graduation-cap mr-2"></i>Programas
                                </a>
                                <a href="{{ route('job_offers.index') }}" class="text-white hover:bg-libertadores-gold px-3 py-2 rounded-md text-sm font-medium transition duration-300 flex items-center">
                                    <i class="fas fa-briefcase mr-2"></i>Ofertas de Trabajo
                                </a>
                                <a href="{{ route('events.index') }}" class="text-white hover:bg-libertadores-gold px-3 py-2 rounded-md text-sm font-medium transition duration-300 flex items-center">
                                    <i class="fas fa-calendar-alt mr-2"></i>Eventos
                                </a>
                            </div>
                        </div>
                    </div>
                   
                    <div class="md:hidden">
                        <button type="button" class="text-white hover:text-libertadores-gold focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white p-2 rounded-md">
                            <span class="sr-only">Abrir menú principal</span>
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>
                </div>
            </nav>
        </header>

        <main class="flex-grow">
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                @if (session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-md mb-4" role="alert">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-2"></i>
                            <strong class="font-bold">¡Éxito! </strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded shadow-md mb-4" role="alert">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <strong class="font-bold">Error: </strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>

        <footer class="bg-white text-libertadores-green border-t border-libertadores-gold">
            <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h5 class="text-lg font-semibold text-libertadores-gold mb-4">Acerca de Nosotros</h5>
                        <p class="text-gray-600">La Universidad Los Libertadores se compromete con la excelencia académica y el desarrollo profesional de nuestros egresados.</p>
                    </div>
                    <div>
                        <h5 class="text-lg font-semibold text-libertadores-gold mb-4">Enlaces Rápidos</h5>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-600 hover:text-libertadores-gold transition duration-300 flex items-center"><i class="fas fa-info-circle mr-2"></i>Acerca de</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-libertadores-gold transition duration-300 flex items-center"><i class="fas fa-envelope mr-2"></i>Contacto</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-libertadores-gold transition duration-300 flex items-center"><i class="fas fa-shield-alt mr-2"></i>Privacidad</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-libertadores-gold transition duration-300 flex items-center"><i class="fas fa-file-alt mr-2"></i>Términos de Uso</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="text-lg font-semibold text-libertadores-gold mb-4">Síguenos</h5>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-600 hover:text-libertadores-gold transition duration-300 text-xl"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-gray-600 hover:text-libertadores-gold transition duration-300 text-xl"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-gray-600 hover:text-libertadores-gold transition duration-300 text-xl"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-gray-600 hover:text-libertadores-gold transition duration-300 text-xl"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="mt-8 border-t border-libertadores-gold pt-8 text-center">
                    <p class="text-gray-600">&copy; {{ date('Y') }} Universidad Los Libertadores. Todos los derechos reservados a M.E - L.M</p>
                </div>
            </div>
        </footer>

        <!-- Scripts adicionales -->
        @yield('scripts')

        @push('scripts')
        <script>
        window.onpageshow = function(event) {
            if (event.persisted) {
                window.location.reload();
            }
        };

        // Deshabilitar el botón atrás del navegador
        window.history.pushState(null, null, window.location.href);
        window.onpopstate = function () {
            window.history.pushState(null, null, window.location.href);
        };
        </script>
        @endpush
    </body>
</html>
