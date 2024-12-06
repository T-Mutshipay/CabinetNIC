<x-layouts.app>
@section('content')
<div class="flex justify-end m-2">
    <a href="{{ route('/') }}" class="bg-blue-700 p-2 text-white rounded">
        <svg fill="#fff" version="1.1" id="Layer_1" class="h-6 w-6"
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 0 490.693 490.693" xml:space="preserve">
            <g>
                <g>
                    <path d="M351.173,149.227H36.4L124.827,60.8c4.053-4.267,3.947-10.987-0.213-15.04c-4.16-3.947-10.667-3.947-14.827,0
L3.12,152.427c-4.16,4.16-4.16,10.88,0,15.04l106.667,106.667c4.267,4.053,10.987,3.947,15.04-0.213
c3.947-4.16,3.947-10.667,0-14.827L36.4,170.56h314.773c65.173,0,118.187,57.387,118.187,128s-53.013,128-118.187,128h-94.827
c-5.333,0-10.133,3.84-10.88,9.067c-0.96,6.613,4.16,12.267,10.56,12.267h95.147c76.907,0,139.52-66.987,139.52-149.333
S428.08,149.227,351.173,149.227z" />
                </g>
            </g>
        </svg>
    </a>         
</div>
<div class="container mx-auto p-4">
    <!-- En-tête de l'article -->
    @if ($actualites)
        <div class=" text-black p-4 mb-4">
            <h1 class=" text-6xl font-bold">{{ $actualites->titre }}</h1>
            <p class="mt-2 text-2xl">{{ $actualites->description }}</p>
        </div>

        <article class="bg-white p-6 rounded-md shadow-md ">
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