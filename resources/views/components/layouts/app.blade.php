<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Votre Titre Par Défaut')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <nav class="border-gray-200 bg-white dark:border-gray-700">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{asset('img/Cabinet.png')}}" class="h-16" alt="Logo" />
                    <span class="self-center text-center text-2xl font-semibold whitespace-nowrap dark:text-white">N.I.C & Associés</span>
                </a>
                <button id="hamburger" class="md:hidden flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-white dark:hover:bg-gray-700" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Ouvrir le menu</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
        
                <ul id="navbar-default" class="hidden w-full md:flex md:w-auto font-medium mt-4 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                    <li>
                        <a href="" class="flex items-center py-2 px-3 text-gray-900 rounded hover:bg-gray-400 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white">                  
                            <span>Administration</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="flex items-center py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white">                  
                            <span>Nos Services</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="flex items-center py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white">                  
                            <span>Honoraires</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <script>
            const hamburger = document.getElementById('hamburger');
            const navbar = document.getElementById('navbar-default');
        
            hamburger.addEventListener('click', () => {
                navbar.classList.toggle('hidden');
            });
        </script>
          <!-- Top Section -->
    <div class="container mx-auto p-8 bg-slate-700">
        <div class="grid grid-cols-2 gap-4">
            <!-- Left Content -->
            <div class="flex flex-col items-start">
                <h1 class="text-2xl font-bold">Lorem</h1>
                <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Button</button>
            </div>
            <!-- Right Image Section -->
            <div class="flex justify-center items-center">
                <div class="relative w-48 h-48">
                    <img src="img/balance.jpg" alt="Circle Image" class="rounded-full w-full h-full object-cover ring-2 ring-gray-300 dark:ring-gray-500">
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
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-start md:items-center">
            <!-- Section Image -->
            <div class="mb-4 md:mb-0">
                <img src="chemin/vers/image.png" alt="Logo de NC & Associés" class="w-32">
            </div>
    
            <!-- Section Liens -->
            <nav class="flex flex-col space-y-2 text-right md:text-left" aria-label="Liens de navigation">
                <a href="#" class="hover:text-gray-400">Nos Avocats</a>
                <a href="#" class="hover:text-gray-400">Nos Services</a>
                <a href="#" class="hover:text-gray-400">Nos Honoraires</a>
            </nav>
        </div>
    
        <!-- Ligne de séparation -->
        <div class="border-t border-gray-700 my-4"></div>
    
        <!-- Section Adresse et icônes -->
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <address class="mb-4 md:mb-0" aria-label="Adresse">
                123 Rue Exemple, Paris, France
            </address>
            
            <!-- Icônes sociales -->
            <div class="flex space-x-4" aria-label="Liens vers les réseaux sociaux">
                <a href="#" class="text-white hover:text-gray-400" aria-label="Facebook">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-400" aria-label="LinkedIn">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-400" aria-label="Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
            </div>
        </div>
    
        <!-- Section Copyright -->
        <div class="text-center mt-4">
            <p>&copy; 2024 NC & Associés. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>