<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inmobiliaria PAMAI</title>

    <!-- Google Fonts Premium Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..0,900;1,100..0,900&display=swap" rel="stylesheet">

    <!-- Scripts and Styles via Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        /* Forzamos a que el cuerpo no tenga fondos oscuros ni márgenes rebeldes */
        body, html { 
            font-family: 'Montserrat', sans-serif; 
            margin: 0 !important;
            padding: 0 !important;
            background-color: #ffffff !important; /* Fondo base completamente blanco */
            overflow-x: hidden;
            width: 100%;
        }
        .bg-pamai { background-color: #153e6b !important; }
        .text-pamai { color: #153e6b !important; }
    </style>
</head>
<body>
    <div id="app" class="w-100 m-0 p-0">
        <!-- BARRA DE NAVEGACIÓN SUPERIOR (Exactamente igual a tu mockup) -->
        <nav class="navbar navbar-expand-md navbar-dark bg-pamai shadow-sm py-2" style="position: relative; z-index: 1000; margin: 0; border: none;">
            <div class="container-fluid px-4">
                <!-- Logo a la izquierda -->
                <a class="navbar-brand p-0" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="Logo PAMAI" class="bg-white p-1 rounded" style="height: 55px; width: 55px; object-fit: contain;">
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Enlaces a la derecha -->
                    <ul class="navbar-nav ms-auto align-items-center gap-4">
                        <li class="nav-item">
                            <a class="nav-link text-white fw-semibold small" href="{{ route('inventory') }}">Encuentra una propiedad</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white-50 small" href="#">Contáctanos</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white fw-semibold small" href="{{ route('login') }}">Iniciar sesión Cliente/Administrador</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fw-semibold small" href="#" role="button" data-bs-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- CONTENEDOR PRINCIPAL LIMPIO (Sin paddings 'py-4' que metan recuadros blancos o grises) -->
        <main class="w-100 m-0 p-0">
            @yield('content')
        </main>
    </div>
</body>
</html>