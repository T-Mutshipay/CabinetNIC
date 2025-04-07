<x-layouts.app>
    @section('content')
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-12 space-y-6 md:space-y-0">
            <div class="text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4 relative">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-emerald-600">Notre Équipe Juridique</span>
                    <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-blue-400 to-emerald-400 opacity-50"></div>
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-300 mt-2">
                    Expertise, dévouement et excellence au service de vos droits
                </p>
            </div>

            <a href="{{ route('/') }}" 
               class="flex items-center space-x-2 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 text-blue-600 dark:text-blue-400 px-6 py-3 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                <svg class="w-5 h-5 rotate-180" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
                <span class="font-semibold">Retour</span>
            </a>
        </div>

        <!-- Avocats Section -->
        <section class="mb-20">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($avocats as $avocat)
                <div class="group relative bg-white dark:bg-gray-800 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden rounded-t-2xl h-64">
                        <img src="{{ asset($avocat->image) }}" 
                             alt="{{ $avocat->nom_complet }}"
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                             loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/50 to-transparent"></div>
                        <span class="absolute top-4 right-4 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-3 py-1 rounded-full text-sm font-medium">
                            {{ $avocat->role }}
                        </span>
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                            {{ $avocat->nom_complet }}
                        </h3>
                        
                        <div class="flex items-center space-x-2 mb-4">
                            <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                            <a href="mailto:{{ $avocat->email }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                {{ $avocat->email }}
                            </a>
                        </div>

                        <div x-data="{ expanded: false }" class="mb-6">
                            <div 
                                class="text-gray-600 dark:text-gray-400"
                                :class="expanded ? '' : 'line-clamp-3'"
                            >
                                {!! nl2br(e($avocat->description)) !!}
                            </div>
                            <button 
                                @click="expanded = !expanded" 
                                class="text-blue-500 hover:text-blue-700 text-sm mt-1 focus:outline-none"
                            >
                                <span x-text="expanded ? 'Voir moins' : 'Voir plus'"></span>
                            </button>
                        </div>

                        <div class="flex space-x-4">
                            @foreach($avocat->social_links as $social)
                                @php
                                    $platform = strtolower($social->plateforme);
                                    $url = Str::startsWith($social->url, ['http://', 'https://']) 
                                           ? $social->url 
                                           : "https://{$social->url}";
                                @endphp
                                
                                <a href="{{ $url }}" 
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors"
                                   aria-label="{{ ucfirst($platform) }} profile">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        @if($platform === 'facebook')
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                        @elseif($platform === 'twitter' || $platform === 'x')
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                        @elseif($platform === 'linkedin')
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                        @else
                                        
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
                                        <text x="12" y="16" text-anchor="middle" font-size="10" fill="currentColor">{{ substr(ucfirst($platform), 0, 1) }}</text>
                                        @endif
                                    </svg>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- Personnel Section -->
        <section class="mb-20">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 relative">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-emerald-600 to-blue-600">Équipe de Soutien</span>
                <div class="absolute bottom-0 left-0 w-24 h-1 bg-gradient-to-r from-emerald-400 to-blue-400"></div>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 m-16">
                @foreach ($collaborateurs as $collaborateur)
                <div class="relative bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 group">
                    <div class="relative pt-[70%] overflow-hidden rounded-t-xl">
                        <img src="{{ asset($collaborateur->image) }}" 
                             alt="{{ $collaborateur->nom_complet }}"
                             class="absolute top-0 left-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                             loading="lazy">
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-1">
                            {{ $collaborateur->nom_complet }}
                        </h3>
                        
                        <p class="text-sm text-emerald-600 dark:text-emerald-400 mb-4">
                            {{ $collaborateur->post }}
                        </p>

                        <div class="flex items-center space-x-2 text-gray-600 dark:text-gray-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                            </svg>
                            <span class="text-sm">{{ $collaborateur->description }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
    @endsection

    @push('styles')
    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        @media (prefers-reduced-motion: no-preference) {
            .card-enter {
                opacity: 0;
                transform: translateY(20px);
            }
            
            .card-enter-active {
                opacity: 1;
                transform: translateY(0);
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            }
        }
    </style>
    @endpush
</x-layouts.app>