<!-- Font Awesome CDN pour les icônes -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Main modal -->
<div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" 
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 bg-black/50">
    <div class="relative p-4 w-full max-w-md md:max-w-lg mx-auto transition-transform duration-300">
        <!-- Modal content -->
        <div class="relative bg-white rounded-xl shadow-2xl dark:bg-gray-800 transform transition-all duration-300 scale-95 md:scale-100">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-6 border-b dark:border-gray-700">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                    <i class="fas fa-comments mr-2 text-blue-500"></i>
                    Contactez-nous
                </h3>
                <button type="button"  data-modal-hide="static-modal" class="text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-full p-2 transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="text-center">
                    <p class="text-gray-600 dark:text-gray-400 mb-6 text-lg">
                        Nous sommes disponibles via ces canaux :
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Email -->
                        <a href="mailto:cabinetnicetassocies@gmail.com" 
                           class="group flex flex-col items-center p-4 bg-white dark:bg-gray-700 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1 border border-transparent hover:border-blue-200 dark:hover:border-gray-600">
                            <div class="w-14 h-14 bg-red-50 dark:bg-red-900/20 rounded-full flex items-center justify-center mb-3 group-hover:bg-red-100 transition-colors">
                                <i class="fas fa-envelope text-2xl text-red-500 group-hover:text-red-600"></i>
                            </div>
                            <span class="text-gray-700 dark:text-gray-300 font-medium">Email</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Réponse sous 24h</span>
                        </a>

                        </a>

                        <!-- Téléphone -->
                        <a href="tel:+2438166301931" 
                           class="group flex flex-col items-center p-4 bg-white dark:bg-gray-700 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1 border border-transparent hover:border-blue-200 dark:hover:border-gray-600">
                            <div class="w-14 h-14 bg-blue-50 dark:bg-blue-900/20 rounded-full flex items-center justify-center mb-3 group-hover:bg-blue-100 transition-colors">
                                <i class="fas fa-phone-alt text-2xl text-blue-500 group-hover:text-blue-600"></i>
                            </div>
                            <span class="text-gray-700 dark:text-gray-300 font-medium">Téléphone</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">24h/24 - 7j/7</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="p-6 border-t dark:border-gray-700 bg-gray-50 dark:bg-gray-900/30 rounded-b-xl">
                <div class="flex justify-between items-center">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        <i class="fas fa-info-circle mr-2"></i>
                        Réponse garantie sous 24 heures
                    </p>
                    <button data-modal-hide="static-modal" 
                            class="px-5 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors duration-200">
                        Fermer
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>