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
        <nav class="fixed top-0 z-50 w-full border-b border-gray-300 bg-white/80 backdrop-blur-md transition-all duration-300 dark:border-gray-700 dark:bg-gray-900/80">
            <div class="mx-auto max-w-screen-xl px-4 py-3 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <!-- Logo -->
                    <a href="{{ route('/') }}" class="flex items-center space-x-3">
                        <img src="{{ asset('img/Cabinet.png') }}" class="h-10 md:h-12 transition-all duration-300" alt="Logo Cabinet N.I.C & Associés" />
                        <span class="text-xl font-semibold text-gray-900 dark:text-white md:text-2xl">N.I.C & Associés</span>
                    </a>

                    <!-- Mobile Menu Button -->
                    <button id="menu-toggle" type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-800 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gold/50 dark:text-gray-200 dark:hover:bg-gray-700 md:hidden" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Ouvrir le menu</span>
                        <svg id="menu-icon" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg id="close-icon" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <!-- Navigation Desktop -->
                    <div class="hidden items-center space-x-6 md:flex">
                        <a href="{{ route('/') }}" class="nav-link relative px-3 py-2 text-gray-900 transition-all duration-300 hover:text-gold dark:text-gray-200 dark:hover:text-gold">
                            <span class="relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-gold after:transition-all after:duration-300 hover:after:w-full">Accueil</span>
                        </a>
                        @if (request()->routeIs('/'))
                        <a href="#services" class="nav-link relative px-3 py-2 text-gray-900 transition-all duration-300 hover:text-gold dark:text-gray-200 dark:hover:text-gold">
                            <span class="relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-gold after:transition-all after:duration-300 hover:after:w-full">Nos services</span>
                        </a>
                        @endif
                        <a href="{{ route('honoraires') }}" class="nav-link relative px-3 py-2 text-gray-900 transition-all duration-300 hover:text-gold dark:text-gray-200 dark:hover:text-gold">
                            <span class="relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-gold after:transition-all after:duration-300 hover:after:w-full">Honoraires</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu (Dropdown) -->
            <div id="mobile-menu" class="hidden max-h-0 overflow-hidden bg-white transition-all duration-300 dark:bg-gray-900 md:hidden">
                <div class="space-y-1 px-4 pb-3 pt-2">
                    <a href="{{ route('/') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 transition-colors duration-200 hover:bg-gray-100 hover:text-gold dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-gold">Accueil</a>
                    @if (request()->routeIs('/'))
                    <a href="#services" class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 transition-colors duration-200 hover:bg-gray-100 hover:text-gold dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-gold">Nos services</a>
                    @endif
                    <a href="{{ route('honoraires') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 transition-colors duration-200 hover:bg-gray-100 hover:text-gold dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-gold">Honoraires</a>
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
            <div class="m-1 md:items-start mb-4 md:mb-0">
                <a href="tel:+243816301931" class="block text-sm md:text-base">Téléphone : +2438166301931</a>
                <a href="mailto:cabinetnicetassocies@gmail.com" class="block text-sm md:text-base hover:text-gray-400">Email : cabinetnicetassocies@gmail.com</a>
                <a href="#" class="text-sm md:text-base hover:text-gray-400">Adresse : 287, Mweka, 1er étage.<br> Appartement 1 A. Q/Pakadjuma,Lingwala</a>
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

    </script>
        
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIcon = document.getElementById('menu-icon');
            const closeIcon = document.getElementById('close-icon');
            
            menuToggle.addEventListener('click', function() {
                const isExpanded = mobileMenu.classList.toggle('hidden');
                
                // Animation pour l'ouverture/fermeture
                if (isExpanded) {
                    mobileMenu.style.maxHeight = '0';
                } else {
                    mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
                }
                // Changer les icônes
                menuIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
                // Accessibilité
                const expanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !expanded);
            });
        });
    </script>
    <x-contacts/>
</body>
</html>
