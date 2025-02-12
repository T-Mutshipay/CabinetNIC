<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'N.I.C & Associés')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- FontAwesome & Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="dark:bg-slate-300">

    <!-- HEADER -->
    <header class="relative bg-cover bg-center bg-fixed bg-no-repeat min-h-screen flex flex-col justify-between" 
        style="background-image: url('{{ asset('img/fond.jpg') }}');">
        
        <!-- NAVBAR -->
        <nav class="border-b border-gray-300 bg-white/80 backdrop-blur-md dark:bg-gray-900/80 dark:border-gray-700 fixed top-0 w-full z-50">
            <div class="max-w-screen-xl mx-auto flex items-center justify-between px-6 py-4">
                
                <!-- Logo -->
                <a href="{{ route('/') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('img/Cabinet.png') }}" class="h-12 md:h-14" alt="Logo" />
                    <span class="text-xl md:text-2xl font-semibold text-gray-900 dark:text-white">N.I.C & Associés</span>
                </a>
                
                <!-- Mobile Menu Button -->
                <button id="menu-toggle" class="md:hidden text-gray-800 dark:text-gray-200 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>

                <!-- Navigation Links -->
                <div id="menu" class=" dark:text-white hidden md:flex md:space-x-8 items-center">
                    <a href="{{ route('/') }}" class="nav-link">Accueil</a>
                    @if (request()->routeIs('/'))
                        <a href="#services" class="nav-link">Nos services</a>
                    @endif
                    <a href="{{ route('honoraires') }}" class="nav-link">Honoraires</a>
                </div>
            </div>
        </nav>

        <div class="flex flex-col md:flex-row items-center justify-between text-center md:text-left px-6 md:px-16 py-20 md:py-36">
            <div class="md:w-2/3">
                <h1 class="text-4xl md:text-5xl font-bold text-white drop-shadow-lg animate-fade-in">
                    Une équipe au cœur de votre stratégie
                </h1>
                <p class="text-lg text-gray-100 mt-4">Nous vous accompagnons dans tous vos défis juridiques avec expertise et engagement.</p>
                <a href="#" class="mt-6 inline-block bg-gold text-white font-semibold rounded-lg px-8 py-3 text-lg shadow-md hover:scale-105 transition-transform" data-modal-target="static-modal" data-modal-toggle="static-modal">
                    Parler à un Avocat
                </a>
            </div>
            <div class="hidden md:block">
                <img src="{{ asset('img/balance.jpg') }}" alt="Image Balance" 
                     class="rounded-full w-64 h-64 object-cover ring-4 ring-gray-300 dark:ring-gray-500 animate-fade-in">
            </div>
        </div>
    </header> 

    <main class="relative z-10 bg-white dark:bg-gray-900 py-10">
        @yield('services')
        @yield('team')
        @yield('articles')
        @yield('content')
        @yield('commentaire')
    </main>

    <footer class="absolute w-full bg-gray-800 text-white py-4">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="flex flex-col items-center m-1 md:items-start mb-4 md:mb-0">
                <img src="{{asset('img/Cabinet.png')}}" class="h-16" alt="Logo" />
            </div>
            
            <div class="flex justify-end space-y-2 md:space-y-0 md:space-x-4">
                <p class="text-sm md:text-base m-2">
                    <span class="font-bold text-2xl">À Propos</span> : 
                    <br>
                    N.I.C & Associés est un cabinet d'avocats dédié à la défense de vos droits et à la fourniture de conseils juridiques de qualité.
                    appétence: droit judiciaire, droit du recouvrement, droit de la propriété intellectuelle, droit du travail, contentieux fiscal et administratifs, droit de la communication audiovisuelle et droit des affaires en général
                </p>
            </div>
        </div>

        <div class="border-t border-gray-700 my-4"></div>

        <div class="container mx-auto flex flex-col md:flex-row items-center md:items-start justify-between text-center md:text-left space-y-4 md:space-y-0">
            <div>
                <a href="tel:+243893374786" class="block text-sm md:text-base">Téléphone : +243893374786</a>
                <a href="mailto:nicetassocies@gmail.com" class="block text-sm md:text-base hover:text-gray-400">Email : nicetassocies@gmail.com</a>
                <a href="#" class="text-sm md:text-base hover:text-gray-400">Adresse : 287, Mweka, Kinshasa</a>
            </div>

            <div class="flex space-x-4">
                <a href="#" class="p-2 text-white rounded hover:bg-gold" aria-label="Facebook">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="#" class="p-2 text-white rounded hover:bg-gold" aria-label="LinkedIn">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="#" class="p-2 text-white rounded hover:bg-gold" aria-label="Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="p-2 text-white rounded hover:bg-gold" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>

        <div class="text-center mt-4">
            <p>&copy; <span id="currentYear"></span> N.I.C & Associés. Tous droits réservés.</p>
        </div>
    </footer>

    <script>
        document.getElementById('currentYear').textContent = new Date().getFullYear();

        // Menu mobile toggle
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('menu').classList.toggle('hidden');
        });
    </script>

    <style>
        .nav-link {
            @apply block py-2 px-3 text-gray-900 dark:text-white hover:text-gold transition;
        }
        .social-link {
            @apply text-white text-2xl hover:text-gold transition;
        }
        .animate-fade-in {
            animation: fadeIn 1s ease-out forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    <x-contacts/>
</body>
</html>
