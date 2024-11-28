<x-layouts.app>
    @section('content') 
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($avocats as $item)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden dark:bg-gray-800">
                        <div class="flex flex-col items-center p-6">
                            <img class="w-48 h-48 object-cover border-4 border-gray-300 dark:border-gray-500" src="{{ asset($item->image) }}" alt="Profil Image">
                            <h1 class="text-2xl font-bold text-center text-gray-900 dark:text-white mt-4">Nom complet : {{$item->nom_complet}}</h1>
                            <p class="text-center text-gray-700 dark:text-gray-300">{{$item->email}}</p>
                            <p class="mt-4 text-gray-700 dark:text-gray-300 text-center">{{$item->description}}</p>
                            <button class="bg-gold text-white py-2 px-6 rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 mt-6">Contactez</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
</x-layouts.app>
