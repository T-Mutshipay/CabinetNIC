<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'N.I.C & Associés')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
        <body class=" dark:bg-slate-300">
            <header class="relative bg-cover bg-center bg-no-repeat h-screen md:h-[80vh]" style="background-image: url('{{ asset('img/fond.jpg') }}');">
                <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                        <a href="{{ route('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                            <img src="{{ asset('img/Cabinet.png') }}" class=" h-14" alt="Logo" />
                            <span class="text-xl md:text-2xl font-semibold whitespace-nowrap text-gray-900 dark:text-white">
                                N.I.C & Associés
                            </span>
                        </a>
                    <button data-collapse-toggle="navbar-solid-bg" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gold focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                        </svg>
                    </button>
                    <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
                        <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                            <li>
                                <a href="{{ route('/') }}" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gold md:hover:bg-transparent md:border-0 md:hover:text-bg-gold dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                    Accueil
                                </a>
                            </li>
                            @if (request()->routeIs('/'))
                            <li>
                                <a href="#services" 
                                class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gold md:hover:bg-transparent md:border-0 md:hover:text-bg-gold dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">    Nos services
                                </a>
                            </li>
                            @endif
                            <li>
                                <a href=" {{route('honoraires')}} " 
                                class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gold md:hover:bg-transparent md:border-0 md:hover:text-bg-gold dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">    Honoraires
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
                <script>
                    const hamburger = document.getElementById('hamburger');
                    const navbar = document.getElementById('navbar-default');
                    hamburger.addEventListener('click', () => {
                        navbar.classList.toggle('hidden');
                    });
                </script>
                <div class="container mx-auto px-4">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-1">
                        <div class="flex flex-col items-center md:items-start">
                            <h1 class="text-4xl font-bold text-gold text-center md:text-left md:mt-4">
                                Une équipe au coeur de votre stratégie
                            </h1>
                            <button class="mt-3 md:mt-1 bg-gold text-white rounded px-6 py-2" data-modal-target="static-modal" data-modal-toggle="static-modal">
                                Parler à un Avocat
                            </button>
                        </div>
                        <div class="flex justify-center md:justify-end mt-3 md:mt-0">
                            <div class="relative w-56 h-56 md:w-48 md:h-48 sm:w-40 sm:h-40 p-2 ">
                                <img src="{{ asset('img/balance.jpg') }}" alt="Circle Image" class="rounded-full w-full h-40 object-cover ring-4 ring-gray-300 dark:ring-gray-500">
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            
            <main>
                @yield('services')
                @yield('team')
                @yield('articles')
                @yield('content')
                @yield('commentaire')
            </main>
            <footer class="bg-gray-800 text-white py-8">
                <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="flex flex-col items-center m-1 md:items-start mb-4 md:mb-0">
                        <img src="{{asset('img/Cabinet.png')}}" class="h-16" alt="Logo" />
                    </div>
            
                    <nav class="flex flex-col md:flex-row items-center md:justify-end text-center space-y-2 md:space-y-0 md:space-x-4">
                        <a href="#team" class="py-2 px-3 text-white rounded hover:bg-gold dark:hover:bg-gold block">Nos Avocats</a>
                        <a href="#" class="py-2 px-3 text-white rounded hover:bg-gold dark:hover:bg-gold block">Nos Honoraires</a>
                    </nav>
                    
                    <div class="flex flex-col items-center md:items-start text-justify md:text-left">
                        <h3 class="text-lg font-semibold mb-2">À Propos</h3>
                        <p class="text-sm md:text-base m-2">N.I.C & Associés est un cabinet d'avocats dédié à la défense de vos droits et à la fourniture de conseils juridiques de qualité.
                            appétence: droit judiciaire, droit du recouvrement, droit de la propriété intellectuelle, droit du travail, contentieux fiscal et administratifs, droit de la communication audiovisuelle et droit des affaires en général
                        </p>
                    </div>
                </div>
            
                <div class="border-t border-gray-700 my-4"></div>
            
                <div class="container mx-auto flex flex-col md:flex-row items-center md:items-start justify-between text-center md:text-left space-y-4 md:space-y-0 md:space-x-8">
                    <div>
                        <a href="tel:+243893374786" class="block text-sm md:text-base">Numéro de Téléphone : +243893374786</a>
                        <a href="mailto:nicetassocies@gmail.com" class="block text-sm md:text-base hover:text-gray-400">Email : nicetassocies@gmail.com</a>
                        <div class="mt-1">
                            <i class="fa fa-map-marker mt-4" aria-hidden="true"></i>
                            <a href="https://www.google.fr/maps/place/291+Rue+De+Mweka,+Kinshasa/@-4.3213219,15.2946519,21z/data=!4m14!1m7!3m6!1s0x1a6a33e1f7856be7:0x3b8de1ba64073e7c!2s287+Rue+De+Mweka,+Kinshasa!3b1!8m2!3d-4.3213222!4d15.2948531!3m5!1s0x1a6a33e1f0011c13:0x2cbdd4d188162756!8m2!3d-4.3212868!4d15.2948427!16s%2Fg%2F11kyqmtnvh?entry=ttu&g_ep=EgoyMDI0MTAyOS4wIKXMDSoASAFQAw%3D%3D" class="text-sm md:text-base hover:text-gray-400">Adresse: 287, Mweka, C/ Lingwala Kinshasa</a>
                        </div>
                    </div>
            
                    <div class="flex justify-center md:justify-start space-x-4" aria-label="Liens vers les réseaux sociaux">
                        <a href="https://web.facebook.com/?locale=fr_FR&_rdc=1&_rdr" class="p-2 text-white rounded hover:bg-gold" aria-label="Facebook">
                            <i class="fab fa-facebook fa-1.5x"></i>
                        </a>
                        <a href="#" class="p-2 text-white rounded hover:bg-gold" aria-label="LinkedIn">
                            <i class="fab fa-linkedin fa-1.5x"></i>
                        </a>
                        <a href="#" class="p-2 text-white rounded hover:bg-gold" aria-label="Twitter">
                            <i class="fab fa-twitter fa-1.5x"></i>
                        </a>
                        <a href="#" class="p-2 text-white rounded hover:bg-gold" aria-label="Instagram">
                            <i class="fab fa-instagram fa-1.5x"></i>
                        </a>
                    </div>
                </div>
            
                <div class="text-center mt-4">
                    <p>&copy; <span id="currentYear"></span> N.I.C & Associés. Tous droits réservés.</p>
                </div>
            </footer>
            <x-contacts/>
    </body>
</html>
<script> document.getElementById('currentYear').textContent = new Date().getFullYear(); </script>