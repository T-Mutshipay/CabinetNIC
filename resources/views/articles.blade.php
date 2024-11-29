<x-layouts.app>
@section('content')
<div class="container mx-auto p-4">
    <!-- En-tête de l'article -->
    @if ($actualites)
        <div class=" text-black p-4 mb-4">
            <h1 class=" text-6xl font-bold">{{ $actualites->titre }}</h1>
            <p class="mt-2 text-2xl">{{ $actualites->description }}</p>
        </div>

        <article class="bg-white p-6 rounded-md shadow-md shadow-slate-800">
            {{ $actualites->contenu }}
        </article>

        <div id="commentSection" class="m-6">
            <h2 class="text-xl font-semibold mb-4">Commentaires</h2>
            <form action="{{ route('comment.store') }}" method="POST">
                @csrf
                <input type="hidden" name="actualite_id" value="{{ $actualites->id }}">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-800 dark:text-white">Nom</label>
                    <input type="text" id="name" name="name"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-slate-700 dark:text-white"
                           required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-800 dark:text-white">Email</label>
                    <input type="email" id="email" name="email"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-slate-700 dark:text-white"
                           required>
                </div>
                <div class="mb-4">
                    <label for="comment" class="block text-sm font-medium text-gray-800 dark:text-white">Commentaire</label>
                    <textarea id="comment" name="comment" rows="4"
                              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-slate-700 dark:text-white"
                              required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit"
                            class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Soumettre
                    </button>
                </div>
            </form>
        </div>
        
    @endif
</div>

@endsection
</x-layouts.app>