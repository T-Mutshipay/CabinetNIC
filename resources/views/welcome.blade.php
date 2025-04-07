<x-layouts.app>
    @section('services')
        <div id="services" class="p-8 flex justify-center mt-10">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl md:text-6xl font-bold mb-4 text-gold text-center">Nos services</h2>
                <div class="border-t border-gold my-4"></div>
                <div class="text-gold grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 md:gap-8">
                    <!-- Service 1: Consultations et Conseils Juridiques -->
                    <div class="flex flex-col items-center m-1">
                        <div class="rounded-lg flex items-center justify-center h-48 w-48 sm:h-60 sm:w-60 bg-gold">
                            <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="mt-2 text-center">
                            <h1 class="text-xl md:text-2xl font-bold mb-4">Consultations et Conseils Juridiques</h1>
                            <p class="text-center text-sm md:text-base">
                                Consultations juridiques, Conseils juridiques, et Conciliations
                            </p>
                        </div>
                    </div>
                    
                    <!-- Service 2: Assistance et Représentation Judiciaire -->
                    <div class="flex flex-col items-center m-1">
                        <div class="rounded-lg flex items-center justify-center h-48 w-48 sm:h-60 sm:w-60 bg-gold">
                            <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="mt-2 text-center">
                            <h1 class="text-xl md:text-2xl font-bold mb-4">Assistance et Représentation Judiciaire</h1>
                            <p class="text-center text-sm md:text-base">
                                Assistance judiciaire, Représentation judiciaire
                            </p>
                        </div>
                    </div>
                    
                    <!-- Service 3: Assistance et Représentation Extrajudiciaire -->
                    <div class="flex flex-col items-center m-1">
                        <div class="rounded-lg flex items-center justify-center h-48 w-48 sm:h-60 sm:w-60 bg-gold">
                            <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="mt-2 text-center">
                            <h1 class="text-xl md:text-2xl font-bold mb-4">Assistance et Représentation Extrajudiciaire</h1>
                            <p class="text-center text-sm md:text-base">
                                Rédaction des actes juridiques, Assistance extrajudiciaire, et Représentation
                                extrajudiciaire
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    @endsection
    @section('team')
        <div class="relative overflow-hidden bg-gradient-to-br from-slate-900 to-blue-900 py-16 dark:from-slate-800 dark:to-slate-900">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-20 max-w-4xl">
                    <div class="mb-12">
                        <h2 class="mb-8 text-4xl font-bold text-white md:text-5xl lg:text-6xl">
                            <span class="bg-gradient-to-r from-gold to-amber-200 bg-clip-text text-transparent">
                                Rencontrez notre équipe d'avocats
                            </span>
                        </h2>
                        
                        <div class="space-y-8 text-lg text-gray-100">
                            <p class="leading-relaxed">
                                Chez <span class="font-semibold text-gold">N.I.C & Associés</span>, notre équipe allie expertise et passion pour défendre vos droits. 
                                <span class="block mt-2 text-amber-100">Chaque cas est unique, chaque solution sur mesure.</span>
                            </p>
                            
                            <div class="rounded-lg bg-black/10 p-6 backdrop-blur-sm">
                                <svg class="mb-4 h-8 w-8 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                <p class="font-medium text-white">Nos valeurs : <span class="text-gold">Intégrité</span>, <span class="text-gold">Transparence</span>, <span class="text-gold">Excellence</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="relative -mt-24 pb-28">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="rounded-xl bg-white shadow-2xl dark:bg-slate-800">
                    <div class="px-6 py-12 sm:px-8 md:px-12">
                        <h2 class="mb-16 text-center text-3xl font-bold md:text-4xl lg:text-5xl">
                            <span class="bg-gradient-to-r from-gold to-amber-300 bg-clip-text text-transparent">
                                Notre Équipe
                            </span>
                        </h2>
                        <div class="grid grid-cols-1 gap-y-16 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($avocats as $item)
                            <div class="flex flex-col">
                                <div class="group relative flex-1 rounded-xl border border-gray-100 bg-white p-6 shadow-md transition-all duration-300 hover:shadow-xl dark:border-slate-700 dark:bg-slate-800">
                                    <!-- Overlay gradient -->
                                    <div class="absolute -inset-1 rounded-xl bg-gradient-to-r from-gold/20 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
                                    
                                    <!-- Photo -->
                                    <div class="relative -mt-20 mb-6 flex justify-center">
                                        <div class="relative h-32 w-32 overflow-hidden rounded-full border-4 border-white shadow-xl dark:border-slate-800">
                                            <img src="{{ asset($item->image) }}" alt="{{ $item->nom_complet }}" 
                                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                                        </div>
                                    </div>

                                    <!-- Contenu texte -->
                                    <div class="text-center">
                                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ $item->nom_complet }}</h3>
                                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-300">{{ $item->role }}</p>
                                        
                                        <div class="mt-4 text-gray-600 dark:text-gray-400">
                                            <svg class="mx-auto h-5 w-5 text-gold" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                                                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                                            </svg>
                                            <p class="mt-3 text-sm leading-relaxed line-clamp-3">{{ $item->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mb-4 mt-6 flex justify-center">
                            <a href="{{ route('avocats') }}" class="flex items-center rounded-full bg-gradient-to-r from-gold to-amber-300 px-8 py-3 font-semibold text-slate-900 shadow-lg transition-all hover:scale-105 hover:shadow-xl">
                                <span>Voir toute l'équipe</span>
                                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
    @section('articles')
        <div class="relative overflow-hidden bg-gradient-to-br from-slate-800 to-slate-900 py-20">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-4xl">
                    <div class="mb-12">
                        <h2 class="mb-8 text-4xl font-bold text-white md:text-5xl">
                            <span class="bg-gradient-to-r from-gold to-amber-200 bg-clip-text text-transparent">
                                L'Actualité Juridique
                            </span>
                        </h2>
                        
                        <div class="space-y-6 text-lg text-gray-200">
                            <p class="leading-relaxed">
                                Dans un paysage juridique en constante évolution, <span class="font-semibold text-gold">N.I.C & Associés</span> 
                                décrypte pour vous les tendances et réformes essentielles.
                            </p>
                            
                            <div class="relative rounded-lg bg-black/10 p-6 backdrop-blur-sm">
                                <div class="absolute inset-0 bg-gradient-to-r from-gold/10 to-transparent opacity-30"></div>
                                <svg class="mb-4 h-8 w-8 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                                <p class="text-lg font-medium text-white">
                                    Notre veille juridique au service de vos intérêts
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="relative -mt-16 pb-20">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="rounded-xl bg-white shadow-2xl dark:bg-slate-800">
                    <div class="px-8 py-12 sm:px-12">
                        <!-- Barre de recherche améliorée -->
                        <div class="group relative mb-12 max-w-2xl mx-auto">
                            <input 
                                type="text" 
                                id="search-input"
                                placeholder="Rechercher un article..." 
                                class="w-full rounded-xl border-2 border-gray-200 bg-white py-4 pl-12 pr-6 text-lg shadow-sm transition-all focus:border-gold focus:ring-2 focus:ring-gold/30 dark:border-slate-600 dark:bg-slate-700 dark:text-white">
                            <svg class="absolute left-4 top-1/2 h-6 w-6 -translate-y-1/2 text-gray-400 dark:text-slate-400" 
                                fill="none" 
                                stroke="currentColor" 
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <button id="reset-search"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 hidden">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Votre grille d'articles conservée -->
                        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3" id="articles-container">
                            @foreach ($actualites as $item)
                            <article class="article group relative overflow-hidden rounded-xl border border-gray-100 bg-white shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl dark:border-slate-700 dark:bg-slate-800"
                                    data-title="{{ strtolower($item->titre) }}"
                                    data-content="{{ strtolower($item->contenu) }}">
                                <!-- Image Container -->
                                <div class="relative h-60 overflow-hidden">
                                    <img 
                                        src="{{ asset($item->image) ?? asset('img/fond.jpg') }}" 
                                        alt="{{ $item->titre }}"
                                        class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                        loading="lazy">
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 to-transparent"></div>
                                    <time class="absolute bottom-4 left-4 rounded-lg bg-black/30 px-3 py-1 text-sm text-white backdrop-blur-sm">
                                        {{ $item->created_at->translatedFormat('d M Y') }}
                                    </time>
                                </div>

                                <!-- Content -->
                                <div class="p-6">
                                    <h3 class="mb-3 text-xl font-bold text-gray-900 dark:text-white">
                                        {{ $item->titre }}
                                    </h3>
                                    <p class="mb-4 text-gray-600 dark:text-gray-300 line-clamp-3">
                                        {{ $item->contenu }}
                                    </p>
                                    <a 
                                        href="{{ route('actualites.show', $item->id) }}" 
                                        class="inline-flex items-center font-semibold text-gold transition-colors hover:text-amber-600">
                                        Lire l'article
                                        <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                        </svg>
                                    </a>
                                </div>
                            </article>
                            @endforeach
                        </div>

                        <!-- Message aucun résultat -->
                        <div id="no-results" class="mt-12 hidden text-center">
                            <p class="text-xl text-gray-500 dark:text-gray-400">Aucun article trouvé</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <style>
            .line-clamp-3 {
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
            .article {
                transition: transform 0.3s ease, opacity 0.3s ease;
            }

            .hidden-article {
                display: none !important;
                opacity: 0;
                transform: scale(0.9);
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('search-input');
                const resetButton = document.getElementById('reset-search');
                const articles = document.querySelectorAll('.article');
                const noResults = document.getElementById('no-results');
                
                // Fonction de filtrage
                function filterArticles() {
                    const searchTerm = searchInput.value.toLowerCase();
                    let visibleCount = 0;
                    
                    articles.forEach(article => {
                        const title = article.dataset.title;
                        const content = article.dataset.content;
                        
                        if (title.includes(searchTerm) || content.includes(searchTerm)) {
                            article.classList.remove('hidden-article');
                            visibleCount++;
                        } else {
                            article.classList.add('hidden-article');
                        }
                    });
                    
                    // Afficher/masquer le message "Aucun résultat"
                    noResults.classList.toggle('hidden', visibleCount > 0 || searchTerm === '');
                    
                    // Afficher/masquer le bouton reset
                    resetButton.classList.toggle('hidden', searchTerm === '');
                }
                
                // Écouteurs d'événements
                searchInput.addEventListener('input', debounce(filterArticles, 300));
                resetButton.addEventListener('click', function() {
                    searchInput.value = '';
                    filterArticles();
                    searchInput.focus();
                });
                
                // Fonction debounce pour améliorer les performances
                function debounce(func, wait) {
                    let timeout;
                    return function() {
                        const context = this, args = arguments;
                        clearTimeout(timeout);
                        timeout = setTimeout(function() {
                            func.apply(context, args);
                        }, wait);
                    };
                }
            });
        </script>
    @endsection
    @section('content')
        <div class="container mx-auto px-4">
            <h2 class="text-4xl md:text-6xl font-bold mb-4 text-gold text-center animate-fade-in">Les domaines d'interventions</h2>
            <div class="border-t border-gold my-4 mx-auto w-1/4"></div>
        </div>
        <div class="flex items-center justify-center bg-blue-950 py-8">
            <div id="carousel" class="relative w-full max-w-7xl m-4 overflow-hidden rounded-lg shadow-2xl">
                <div class="flex transition-transform duration-500 ease-in-out" id="carousel-content">
                    <!-- Grid Container 1 -->
                    <div class="flex-shrink-0 w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
                        <!-- Repeat for each card -->
                        <div class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-lg m-2 rounded-lg">
                            <div class="absolute top-4 left-4 text-black p-2 rounded-md">
                                <i class="fas fa-balance-scale fa-2x"></i>
                            </div>
                            <div class="mt-12">
                                <span class="text-lg font-semibold">Droit des affaires</span>
                                <p class="text-sm text-gray-600 mt-2">Notre cabinet offre des conseils juridiques pour les entreprises de toutes tailles.</p>
                            </div>
                        </div>
                        <div class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-lg m-2 rounded-lg">
                            <div class="absolute top-4 left-4 text-black p-2 rounded-md">
                                <i class="fas fa-university fa-2x"></i>
                            </div>
                            <div class="mt-12">
                                <span class="text-lg font-semibold">Droit bancaire</span>
                                <p class="text-sm text-gray dark:text-black mt-2">Nous proposons des services en matière de régulation bancaire et financière.</p>
                            </div>
                        </div>
                        <div class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-lg m-2 rounded-lg">
                            <div class="absolute top-4 left-4 text-black p-2 rounded-md">
                                <i class="fas fa-briefcase fa-2x"></i>
                            </div>
                            <div class="mt-12">
                                    <span class="text-lg font-semibold">Droit du travail et de la sécurité sociale</span>
                                    <p class="text-sm text-gray dark:text-black mt-2">Nos experts vous accompagnent dans la gestion des relations de travail.</p>
                                </div>
                            </div>
                        <div class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-lg m-2 rounded-lg">
                            <div class="absolute top-4 left-4 text-black p-2 rounded-md">
                                <i class="fas fa-building fa-2x"></i>
                            </div>
                            <div class="mt-12">
                                <span class="text-lg font-semibold">Droit des sociétés</span>
                                <p class="text-sm text-gray  dark:text-black mt-2">Nous assistons dans la création et la gestion des sociétés.</p>
                            </div>
                        </div>
                            <div class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-lg m-2 rounded-lg">
                                <div class="absolute top-4 left-4 text-black p-2 rounded-md">
                                    <i class="fas fa-lightbulb fa-2x"></i>
                                </div>
                                <div class="mt-12">
                                    <span class="text-lg font-semibold">Droit de la propriété intellectuelle et industrielle</span>
                                    <p class="text-sm text-gray dark:text-black mt-2">Protection et gestion de vos actifs immatériels.</p>
                                </div>
                            </div>
                            <div class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-lg m-2 rounded-lg">
                                <div class="absolute top-4 left-4 text-black p-2 rounded-md">
                                    <i class="fas fa-gavel fa-2x"></i>
                                </div>
                                <div class="mt-12">
                                    <span class="text-lg font-semibold">Mise en œuvre et suivi des procédures judiciaires</span>
                                    <p class="text-sm text-gray dark:text-black mt-2">Accompagnement complet dans les démarches judiciaires.</p>
                                </div>
                            </div>
                        <!-- Add other cards similarly -->
                    </div>
                    <!-- Grid Container 2 -->
                    <div class="flex-shrink-0 w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
                        <!-- Repeat for each card -->
                        <div class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-lg m-2 rounded-lg">
                            <div class="absolute top-4 left-4 text-black p-2 rounded-md">
                                    <i class="fas fa-cogs fa-2x"></i>
                                </div>
                                <div class="mt-12">
                                    <span class="text-lg font-semibold">Mise en œuvre et suivi des procédures administratives</span>
                                    <p class="text-sm text-gray dark:text-black mt-2">Nous facilitons les démarches administratives complexes.</p>
                                </div>
                            </div>
                            <div class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-lg m-2 rounded-lg">
                                <div class="absolute top-4 left-4 text-black p-2 rounded-md">
                                    <i class="fas fa-signal fa-2x"></i>
                                </div>
                                <div class="mt-12">
                                    <span class="text-lg font-semibold">Droit de la télécommunication</span>
                                    <p class="text-sm text-gray dark:text-black mt-2">Conseils spécialisés dans les technologies de l'information.</p>
                                </div>
                            </div>
                            <div class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-lg m-2 rounded-lg">
                                <div class="absolute top-4 left-4 text-black p-2 rounded-md">
                                    <i class="fas fa-home fa-2x"></i>
                                </div>
                                <div class="mt-12">
                                    <span class="text-lg font-semibold">Droit immobilier</span>
                                    <p class="text-sm text-gray dark:text-black mt-2">Assistance dans les transactions et litiges immobiliers.</p>
                                </div>
                            </div>
                            <div class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-lg m-2 rounded-lg">
                                <div class="absolute top-4 left-4 text-black p-2 rounded-md">
                                    <i class="fas fa-hand-holding-usd fa-2x"></i>
                                </div>
                                <div class="mt-12">
                                    <span class="text-lg font-semibold">Recouvrement de créances civiles et commerciales</span>
                                    <p class="text-sm text-gray dark:text-black mt-2">Solutions efficaces pour le recouvrement de créances.</p>
                                </div>
                            </div>
                            <div class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-lg m-2 rounded-lg">
                                <div class="absolute top-4 left-4 text-black p-2 rounded-md">
                                    <i class="fas fa-users fa-2x"></i>
                                </div>
                                <div class="mt-12">
                                    <span class="text-lg font-semibold">Droit de la famille</span>
                                    <p class="text-sm text-gray dark:text-black mt-2">Accompagnement juridique dans les affaires familiales.</p>
                                </div>
                            </div>
                            <div class="bg-gray-200 p-6 text-center relative hover:bg-gold transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-lg m-2 rounded-lg">
                                <div class="absolute top-4 left-4 text-black p-2 rounded-md">
                                    <i class="fas fa-leaf fa-2x"></i>
                                </div>
                                <div class="mt-12">
                                    <span class="text-lg font-semibold">Droit des successions</span>
                                    <p class="text-sm text-gray dark:text-black mt-2">Gestion des successions et héritages.</p>
                                </div>
                            </div>
                        </div>
                </div>
                <button id="prev" type="button" class="absolute top-1/2 -translate-y-1/2 left-0 z-30 p-3 rounded-full bg-white hover:bg-gray-800 text-black font-bold shadow-lg hover:text-white transition-colors duration-300">
                    <span>&larr;</span>
                </button>
                <button id="next" type="button" class="absolute top-1/2 -translate-y-1/2 right-0 z-30 p-3 rounded-full bg-white hover:bg-gray-800 text-black font-bold shadow-lg hover:text-white transition-colors duration-300">
                    <span>&rarr;</span>
                </button>
            </div>
        </div>
    @endsection
    @section('commentaire')
        <div class="container mx-auto p-6 mt-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-md shadow-lg">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Nous laisser un message</h2>
                    <form action="{{route('comment.store')}}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-800">Nom</label>
                            <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gold focus:border-transparent" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-800">Email</label>
                            <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gold focus:border-transparent" required>
                        </div>
                        <div class="mb-4">
                            <label for="comment" class="block text-sm font-medium text-gray-800">Commentaire</label>
                            <textarea id="comment" name="comment" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gold focus:border-transparent" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="bg-slate-800 text-white py-2 px-6 rounded-lg hover:bg-gold focus:outline-none focus:ring-2 focus:ring-gold focus:ring-opacity-50 transition-colors duration-300">
                                Soumettre
                            </button>
                        </div>
                    </form>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-lg">
                    <h2 class="text-3xl font-semibold text-gray-900 mb-6 border-b pb-4">Commentaires</h2>
                    <div class="overflow-y-auto max-h-96 space-y-6">
                        @foreach ($commentaires as $item)
                            <div class="bg-gray-50 shadow-md rounded-lg p-6 border border-gray-300 transition-transform transform hover:scale-105 hover:shadow-xl duration-300">
                                <p class="text-lg text-gray-800 font-medium">Nom : <span class="font-normal">{{$item->user->name}}</span></p>
                                
                                <p class="text-md text-gray-700 mt-2">
                                    @if ($item->actualite)
                                        Actualité : <span class="font-medium text-blue-600 hover:underline">{{$item->actualite->titre}}</span>
                                    @else
                                        <span class="italic text-red-500">Pas d'actualité associée</span>
                                    @endif
                                </p>
                
                                <p class="text-sm text-gray-600 mt-2">Email : <span class="font-normal">{{$item->user->email}}</span></p>
                                
                                <p class="text-gray-800 mt-3">Commentaire : <span class="font-normal text-gray-700">{{$item->contenu}}</span></p>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                
            </div>
        </div>
    @endsection
</x-layouts.app>
<script>
    const carouselContent = document.getElementById("carousel-content");
    const nextButton = document.getElementById("next");
    const prevButton = document.getElementById("prev");
    let currentIndex = 0;
    nextButton.addEventListener("click", () => {
        if (currentIndex < carouselContent.children.length - 1) {
            currentIndex++;
            updateCarousel();
        }
    });
    prevButton.addEventListener("click", () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });

    function updateCarousel() {
        const width = carouselContent.children[0].offsetWidth;
        carouselContent.style.transform = `translateX(-${currentIndex * width}px)`;
    }
</script>