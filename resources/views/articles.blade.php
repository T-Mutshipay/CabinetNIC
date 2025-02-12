<x-layouts.app>
    @section('content')
    <div class="bg-white dark:bg-gray-900 min-h-screen">
        <div class="flex justify-end m-4">
            <a href="{{ route('/') }}" 
                class="flex items-center space-x-2 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 text-blue-600 dark:text-blue-400 px-6 py-3 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 hover:scale-105">
                <svg class="w-5 h-5 rotate-180" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
                <span class="font-semibold">Retour</span>
            </a>         
        </div>
        <div class="container mx-auto p-4 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
            <!-- En-tête de l'article -->
            @if ($actualites)
                <div class="text-black dark:text-white p-4 mb-6">
                    <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ $actualites->titre }}</h1>
                    <p class="mt-2 text-xl md:text-2xl text-gray-700 dark:text-gray-300">{{ $actualites->description }}</p>
                </div>
        
                <article class="bg-white dark:bg-gray-700 p-6 rounded-md shadow-md text-gray-800 dark:text-gray-200">
                    {{ $actualites->contenu }}
                </article>
        
                <div id="commentSection" class="mt-8 p-6 bg-gray-50 dark:bg-gray-700 rounded-lg shadow-sm">
                    <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white">Commentaires</h2>
                    <form action="{{ route('comment.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="actualite_id" value="{{ $actualites->id }}">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-800 dark:text-gray-200">Nom</label>
                            <input type="text" id="name" name="name"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-600 dark:text-white"
                                   required>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-800 dark:text-gray-200">Email</label>
                            <input type="email" id="email" name="email"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-600 dark:text-white"
                                   required>
                        </div>
                        <div>
                            <label for="comment" class="block text-sm font-medium text-gray-800 dark:text-gray-200">Commentaire</label>
                            <textarea id="comment" name="comment" rows="4"
                                      class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-600 dark:text-white"
                                      required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit"
                                    class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-300 transform hover:scale-105">
                                Soumettre
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
    @endsection
    </x-layouts.app>