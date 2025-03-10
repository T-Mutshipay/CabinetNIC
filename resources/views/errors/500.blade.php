<x-layouts.error>
    <div class="mt-5 text-center">
        <!-- Titre principal avec animation -->
        <h1 class="text-9xl font-bold text-gray-800 dark:text-white mb-4 animate-bounce">
            500
        </h1>

        <!-- Sous-titre avec un effet de gradient -->
        <h2 class="text-3xl font-bold bg-gradient-to-r from-purple-500 to-pink-500 bg-clip-text text-transparent dark:from-purple-400 dark:to-pink-400">
            Erreur interne du serveur
        </h2>

        <!-- Bouton avec effet de survol et animation -->
        <button
            class="mt-10 inline-flex items-center gap-2 rounded-lg bg-purple-500 px-8 py-4 font-semibold text-white shadow-lg transition-all duration-300 hover:scale-105 hover:bg-opacity-90 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 dark:bg-purple-600 dark:hover:bg-opacity-90"
            onclick="history.back()">
            <!-- Icône SVG -->
            <svg class="h-6 w-6 fill-current" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M14.7492 6.38125H2.73984L7.52109 1.51562C7.77422 1.2625 7.77422 0.86875 7.52109 0.615625C7.26797 0.3625 6.87422 0.3625 6.62109 0.615625L0.799219 6.52187C0.546094 6.775 0.546094 7.16875 0.799219 7.42188L6.62109 13.3281C6.73359 13.4406 6.90234 13.525 7.07109 13.525C7.23984 13.525 7.38047 13.4687 7.52109 13.3562C7.77422 13.1031 7.77422 12.7094 7.52109 12.4563L2.76797 7.64687H14.7492C15.0867 7.64687 15.368 7.36562 15.368 7.02812C15.368 6.6625 15.0867 6.38125 14.7492 6.38125Z"
                    fill="currentColor"
                />
            </svg>
            <span>Retourner en arrière</span>
        </button>
    </div>
</x-layouts.error>