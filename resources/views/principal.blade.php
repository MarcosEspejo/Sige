<!DOCTYPE html>
<html lang="es" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell - Universidad Los Libertadores</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />


    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'libertadores-green': '#006341',
                        'libertadores-gold': '#FFD700',
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        .fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hover-grow {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-grow:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .swiper-pagination-bullet-active {
            background-color: #006341 !important;
        }

        .swiper {
            width: 100%;
            height: 100vh;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>












<body class="bg-gray-100 text-gray-800 transition-colors duration-300">
    <!-- Navbar mejorado -->
    <nav class="bg-white shadow-lg sticky top-0 z-50 transition-all duration-300 ease-in-out">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="     " class="text-2xl font-bold flex items-center">
                    <img src="{{ asset('Imagenes/logo-full.png') }}" alt="logo" class="h-12 w-auto mr-2">
                    <span class="hidden md:inline text-libertadores-green">Sige</span>
                </a>
                <div class="hidden md:flex space-x-6 items-center">
                    <a href="           " class="text-gray-700 hover:text-libertadores-green transition duration-300">Inicio</a>
                    <a href="        " class="text-gray-700 hover:text-libertadores-green transition duration-300">Eventos</a>
                    <a href="https://educacion-continua.libertadores.edu.co/" class="text-gray-700 hover:text-libertadores-green transition duration-300">Formación Continua</a>
                    <a href="https://www.ulibertadores.edu.co/admision/becas-y-beneficios/" class="text-gray-700 hover:text-libertadores-green transition duration-300">Beneficios</a>
                    <div class="relative group">
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-libertadores-green transition duration-300 flex items-center focus:outline-none">
                            <span>Iniciar Sesión</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                        
                    </div>
                </div>
                <button class="md:hidden text-gray-700 focus:outline-none" id="mobile-menu-button">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>
        <!-- Menú móvil -->
        <div class="md:hidden hidden bg-white" id="mobile-menu">
            <a href="           " class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Inicio</a>
            <a href="               " class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Directorio</a>
            <a href="                                               " class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Eventos</a>
            <a href="https://educacion-continua.libertadores.edu.co/" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Formación Continua</a>
            <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Beneficios</a>
            <div class="py-2 px-4">
                <span class="block text-sm font-medium text-gray-900">Iniciar Sesión</span>
                <a href="               " class="block py-2 text-sm text-gray-700 hover:text-libertadores-green">Egresado</a>
                <a href="                   " class="block py-2 text-sm text-gray-700 hover:text-libertadores-green">Jefe de Egresados</a>
            </div>
        </div>
    </nav>

    

    <!-- Banner con slider -->
    <div class="relative h-screen overflow-hidden fade-in">
        <div class="swiper mySwiper h-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('Imagenes/libertadores-baner1.png') }}" alt="banner1" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="text-center glass-effect p-8">
                            <h1 class="text-white text-4xl md:text-6xl font-bold mb-4">Bienvenidos Egresados</h1>
                            <p class="text-green-300 text-xl md:text-2xl mb-8">Conectando el éxito de nuestros graduados</p>
                            <div class="flex flex-wrap justify-center gap-4">
                                <a href="           " class="bg-libertadores-green text-white px-6 py-3 rounded-full hover:bg-libertadores-gold hover:text-libertadores-green transition duration-300 transform hover:scale-105">Portal de Egresados</a>
                                <a href="https://www.ulibertadores.edu.co/programas/" class="bg-white text-libertadores-green px-6 py-3 rounded-full hover:bg-libertadores-gold hover:text-white transition duration-300 transform hover:scale-105">Programas Académicos</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Agrega más slides aquí si es necesario -->
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- Contenido principal -->
    <div class="container mx-auto px-4 py-16">
        <!-- Sección de Bienvenida -->
        <div class="mb-16 fade-in">
            <h2 class="text-4xl font-bold mb-8 text-libertadores-green text-center">Red de Egresados Los Libertadores</h2>
            <div class="bg-white rounded-lg shadow-xl p-8 hover:shadow-2xl transition duration-300">
                <p class="text-gray-600 mb-6 text-lg leading-relaxed">Bienvenido a la plataforma exclusiva para egresados de la Universidad Los Libertadores. Aquí podrás conectarte con otros profesionales, acceder a oportunidades laborales y mantenerte actualizado con eventos y programas de formación continua.</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
                    <div class="text-center p-6 bg-gray-50 rounded-lg hover:bg-libertadores-green hover:text-white transition duration-300 transform hover:scale-105">
                        <i class="fas fa-users text-5xl text-libertadores-green mb-4 group-hover:text-white"></i>
                        <h3 class="text-xl font-semibold mb-2">Networking</h3>
                        <p class="text-gray-600 group-hover:text-gray-200">Conecta con otros egresados y amplía tu red profesional</p>
                    </div>
                    <div class="text-center p-6 bg-gray-50 rounded-lg hover:bg-libertadores-green hover:text-white transition duration-300 transform hover:scale-105">
                        <i class="fas fa-briefcase text-5xl text-libertadores-green mb-4 group-hover:text-white"></i>
                        <h3 class="text-xl font-semibold mb-2">Oportunidades Laborales</h3>
                        <p class="text-gray-600 group-hover:text-gray-200">Accede a ofertas de empleo exclusivas para egresados</p>
                    </div>
                    <div class="text-center p-6 bg-gray-50 rounded-lg hover:bg-libertadores-green hover:text-white transition duration-300 transform hover:scale-105">
                        <i class="fas fa-graduation-cap text-5xl text-libertadores-green mb-4 group-hover:text-white"></i>
                        <h3 class="text-xl font-semibold mb-2">Formación Continua</h3>
                        <p class="text-gray-600 group-hover:text-gray-200">Mantente actualizado con nuestros programas de educación continua</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ofertas Laborales Destacadas -->
        <div class="mb-16 fade-in">
            <h2 class="text-4xl font-bold mb-8 text-libertadores-green text-center">Ofertas Laborales Destacadas</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-lg p-6 hover-grow">
                    <h3 class="text-xl font-semibold mb-2 text-libertadores-green">Ingeniero de Sistemas Senior</h3>
                    <p class="text-gray-600 mb-4">Empresa líder en tecnología busca ingeniero con experiencia en desarrollo web.</p>
                    <a href="#" class="text-libertadores-green hover:text-libertadores-gold transition duration-300">Ver detalles</a>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 hover-grow">
                    <h3 class="text-xl font-semibold mb-2 text-libertadores-green">Psicólogo Organizacional</h3>
                    <p class="text-gray-600 mb-4">Importante multinacional requiere psicólogo para su departamento de RRHH.</p>
                    <a href="#" class="text-libertadores-green hover:text-libertadores-gold transition duration-300">Ver detalles</a>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 hover-grow">
                    <h3 class="text-xl font-semibold mb-2 text-libertadores-green">Gerente de Marketing Digital</h3>
                    <p class="text-gray-600 mb-4">Agencia de publicidad busca profesional para liderar estrategias digitales.</p>
                    <a href="#" class="text-libertadores-green hover:text-libertadores-gold transition duration-300">Ver detalles</a>
                </div>
            </div>
            <div class="text-center mt-8">
                <a href="               " class="bg-libertadores-green text-white px-6 py-3 rounded-full hover:bg-libertadores-gold hover:text-libertadores-green transition duration-300 inline-block">Ver todas las ofertas</a>
            </div>
        </div>

        <!-- Eventos para Egresados -->
        <div class="mb-16 fade-in">
            <h2 class="text-4xl font-bold mb-8 text-libertadores-green text-center">Próximos Eventos</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300">
                    <h3 class="text-xl font-semibold mb-2 text-libertadores-green">Encuentro Anual de Egresados</h3>
                    <p class="text-gray-600 mb-2"><i class="far fa-calendar-alt mr-2 text-libertadores-gold"></i>15 de Noviembre, 2024</p>
                    <p class="text-gray-600 mb-4"><i class="fas fa-map-marker-alt mr-2 text-libertadores-gold"></i>Campus Principal</p>
                    <a href="#" class="text-libertadores-green hover:text-libertadores-gold transition duration-300">Más información</a>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300">
                    <h3 class="text-xl font-semibold mb-2 text-libertadores-green">Webinar: Tendencias en Innovación</h3>
                    <p class="text-gray-600 mb-2"><i class="far fa-calendar-alt mr-2 text-libertadores-gold"></i>5 de Octubre, 2024</p>
                    <p class="text-gray-600 mb-4"><i class="fas fa-video mr-2 text-libertadores-gold"></i>Evento Virtual</p>
                    <a href="#" class="text-libertadores-green hover:text-libertadores-gold transition duration-300">Registrarse</a>
                </div>
            </div>
            <div class="text-center mt-8">
                <a href="                   " class="bg-libertadores-green text-white px-6 py-3 rounded-full hover:bg-libertadores-gold hover:text-libertadores-green transition duration-300 inline-block">Ver todos los eventos</a>
            </div>
        </div>

        <!-- Testimonios -->
        <div class="mb-16 fade-in">
            <h2 class="text-4xl font-bold mb-8 text-libertadores-green text-center">Lo que dicen nuestros egresados</h2>
            <div class="swiper testimonialSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                            <img src="{{ asset('Imagenes/estudiante1.jpg') }}" alt="Egresado 1" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                            <p class="text-gray-600 mb-4">"La Universidad Los Libertadores me brindó las herramientas necesarias para destacar en mi campo profesional. Estoy agradecida por la formación recibida."</p>
                            <h4 class="font-semibold">María Rodríguez</h4>
                            <p class="text-sm text-gray-500">Egresada de Psicología, 2020</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                            <img src="{{ asset('Imagenes/estudiante2.jpg') }}" alt="Egresado 2" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                            <p class="text-gray-600 mb-4">"Los programas de intercambio y las prácticas profesionales me permitieron ganar una perspectiva global invaluable para mi carrera."</p>
                            <h4 class="font-semibold">Carlos Gómez</h4>
                            <p class="text-sm text-gray-500">Egresado de Ingeniería de Sistemas, 2019</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <!-- Estadísticas -->
        <div class="mb-16 fade-in">
            <h2 class="text-4xl font-bold mb-8 text-libertadores-green text-center">Los Libertadores en Cifras</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                    <i class="fas fa-user-graduate text-4xl text-libertadores-green mb-4"></i>
                    <h3 class="text-3xl font-bold mb-2">15,000+</h3>
                    <p class="text-gray-600">Egresados</p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                    <i class="fas fa-briefcase text-4xl text-libertadores-green mb-4"></i>
                    <h3 class="text-3xl font-bold mb-2">500+</h3>
                    <p class="text-gray-600">Empresas Aliadas</p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                    <i class="fas fa-book-open text-4xl text-libertadores-green mb-4"></i>
                    <h3 class="text-3xl font-bold mb-2">40+</h3>
                    <p class="text-gray-600">Programas Académicos</p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                    <i class="fas fa-globe-americas text-4xl text-libertadores-green mb-4"></i>
                    <h3 class="text-3xl font-bold mb-2">50+</h3>
                    <p class="text-gray-600">Convenios Internacionales</p>
                </div>
            </div>
        </div>

        <!-- FAQ Interactivo -->
        <div class="mb-16 fade-in">
            <h2 class="text-4xl font-bold mb-8 text-libertadores-green text-center">Preguntas Frecuentes</h2>
            <div class="max-w-2xl mx-auto">
                <div class="mb-4">
                    <button class="flex justify-between items-center w-full bg-white p-4 rounded-lg shadow-lg focus:outline-none">
                        <span class="font-semibold">¿Cómo puedo actualizar mis datos de contacto?</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="bg-white mt-2 p-4 rounded-lg shadow-lg hidden">
                        <p>Puedes actualizar tus datos de contacto iniciando sesión en tu cuenta de egresado y accediendo a la sección "Mi Perfil". Allí encontrarás opciones para modificar tu información personal y profesional.</p>
                    </div>
                </div>
                <div class="mb-4">
                    <button class="flex justify-between items-center w-full bg-white p-4 rounded-lg shadow-lg focus:outline-none">
                        <span class="font-semibold">¿Cómo puedo acceder a las ofertas laborales exclusivas?</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="bg-white mt-2 p-4 rounded-lg shadow-lg hidden">
                        <p>Las ofertas laborales exclusivas para egresados están disponibles en la sección "Bolsa de Empleo" de nuestro portal. Asegúrate de tener tu perfil actualizado para recibir notificaciones personalizadas.</p>
                    </div>
                </div>
                <div class="mb-4">
                    <button class="flex justify-between items-center w-full bg-white p-4 rounded-lg shadow-lg focus:outline-none">
                        <span class="font-semibold">¿Qué beneficios tengo como egresado?</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="bg-white mt-2 p-4 rounded-lg shadow-lg hidden">
                        <p>Como egresado, tienes acceso a múltiples beneficios, incluyendo descuentos en programas de educación continua, acceso a la biblioteca, asesoría en emprendimiento, y participación en eventos exclusivos de networking.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-libertadores-green to-green-600 text-white">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h5 class="text-2xl font-bold mb-4">Contáctanos</h5>
                    <p class="mb-2"><i class="fas fa-map-marker-alt mr-2"></i> Carrera 16 # 63A - 68, Bogotá</p>
                    <p class="mb-2"><i class="fas fa-phone mr-2"></i> (601) 254 4750</p>
                    <p><i class="fas fa-envelope mr-2"></i> egresados@libertadores.edu.co</p>
                </div>
                <div>
                    <h5 class="text-2xl font-bold mb-4">Enlaces Rápidos</h5>
                    <a href="            " class="block mb-2 hover:text-libertadores-gold transition duration-300">Directorio de Egresados</a>
                    <a href="                   " class="block mb-2 hover:text-libertadores-gold transition duration-300">Ofertas Laborales</a>
                    <a href="                     " class="block mb-2 hover:text-libertadores-gold transition duration-300">Eventos</a>
                    @auth
                        <a href="                " class="block hover:text-libertadores-gold transition duration-300">Actualiza tus Datos</a>
                    @else
                        <a href="                   " class="block hover:text-libertadores-gold transition duration-300">Iniciar Sesión para Actualizar Datos</a>
                    @endauth
                </div>
                <div>
                    <h5 class="text-2xl font-bold mb-4">Redes Sociales</h5>
                    <a href="https://www.facebook.com/UniLibertadores?fref=ts" class="block mb-2 hover:text-libertadores-gold transition duration-300"><i class="fab fa-facebook mr-2"></i> Facebook</a>
                    <a href="#" class="block mb-2 hover:text-libertadores-gold transition duration-300"><i class="fab fa-twitter mr-2"></i> Twitter</a>
                    <a href="#" class="block mb-2 hover:text-libertadores-gold transition duration-300"><i class="fab fa-instagram mr-2"></i> Instagram</a>
                    <a href="#" class="block hover:text-libertadores-gold transition duration-300"><i class="fab fa-linkedin mr-2"></i> LinkedIn</a>
                </div>
            </div>
        </div>
        <div class="bg-libertadores-green py-4">
            <div class="container mx-auto px-4 text-center">
                <p>&copy; 2024 Sistema de Egresados - Universidad Los Libertadores. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
    // Inicialización del slider principal
    var swiper = new Swiper(".mySwiper", {
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 5000,
        },
        loop: true,
    });

    // Inicialización del slider de testimonios
    var testimonialSwiper = new Swiper(".testimonialSwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
            },
        },
    });

    // FAQ interactivo
    const faqButtons = document.querySelectorAll('.mb-4 > button');
    faqButtons.forEach(button => {
        button.addEventListener('click', () => {
            const answer = button.nextElementSibling;
            answer.classList.toggle('hidden');
            button.querySelector('i').classList.toggle('fa-chevron-up');
            button.querySelector('i').classList.toggle('fa-chevron-down');
        });
    });

    // Menú móvil
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Menú desplegable para Iniciar Sesión con mejor manejo
    document.addEventListener('DOMContentLoaded', function() {
        const loginButton = document.getElementById('login-button');
        const loginDropdown = loginButton.nextElementSibling;
        
        // Mostrar/ocultar al hacer clic
        loginButton.addEventListener('click', (e) => {
            e.stopPropagation();
            loginDropdown.classList.toggle('opacity-0');
            loginDropdown.classList.toggle('invisible');
        });

        // Cerrar al hacer clic fuera
        document.addEventListener('click', (e) => {
            if (!loginButton.contains(e.target) && !loginDropdown.contains(e.target)) {
                loginDropdown.classList.add('opacity-0');
                loginDropdown.classList.add('invisible');
            }
        });

        // Asegurarse de que los enlaces funcionen
        loginDropdown.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', (e) => {
                e.stopPropagation();
                window.location.href = link.href;
            });
        });
    });
    </script>
</body>

</html>
