<div x-data="{ open: false }" class="flex flex-col w-64 bg-white shadow-md">
    <div class="flex items-center justify-between p-4 bg-libertadores-green text-white">
        <h2 class="text-lg font-bold">Menú</h2>
        <button @click="open = !open" class="md:hidden focus:outline-none">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div x-show="open" @click.away="open = false" class="md:block md:static md:bg-white md:shadow-none" x-transition>
        <div class="p-4 border-b border-gray-200">
            <div class="flex items-center space-x-3">
                <img src="{{ auth()->user()->foto_url ?? asset('images/default-avatar.png') }}" 
                     class="h-10 w-10 rounded-full object-cover">
                <div>
                    <p class="font-semibold text-libertadores-green">{{ auth()->user()->nombre }}</p>
                    <p class="text-sm text-gray-600">Egresado</p>
                </div>
            </div>
        </div>

        <nav class="mt-4">
            <ul class="space-y-2">
                <x-sidebar-link href="{{ route('egresados.show', auth()->guard('web')->user()->id ?? '') }}" icon="user">
                    Mi Perfil
                </x-sidebar-link>

                <x-sidebar-link href="{{ route('egresados.notifications.index') }}" 
                               icon="bell" 
                               :badge="auth()->user()->notifications()->where('read', false)->count()">
                    Notificaciones
                </x-sidebar-link>

                <x-sidebar-link href="#" icon="calendar-alt">
                    Eventos
                </x-sidebar-link>

                <x-sidebar-link href="#" icon="newspaper">
                    Noticias
                </x-sidebar-link>

                <x-sidebar-link href="https://co.computrabajo.com/" icon="briefcase" target="_blank">
                    Ofertas de Trabajo
                </x-sidebar-link>

                <li class="px-4">
                    <form action="#" method="POST" id="logout-form">
                        @csrf
                        <button type="submit" 
                                class="w-full flex items-center px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-300">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Cerrar Sesión
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</div>