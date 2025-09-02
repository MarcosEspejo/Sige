<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">

        {{-- Navbar o menú principal (opcional, si lo usas) --}}
        @includeWhen(View::exists('layouts.navigation'), 'layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <main class="py-8">
            @yield('content')
        </main>
    </div>

    {{-- Script para forzar redirección al login si se presiona "atrás" --}}
    <script>
        window.history.pushState(null, "", window.location.href);
        window.onpopstate = function() {
            window.location.replace("{{ route('login') }}");
        };
    </script>

    {{-- Evitar que el usuario vea páginas protegidas al pulsar "Atrás" --}}
    <script>
        // Si la página es restaurada desde bfcache (event.persisted true) o si la navegación es back_forward,
        // forzamos que se vaya al login (o recargue la página desde el servidor).
        window.addEventListener('pageshow', function(event) {
            try {
                var navigationEntries = performance.getEntriesByType && performance.getEntriesByType('navigation');
                var navType = navigationEntries && navigationEntries[0] ? navigationEntries[0].type : (performance.navigation ? performance.navigation.type : null);
            } catch (e) {
                var navType = null;
            }

            // event.persisted es true cuando viene desde bfcache en algunos navegadores
            if (event.persisted || navType === 'back_forward') {
                // Forzamos ir al login (puedes usar replace para no agregar al historial)
                window.location.replace("{{ route('login') }}");
            }
        });

        // Opcional: añadir unload vacío para desactivar bfcache en navegadores que lo respetan.
        // WARNING: esto puede afectar experiencia/performance; úsalo solo si necesitas castigo agresivo.
        window.addEventListener('unload', function() {
            /* noop para deshabilitar bfcache en algunos browsers */ });
    </script>


    @stack('scripts')
</body>

</html>